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

mix.js('resources/js/app.js', 'public/js').sourceMaps()
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ]);

mix.copyDirectory('vendor/tinymce/tinymce', 'public/js/tinymce');

mix.browserSync({
    proxy: "127.0.0.1:8000",
    files: ["public/css/*.css", "public/js/*.js", "resources/views/**/*"]
});
mix.webpackConfig({
    stats: {
        children: true,
    },
});
mix.disableNotifications();