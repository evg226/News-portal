@extends('layouts.admin')

@section('title')
    @parent - Список новостей
@endsection

@section('content')

    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Редактирование новостей</h5>
                    <a href="{{route('admin.news.create')}}" class="card-title px-2">
                        <i class="bi bi-plus-square"></i>&nbsp<small class="d-none d-sm-inline-block">Создать</small>
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-responsive-md" style="font-size: 0.85rem ">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Заголовок</th>
                            <th scope="col">Источник</th>
                            <th scope="col">Категория</th>
                            <th scope="col">Описание</th>
                            <th scope="col">Автор</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Создано</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($newsList as $newsItem)
                            <tr id="news{{$newsItem->id}}">
                                <th scope="row">{{$newsItem->id}}</th>
                                <td>{{$newsItem->title}}</td>
                                <td>{{$newsItem->source->name}}</td>
                                <td>{{$newsItem->category->title}}</td>
                                <td>{{$newsItem->description}}</td>
                                <td>{{$newsItem->author}}</td>
                                <td>{{$newsItem->status}}</td>
                                <td class="text-nowrap">{{$newsItem->created_at}}</td>
                                <td class="text-center p-0" style="width: 40px">
                                    <a href="{{route('admin.news.edit',['news'=>$newsItem->id])}}" class="btn link-primary">
                                        <i class="bi bi-pen"></i>
                                    </a>
                                </td>
                                <td class="text-center p-0" style="width: 40px">
                                    <a href="javascript:;" class="btn link-danger remove" id="news{{$newsItem->id}}">
                                        <i class="bi bi-dash-circle"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <h6>Новостей пока нет</h6>
                        @endforelse
                        </tbody>
                    </table>
                    {{$newsList->links()}}
                </div>
            </div>
        </div>
    </section>

@endsection


