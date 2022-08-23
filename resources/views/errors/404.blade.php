<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>
        @section('title')
            {{config('app.name')}} 404 - Станица не найдена
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

    <main>
        <div class="container">

            <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
                <h1>404</h1>
                <h2>The page you are looking for doesn't exist.</h2>
                <a class="btn" href="{{route('home')}}">Back to home</a>
                <img src="{{asset('img/not-found.svg')}}" class="img-fluid py-5" alt="Page Not Found">
                <div class="credits">
                    Designed by <a href="https://github.com/evg226/">Evg226</a>
                </div>
            </section>

        </div>
    </main>

</div>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/admin.js')}}"></script>

</body>

</html>




