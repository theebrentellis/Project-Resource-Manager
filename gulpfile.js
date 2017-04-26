const elixir = require('laravel-elixir');

require('laravel-elixir-browserify-official');
require('laravel-elixir-vueify');
require('laravel-elixir-vue-2');

require('laravel-elixir-browsersync-official');

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

elixir(mix => {

    mix.sass('app.scss')
        .webpack('app.js');

    mix.sass('modal.scss');

    mix.browserSync({
        proxy: 'prm.app',
        // open: false
    });
});