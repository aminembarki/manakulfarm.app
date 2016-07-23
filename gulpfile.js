var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix
    .styles([
        'bootstrap/css/bootstrap.css',
        'dist/css/AdminLTE.css',
        'dist/css/skins/skin-blue.css'
    ], 'public/css/all.css', 'node_modules/admin-lte')

    .scripts([
        'plugins/jQuery/jquery-2.2.3.min.js',
        'bootstrap/js/bootstrap.min.js',
        'dist/js/app.min.js'
    ], 'public/js/all.js', 'node_modules/admin-lte')

    .version(['public/css/all.css', 'public/js/all.js'])
    ;
});
