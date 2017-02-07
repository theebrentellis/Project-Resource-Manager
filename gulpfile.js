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

    mix.scripts([
        'resources/assets/js/*.js',
        'resources/assets/js/components/*.vue'
    ]);

    mix.browserify([
        // 'app.js',
        'bootstrap.js',
        'calendar.js',
        'components/calendar.vue'
    ]);

    // mix.copy('node_modules/jquery/dist/jquery.min.js', 'public/js/jquery.min.js');
    // mix.copy('node_modules/jquery/dist/jquery.min.map', 'public/js/jquery.min.map');
    mix.copy('node_modules/fullcalendar/dist/fullcalendar.min.js', 'public/js/fullcalendar.min.js');
    mix.copy('node_modules/fullcalendar/dist/fullcalendar.min.css', 'public/css/fullcalendar.min.css');
    // mix.copy('node_modules/moment/min/moment.min.js', 'public/js/moment.min.js');

    mix.browserSync({
        proxy: 'prm.app',
        open: false
    });
});