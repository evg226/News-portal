@extends('layouts.admin')

@section('title')
    @parent - Категории
@endsection

@section('content')

    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Редактирование категорий</h5>
                    <a href="{{route('admin.categories.create')}}" class="card-title px-2">
                        <i class="bi bi-plus-square"></i>&nbsp<small class="d-none d-sm-inline-block">Создать</small>
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" style="font-size: 0.85rem ">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Заголовок</th>
                            <th scope="col">Автор</th>
                            <th scope="col">Создано</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($categories as $category)
                            <tr id="categories{{$category->id}}">
                                <th scope="row">
                                    <div class="dropdown">
                                        <div class="dropdown-toggle" type="button"
                                             id="dropdownMenuButton{{$category->id}}" data-bs-toggle="dropdown"
                                             aria-expanded="false">
                                            {{$category->id}}
                                        </div>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$category->id}}">
                                            <li><a class="dropdown-item" href="{{route('news',['categories'=>[$category->id]])}}">
                                                    <strong>Все {{$category->title}}</strong>
                                                </a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            @foreach($category->news as $news)
                                                <li><a class="dropdown-item" href="{{route('news.item',['slug'=>$news->slug])}}">
                                                        <span>{{$news->id}}</span>
                                                        <span>{{$news->title}}</span>
                                                    </a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                            </th>
                                <td>{{$category->title}}</td>
                                <td>{{$category->author}}</td>
                                <td class="text-nowrap">{{$category->created_at}}</td>
                                <td class="text-center p-0" style="width: 40px">
                                    <a href="{{route('admin.categories.edit',['category'=>$category->id])}}"
                                       class="btn link-primary">
                                        <i class="bi bi-pen"></i>
                                    </a>
                                </td>
                                <td class="text-center p-0" style="width: 40px">
                                    <a href="javascript:;" class="btn link-danger remove" id="categories{{$category->id}}">
                                        <i class="bi bi-dash-circle"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <h6>Категорий пока нет</h6>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {{$categories->links()}}
            </div>
        </div>

    </section>

@endsection


