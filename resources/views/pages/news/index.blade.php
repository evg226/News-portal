@extends('layouts.main')

@section('title')
    @parent - Новости
@endsection

@section('content')
    <h1>Список новостей</h1>
    <div id="reactApp"></div>
    <div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
        @forelse($newsList as $item)
            <a href="{{route('news.item',['id'=>$item['id']])}}"
               class="text-decoration-none p-2 d-flex flex-column justify-content-between">
                <h4>{{$item['title']}}</h4>
                <img src="{{$item['image']}}" alt="Рисунок {{$item['title']}}"
                width="100%" height="200px">
                <p>{{$item['description']}}</p>
            </a>
        @empty
            <h2>Новостей нет в базе</h2>
        @endforelse
    </div>

@endsection

