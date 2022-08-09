@extends('layouts.main')

@section('title')
    @parent - Новость {{$newsItem['id']}}
@endsection

@section('content')
    <h1>Новость №{{$newsItem['id']}} подробно</h1>
@endsection
