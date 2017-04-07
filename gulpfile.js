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
    // mix.scripts([
    //     'brent.js'
    // ]);

    mix.browserify([
        // "modalActions.js",
        // "mutations.js",
        // "store.js"
        "./resources/assets/js/components/calendar.vue",
        "./resources/assets/js/components/modal.vue",
        "./resources/assets/js/components/theButton.vue"
    ]);

    mix.copy('node_modules/fullcalendar/dist/fullcalendar.min.js', 'public/js/fullcalendar.min.js');
    mix.copy('node_modules/fullcalendar/dist/fullcalendar.min.css', 'public/css/fullcalendar.min.css');

    mix.browserSync({
        proxy: 'prm.app',
        // open: false
    });
});