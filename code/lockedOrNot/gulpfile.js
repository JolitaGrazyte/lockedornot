var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

//elixir(function(mix) {
//    mix.sass('app.scss');
//});


elixir(function(mix) {
    var bootstrapPath       =   'node_modules/bootstrap-sass/assets';
    var waypointsPath       =   'node_modules/waypoints/lib';
    var jqueryPath          =   'bower_components/jquery/dist';
    var jqueryStepsPath     =   'bower_components/jquery.steps/build';
    var jqueryValid         =   'bower_components/jquery-validation/dist';

    mix
        .sass('app.scss', 'public/css/app.css')
        .sass('admin.scss', 'public/css/admin.css')
        .copy(bootstrapPath + '/fonts', 'public/fonts')
        .copy(bootstrapPath + '/javascripts/bootstrap.min.js', 'public/js')
        //.copy(waypointsPath + '/noframework.waypoints.min.js', 'public/js')
        .copy(jqueryPath + '/jquery.min.js', 'public/js')
        .copy(jqueryStepsPath + '/jquery.steps.min.js','public/js')
        .copy(jqueryValid + '/jquery.validate.min.js','public/js');
});