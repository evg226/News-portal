const mix=require('laravel-mix');
mix.js('resources/js/app.js', 'js')
    .react()
    .sass('resources/css/app.scss', 'css')
    .js('resources/js/admin.js','js')
    .js('resources/js/remove.js','js')
    .js('resources/js/newsUpdate.js','js')


