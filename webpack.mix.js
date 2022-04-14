const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.autoload({});
mix.js('resources/js/app.js', 'public/js')
.sass('resources/sass/app.scss', 'public/css');
mix.sass('resources/sass/style.scss','public/css');
mix.js('resources/js/editor.js', 'public/js');
mix.js('resources/js/board-transaction.js', 'public/js');
mix.js('resources/js/board-transaction-admin.js', 'public/js');
mix.browserSync({
    proxy: 'localhost:8888',
});