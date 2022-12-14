import React, {useEffect, useState} from "react";
import {fetchCategories, fetchNews} from "./http/categoryApi";
import {Button, Col, Form, InputGroup, Row} from "react-bootstrap";

export const ReactApp = () => {

    const [isShowFilters, setIsShowFilters] = useState(false);
    const [isShowAllCategories, setIsShowAllCategories] = useState(false);
    const [isSelectAllCategories, setIsSelectAllCategories] = useState(true);
    const [categories, setCategories] = useState([]);
    const [news, setNews] = useState([]);

    const changeCheckedCategories = category => {
        let isSelect = !category.selected;
        setCategories(
            categories.map(item => {
                if (item.id === category.id) {
                    return {...category, selected: !category.selected}
                } else {
                    if (item.selected) isSelect = true
                    return item
                }
            })
        );
        setIsSelectAllCategories(!isSelect);
    }

    const selectAllCategories = () => {
        setCategories(
            categories.map(item => {
                return {
                    ...item,
                    selected: false
                }
            })
        )
        setIsSelectAllCategories(true)
    }

    const changeShowAllCategories = () => {
        setCategories(
            categories.map(item =>
                item.id < 5 ?
                    item :
                    {...item, show: !isShowAllCategories}
            ))
        setIsShowAllCategories(prev => !prev)
    }

    useEffect(() => {
        const fetchCats = async () => {
            try {
                const data = await fetchCategories();
                let categories = data.map((category, i) => {
                    return {...category, show: i < 5, selected: false}
                });
                setCategories(categories);
            } catch (e) {
                console.log(e.message);
            }
        }
        fetchCats();
    }, []);

    const handleChangeContent = async (e) => {
        e.preventDefault();
        const bladeContainer = document.getElementById('blade-newslist-container');
        if (bladeContainer) bladeContainer.remove();
        let selected = [];
        categories.forEach(item => {
            if (item.selected) selected.push(parseInt(item.id));
        })
        try {
            const data = await fetchNews(selected);
            setNews(data);
        } catch (e) {
            console.log(e.message);
        }

    }


    return (
        <div>
            <div className={'mx-2' + (isShowFilters ? ' d-flex justify-content-between' : '')}>
                <div className={!isShowFilters ? ' d-none' : ''}>
                    <Form onSubmit={handleChangeContent}>
                        <div className={'d-flex align-items-center mb-2'}>
                            <h6 className={'m-0'}>??????????????????</h6>
                            <Button variant={'outline-secondary'} className={'px-2 py-0 ms-3 btn-sm'}
                                    onClick={changeShowAllCategories}>
                                <small>{!isShowAllCategories ? '?????? >>' : '<< ????????????'}</small>
                            </Button>
                        </div>
                        {
                            (categories.length === 0) ?
                                <h3>????????????????...{}</h3>
                                :
                                <div className={'container'}>
                                    <div className={'row'}
                                    >
                                        <Form.Check
                                            inline
                                            label={'??????'}
                                            name="categories-group"
                                            type={'checkbox'}
                                            id={`category-all`}
                                            checked={isSelectAllCategories}
                                            className={'small m-0 col-12 col-sm-6 col-md-4 col-lg-3'}
                                            onChange={selectAllCategories}
                                        />
                                        {
                                            categories.length && categories.map(category =>
                                                    category.show && <Form.Check
                                                        key={category.id}
                                                        inline
                                                        label={category.title}
                                                        name="categories-group"
                                                        type={'checkbox'}
                                                        id={`category-` + category.id}
                                                        checked={category.selected}
                                                        className={'small m-0 col-12 col-sm-6 col-md-4 col-lg-3 text-nowrap'}
                                                        onChange={() => changeCheckedCategories(category)}
                                                    />
                                            )
                                        }
                                    </div>
                                </div>
                        }
                        <Button
                            variant={'outline-secondary'}
                            className={'btn-sm mt-2'}
                            type={'submit'}
                        >????????????????</Button>
                    </Form>

                </div>
                <div className={'text-right'}>
                    <Button variant={'outline-secondary'} className={'border-0' + (isShowFilters ? ' btn-sm' : '')}
                            onClick={() => setIsShowFilters(prev => !prev)}
                    >{!isShowFilters ? '??????????????' : 'X'}</Button>
                </div>
            </div>

            <div id="react-newslist-container" className="row row-cols-1 row-cols-md-2  row-cols-xl-3">
                {
                    !!news.length &&
                    news.map(item =>
                        <a key={item.id} href={"/news/" + item.slug}
                           className="col text-decoration-none text-secondary p-3">
                            <div className="card h-100 shadow">
                                <img
                                    src={item.image}
                                    className="card-img"
                                    alt={"?????????????? " + item.title}
                                    width="100%" height="250px"
                                />
                                <h4 className="card-title mt-3 mx-2 text-center">{item.title}</h4>
                                <div className="card-body d-flex flex-column justify-content-between">
                                    <p className="card-text">{item.description}</p>
                                    <p className="card-text">??????????????????: {item.category_id}</p>
                                    <div className="text-right align-bottom">
                                        <div className="btn btn-outline-secondary">???????????????????? >></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    )
                }
            </div>

        </div>

    )
}

