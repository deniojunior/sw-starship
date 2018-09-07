const mix = require('laravel-mix');
const ImageminPlugin = require( 'imagemin-webpack-plugin' ).default;

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

mix.webpackConfig( {
    plugins: [
        new ImageminPlugin( {
            //disable: process.env.NODE_ENV !== 'production',
            pngquant: {
                quality: '95-100',
            },
            test: /\.(jpe?g|png|gif|svg)$/i,
        } ),
    ],
} );

mix.copy( 'resources/images', 'public/images', false );

mix.js('resources/js/app.js', 'public/js')
        .autoload({
            jquery: ['$', 'window.jQuery', 'jQuery'],
        })
        .scripts([
            'resources/js/plugins/material.min.js',
        ], 'public/js/mdl.js')
   .sass('resources/sass/app.scss', 'public/css')
        .options({
            processCssUrls: false
        })
    .version();