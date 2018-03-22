let mix = require('laravel-mix');

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

mix.scripts([
	'resources/assets/js/vendor/jquery-3.2.1.min.js',
	'resources/assets/js/vendor/modernizr-3.5.0.min.js',
	'resources/assets/js/vendor/bootstrap.min.js',
	'resources/assets/js/vendor/bootstrap-tagsinput.min.js',
	'resources/assets/js/vendor/bootstrap-select.min.js',
	'resources/assets/js/vendor/typeahead.bundle.min.js',
	'resources/assets/js/brawl.js',
	'resources/assets/js/plugins.js',
	'resources/assets/js/main.js'
], 'js/all.js');

//mix.copyDirectory('resources/assets/images', 'public/images');

mix.styles([
	'resources/assets/css/typography.css',
	'resources/assets/css/browserfix.css',
	'resources/assets/css/normalize.css',
	'resources/assets/css/bootstrap.min.css',
	'resources/assets/css/bootstrap-select.min.css',
	'resources/assets/css/bootstrap-tagsinput.min.css',
	'resources/assets/css/theme.css'
], 'css/all.css');
