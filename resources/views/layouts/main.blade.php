<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @section('title')
            {{config('app.name')}}
        @show
    </title>

    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">

</head>
<body>
<div id="app" class="d-flex flex-column min-vh-100">
    <x-header></x-header>

    <main class="flex-grow-1 py-3">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <x-footer></x-footer>

</div>


</body>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>

</html>

