var elixir = require('laravel-elixir');

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
    
    // mix.phpUnit();
    
    mix.less('app.less').styles([
        'app.css'
    ], 'public/css/_all.css', 'public/css');
    
    mix.coffee().scripts([
        'app.js',
        'utils.js'
    ], 'public/js/_all.js', 'public/js')
    
    mix.version([
        'public/css/_all.css',
        'public/js/_all.js'
    ]);
    
});
