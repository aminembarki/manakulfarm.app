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
        'admin-lte/bootstrap/css/bootstrap.css',
        'admin-lte/dist/css/AdminLTE.css',
        'admin-lte/dist/css/skins/skin-blue.css',
        'font-awesome/css/font-awesome.css',
        'ionicons/dist/css/ionicons.css'
    ], 'public/css/all.css', 'node_modules')
    .copy('node_modules/font-awesome/fonts', 'public/build/fonts')
    .copy('node_modules/ionicons/dist/fonts', 'public/build/fonts')

    .scripts([
        'admin-lte/plugins/jQuery/jquery-2.2.3.min.js',
        'admin-lte/bootstrap/js/bootstrap.min.js',
        'admin-lte/dist/js/app.min.js'
    ], 'public/js/all.js', 'node_modules')

    .version(['public/css/all.css', 'public/js/all.js'])
    ;
});
