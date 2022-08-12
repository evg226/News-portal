<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @section('title')
            {{config('app.name')}} Администратор
        @show
    </title>

{{--    <link href="{{asset('css/app.css')}}" rel="stylesheet">--}}
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">

</head>
<body>
<div id="app" class="d-flex flex-column min-vh-100">

    <ul class="navbar">
        <a class="navbar-brand" href="{{route('news')}}">{{config('app.name')}}</a>
        <li class="nav-item"><a href="{{route('admin.index')}}"
            class="nav-link @if(request()->routeIs('admin.index'))text-dark @endif">Админ панель</a></li>
        <li class="nav-item"><a href="{{route('admin.news')}}"
            class="nav-link @if(request()->routeIs('admin.news'))text-dark @endif">Новости</a></li>
        <li class="nav-item"><a href="{{route('admin.news.create')}}"
            class="nav-link @if(request()->routeIs('admin.news.create'))text-dark @endif">Добавить новость</a></li>
    </ul>

    <main class="flex-grow-1 py-3">
        <div class="container">
            @yield('content')
        </div>
    </main>

</div>


</body>
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
<script src="{{ asset('js/bootstrap.js') }}"></script>

</html>

