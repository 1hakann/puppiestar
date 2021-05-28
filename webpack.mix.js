const mix = require('laravel-mix');
//const { mixin } = require('vue/types/umd');
const $AdminResAs = 'resources/assets/adminn';
const $AdminPubAs = 'public/admins';

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

        mix.copy($AdminResAs+'/assets/extra-libs/c3/d3.min.js',$AdminPubAs+'/js/d3.min.js');
        mix.copy($AdminResAs+'/assets/extra-libs/c3/c3.min.js',$AdminPubAs+'/js/c3.min.js');
        mix.copy($AdminResAs+'/assets/libs/chartist/dist/chartist.min.js',$AdminPubAs+'/js/chartist.min.js');
        mix.copy($AdminResAs+'/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js',$AdminPubAs+'/js/chartist-plugin-tooltip.min.js');
        mix.copy($AdminResAs+'/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js',$AdminPubAs+'/js/jquery-jvectormap-2.0.2.min.js');
        mix.copy($AdminResAs+'/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js',$AdminPubAs+'/js/jquery-jvectormap-world-mill-en.js');
        mix.copy($AdminResAs+'/dist/js/pages/dashboards/dashboard1.min.js',$AdminPubAs+'/js/dashboard1.min.js');

        mix.copy($AdminResAs+'/assets/images',$AdminPubAs+'/assets/images');
        mix.copy($AdminResAs+'/scss/icons',$AdminPubAs+'/scss/icons');
        mix.copy($AdminResAs+'/dist/css/icons/font-awesome/webfonts',$AdminPubAs+'/css/icons/font-awesome/webfonts');
        mix.copy($AdminResAs+'/dist/js/map/feather.min.js.map',$AdminPubAs+'/js');
        mix.copy($AdminResAs+'/dist/js/map/chartist.min.js.map',$AdminPubAs+'/js');
        mix.copy($AdminResAs+'/dist/js/map/chartist-plugin-tooltip.min.js.map',$AdminPubAs+'/js');
        mix.copy($AdminResAs+'/assets/images/custom-select.png','public/assets/images/custom-select.png');

        mix.copy('resources/js/datatables.net/js/jquery.dataTables.min.js',$AdminPubAs+'/js/datatable');
        mix.copy('resources/js/datatable/datatable-basic.init.js',$AdminPubAs+'/js/datatable');
        mix.copy($AdminResAs+'/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css',$AdminPubAs+'/css');


    mix.js("resources/js/app.js", "public/js")
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .combine([
        $AdminResAs+'/assets/libs/jquery/dist/jquery.min.js',
        $AdminResAs+'/assets/libs/popperjs/dist/umd/popper.min.js',
        $AdminResAs+'/assets/libs/bootstrap/dist/js/bootstrap.min.js',
        $AdminResAs+'/dist/js/app-style-switcher.js',
        $AdminResAs+'/dist/js/feather.min.js',
        $AdminResAs+'/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js',
        $AdminResAs+'/dist/js/sidebarmenu.js',
        $AdminResAs+'/dist/js/custom.min.js',
        
    ], $AdminPubAs+'/js/hc-admin.js')
    .styles([
        $AdminResAs+'/assets/extra-libs/c3/c3.min.css',
        $AdminResAs+'/assets/libs/chartist/dist/chartist.min.css',
        $AdminResAs+'/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css',
        $AdminResAs+'/dist/css/style.min.css',
    ], $AdminPubAs+'/css/hc-admin.css')
    .sourceMaps();
    mix.version()
        .browserSync('http://localhost:8000');

// PuppieStar Mix
const $PuppieResAs = 'resources/assets/front';
const $PuppiePubAs = 'public/puppiestar';

mix.copy($PuppieResAs + '/js/jquery-3.3.1.min.js', $PuppiePubAs+'/js');
mix.copy($PuppieResAs + '/fonts', $PuppiePubAs+'/fonts');
mix.copy($PuppieResAs + '/img', $PuppiePubAs+'/img');
mix.copy($PuppieResAs + '/css/bootstrap.min.css.map', $PuppiePubAs+'/css');
mix.copy($PuppieResAs + '/js/bootstrap.min.js.map', $PuppiePubAs+'/js');




mix.js("resources/js/app.js", "public/puppiestar/js")
    .combine([
        
        $PuppieResAs + '/js/bootstrap.min.js',
        $PuppieResAs + '/js/jquery-ui.min.js',
        $PuppieResAs + '/js/jquery.countdown.min.js',
        $PuppieResAs + '/js/jquery.nice-select.min.js',
        $PuppieResAs + '/js/jquery.zoom.min.js',
        $PuppieResAs + '/js/jquery.dd.min.js',
        $PuppieResAs + '/js/jquery.slicknav.js',
        $PuppieResAs + '/js/owl.carousel.min.js',
        $PuppieResAs + '/js/main.js',
    ], $PuppiePubAs + '/js/hc-puppiestar.js')

    .styles([
        $PuppieResAs + '/css/bootstrap.min.css',
        $PuppieResAs + '/css/font-awesome.min.css',
        $PuppieResAs + '/css/themify-icons.css',
        $PuppieResAs + '/css/elegant-icons.css',
        $PuppieResAs + '/css/owl.carousel.min.css',
        $PuppieResAs + '/css/nice-select.css',
        $PuppieResAs + '/css/jquery-ui.min.css',
        $PuppieResAs + '/css/slicknav.min.css',
        $PuppieResAs + '/css/bootstrap.min.css',
        $PuppieResAs + '/css/bootstrap.min.css',
        $PuppieResAs + '/css/style.css',
    ], $PuppiePubAs + '/css/hc-admin.css')

    .sourceMaps();
    mix.version()
        .browserSync('http://localhost:8000');

