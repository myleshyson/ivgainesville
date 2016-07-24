var gulp = require('gulp');
var elixir = require('laravel-elixir');
require('laravel-elixir-imagemin');

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
    // mix.browserSync({
    //     proxy: 'ivgainesville.dev'
    // });

    mix.sass(['app.scss'], './public/css/app.css', {
        includePaths: ['bower_components/foundation-sites/scss', 'bower_components/motion-ui', 'node_modules/normalize-sass', 'node_modules/bourbon/app/assets/stylesheets']
    });

    mix.styles([
        'animsition.min.css',
        'dropzone.css',
        'font/css/font-awesome.css',
        'waves.css',
        'sweetalert.css',
        'bootstrap-switch.min.css'
    ], './public/css/libs.css')
        .styles([
            'medium-editor-insert-plugin-frontend.min.css'
        ], './public/css/medium-front.css')
        .styles([
            'medium-editor.min.css',
            'bootstrap-theme.min.css',
            'medium-editor-insert-plugin.min.css'
        ], './public/css/medium.css');

    mix.scripts([
        'animsition.min.js',
        'twitterFetcher.js',
        'waves.js',
        'dropzone.js',
        'sweetalert.min.js',
        'bootstrap.min.js',
        'bootstrap-switch.min.js',
        'instafeed.min.js'
    ], './public/js/libs.js')
        .scripts([
            'medium-dep/jquery.js',
            'medium-dep/handlebars.runtime.min.js',
            'medium-dep/jquery-sortable-min.js',
            'medium-dep/jquery.ui.widget.js',
            'medium-dep/jquery.iframe-transport.js',
            'medium-dep/jquery.fileupload.js'
        ], './public/js/medium-dep.js')
        .scripts([
            'medium-editor.min.js',
            'medium-editor-insert-plugin.min.js'
        ], './public/js/medium-insert.js')
        .scripts('app.js');

    mix.imagemin();

    mix.copy('resources/assets/css/font/fonts', 'public/css/fonts');
});