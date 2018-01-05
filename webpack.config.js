var Encore = require('@symfony/webpack-encore');

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // uncomment to create hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    // uncomment to define the assets of the project
    .addEntry('js/jquery', './assets/js/jquery-2.2.4.min.js')
    .addEntry('js/materialize', './assets/js/materialize.js')
    .addEntry('js/anime', './assets/js/anime.min.js')
    .addEntry('js/app', './assets/js/app.js')
    .addEntry('js/about', './assets/js/about.js')
    .addEntry('js/home', './assets/js/home.js')
    .addEntry('js/hammer', './assets/js/hammer.min.js')
    
    .addStyleEntry('css/home', './assets/css/home.scss')
    .addStyleEntry('css/about', './assets/css/about.scss')
    .addStyleEntry('css/app', './assets/css/app.scss')
    .addStyleEntry('css/materialize', './assets/css/materialize.min.css')


    // uncomment if you use Sass/SCSS files
    .enableSassLoader()

    // uncomment for legacy applications that require $/jQuery as a global variable
    //.autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();
