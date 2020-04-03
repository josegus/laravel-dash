const mix = require('laravel-mix');

mix.options({
    terser: {
        extractComments: false,
        terserOptions: {
            compress: {
                drop_console: true,
            },
        },
    },
}).setPublicPath('public')
    .js('resources/js/app.js', 'public')
    .sass('resources/sass/app.scss', 'public')
    .version([
        'public/assets/datatables/datatables.min.js',
        'public/assets/datatables/datatables.min.css',
    ]);