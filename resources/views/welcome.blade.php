@extends('layouts.main')

@section('content')
    <h1>Добро пожаловать на портал новостей {{config('app.name')}}</h1>
    <a href="{{route('news')}}">Все Новости</a>
    <br><br>
    <a href="{{route('about')}}">О проекте</a>

@endsection
