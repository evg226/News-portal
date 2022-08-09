@extends('layouts.main')

@section('title')
    @parent - Новости
@endsection

@section('content')
    <h1>Список новостей</h1>
    <div>
        @forelse($newsList as $item)
            <a href="{{route('news.item',['id'=>$item['id']])}}">
                <h2>{{$item['title']}}</h2>
                <p>{{$item['description']}}</p>
                <img src="{{$item['image']}}" alt="Рисунок {{$item['title']}}"
                height="200">
                <p>"{{$item['content']}}"</p>>
            </a>
        @empty
            <h2>Новостей нет в базе</h2>
        @endforelse
    </div>
@endsection

