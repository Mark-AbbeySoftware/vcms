let mix = require('laravel-mix').mix;
const WebpackShellPlugin = require('webpack-shell-plugin');
const themeInfo = require('./theme.json');

/**
 * Compile scss files
 */
mix.sass('resources/sass/app.scss', 'assets/css/main.css')

/**
 * Concat scripts into one script
 */

mix.scripts([
    'node_modules/jquery/dist/jquery.js',
    'js/bootstrap.bundle.min.js',
    'js/tiny-slider.js',
    'js/flatpickr.min.js',
    'js/aos.js',
], 'assets/js/all.js');


/**
 * Copy Various Files
 */

mix.copyDirectory('resources/js','assets/js');
mix.copyDirectory('resources/fonts','../../public/fonts');

/**
 * Publishing the assets
 */
mix.webpackConfig({
  plugins: [
    new WebpackShellPlugin({onBuildEnd: ['php ../../artisan stylist:publish ' + themeInfo.name]})
  ]
});
