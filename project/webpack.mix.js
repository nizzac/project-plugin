let mix = require('laravel-mix');

let tailwindcss = require('tailwindcss');

mix.postCss('resources/app.css', 'assets', [
    tailwindcss('./tailwind.config.js')
]);

mix.js('resources/app.js', 'assets').vue()