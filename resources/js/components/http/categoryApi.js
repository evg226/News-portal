import {host} from "./index";
import axios from "axios";


export const fetchCategories = async () =>{
    const {data} = await axios.get( host+'categories/');
    return data;
}

export const fetchNews = async (categories) => {
    const {data} = await axios.get( host+'news/',{params: {categories}});
    return data;
}
