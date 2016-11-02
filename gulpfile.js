var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */


elixir(function(mix) {
    mix.styles([
        "./public/css/app.css",
        "./public/css/home.css",
        "./public/gallery-2.21.3/css/blueimp-gallery.min.css"
    ], './public/css/all.min.css');
});

elixir(function(mix) {
    mix.scripts([
        "./public/themes/flatly/js/all.js",
        "./public/gallery-2.21.3/js/blueimp-gallery.min.js"
    ], 'public/js/script.min.js');
});