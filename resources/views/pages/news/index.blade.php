@extends('layouts.main')

@section('title')
    @parent - Новости
@endsection

@section('content')
    <h1>Список новостей</h1>
    <div id="reactApp"></div>
    <div id="blade-newslist-container" class="row row-cols-1 row-cols-md-2  row-cols-xl-3">
        @forelse($newsList as $item)
            <a href="{{route('news.item',['id'=>$item['id']])}}"
               class="col text-decoration-none text-secondary p-3">
                <div class="card h-100 shadow">
                    <img src="{{$item['image']}}" class="card-img" alt="Рисунок {{$item['title']}}"
                         width="100%" height="250px">
                    <h4 class="card-title mt-3 mx-2 text-center">{{$item['title']}}</h4>
                    <div class="card-body d-flex flex-column justify-content-between">
                        <p class="card-text">{{$item['description']}}</p>
                        <p class="card-text">Категория: {{$item['category_id']}}</p>
                        <div class="text-right align-bottom">
                            <div class="btn btn-outline-secondary">Посмотреть >></div>
                        </div>
                    </div>
                </div>
            </a>

        @empty
            <h2>Новостей нет в базе</h2>
        @endforelse
    </div>

@endsection

