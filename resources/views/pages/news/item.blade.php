@extends('layouts.main')

@section('title')
    @parent - Новость {{$newsItem['id']}}
@endsection

@section('content')
    <h1>Новость {{$newsItem['title']}}</h1>
    <div class="row row-cols-1 text-secondary small justify-content-md-end mt   `-4">
        <div class="col w-auto">Автор: <b>{{$newsItem['author']}}</b></div>
        <div class="col w-auto">Дата: <b>{{$newsItem['created_at']}}</b></div>
    </div>
    <div class="my-4">
        <div class="float-md-left mr-md-4 mb-4 col-md-6 col-lg-4">
            <img src="{{$newsItem['image']}}" alt="Picture {{$newsItem['title']}}"
                 class="img-fluid">
        </div>
        <div>
            {!!  $newsItem['content']!!}
        </div>
    </div>

@endsection
