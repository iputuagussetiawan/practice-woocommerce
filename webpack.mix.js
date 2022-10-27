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

mix.webpackConfig({
    devtool: "inline-source-map"
});


mix.js('src/js/app.js', '/build/js/')
    .js('src/js/page/woocommerce/single-product.js', '/build/js/')
    .sass('src/scss/app.scss', './build/css/')
    .sass('src/scss/pages/woocommerce/myaccount/register.scss', './build/css/')
    .sass('src/scss/pages/woocommerce/myaccount/myaccount.scss', './build/css/')
    .sass('src/scss/pages/woocommerce/myaccount/address.scss', './build/css/')
    .sass('src/scss/pages/woocommerce/single-product/single-product.scss', './build/css/')
    .sass('src/scss/pages/woocommerce/shop/shop.scss', './build/css/')
    .sass('src/scss/pages/woocommerce/cart/cart.scss', './build/css/')
    .sass('src/scss/pages/woocommerce/content-product.scss', './build/css/')
    .sourceMaps();
    
