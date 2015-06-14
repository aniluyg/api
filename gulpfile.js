var elixir = require('laravel-elixir');
process.env.DISABLE_NOTIFIER = true;
/*
   |--------------------------------------------------------------------------
   | Elixir Asset Management
   |--------------------------------------------------------------------------
   |
   | Elixir provides a clean, fluent API for defining some basic Gulp tasks
   | for your Laravel application. By default, we are compiling the Less
   | file for our application, as well as publishing vendor resources.
   |
   */

elixir(function(mix) {
    mix.less('app.less');
    mix.scripts([
            "vendors/jquery.js",
            "app.js",
            "scripts.js"

    ]);
});