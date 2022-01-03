const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);


mix.js('resources/js/display_images.js', 'public/js')
    .postCss('resources/css/display_images.css', 'public/css', [
        //
    ]);
	
mix.js('resources/js/bootstrap.js', 'public/js')
    .postCss('resources/css/bootstrap.css', 'public/css', [
        //
    ]);
	

mix.js('resources/js/get_images.js', 'public/js')
    .postCss('resources/css/get_images.css', 'public/css', [
        //
    ]);
