const mix=require('laravel-mix');
mix.js('resources/js/app.js', 'js')
    .react()
    .sass('resources/css/app.scss', 'css')


