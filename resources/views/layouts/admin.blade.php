<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>
        @section('title')
            {{config('app.name')}} Админ панель
        @show
    </title>

    <link href="{{asset('img/favicon.png')}}" rel="icon">
    <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">

    <link href="{{asset('css/bootstrap-icons.css')}}" rel="stylesheet">
</head>

<body>

<div id="app" class="d-flex flex-column min-vh-100">

    <x-admin.header></x-admin.header>


        <x-admin.aside></x-admin.aside>
    <main id="main" class="main flex-grow-1">
        <div class="pagetitle mb-4">
            <x-breadcrumbs></x-breadcrumbs>
        </div>

        @include('includes.messages')

        @yield('content')

    </main>

    <x-admin.footer></x-admin.footer>
</div>


<script src="{{asset('js/admin.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>

</body>

</html>
