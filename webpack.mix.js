const mix = require('laravel-mix');

console.log("aqui")
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
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .scripts([
        'node_modules/jquery/dist/jquery.min.js', // Caminho para o arquivo jQuery
        // Outros scripts que você possa precisar (como Select2, por exemplo)
     ], 'public/js/jquery-plugins.js'); // Nome do arquivo de saída para plugins jQuery