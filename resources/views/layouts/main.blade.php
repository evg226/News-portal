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
    <style>
        #app {
            display: flex; flex-direction: column; min-height: 100vh; max-width: 900px; margin: 0 auto
        }
    </style>
</head>
<body>
<div id="app">
    <x-header></x-header>

    <main style="flex-grow: 1">
        @yield('content')
    </main>

    <x-footer></x-footer>

</div>


</body>
<script src="{{ asset('js/app.js') }}" defer></script>
</html>

