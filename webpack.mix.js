let mix = require('laravel-mix');

mix
    .autoload({
        jquery: ['$', 'window.jQuery', 'jQuery'],
        tether: ['window.Tether', 'Tether'],
        'popper.js/dist/umd/popper.js': ['Popper']
    })
    .extract(['axios', 'bootstrap', 'jquery', 'moment', 'tether', 'vue'])
    .js('resources/assets/js/app.js', 'public/js/')
    .version();

mix
    .sass('resources/assets/sass/vendor.scss', 'public/css')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .version();
