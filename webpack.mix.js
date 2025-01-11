const mix = require("laravel-mix");

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

// Globals
mix.autoload({ jquery: ["$", "jQuery"] });
mix.browserSync("127.0.0.1:8000").disableNotifications();

// Build css/js
mix.postCss("resources/assets/css/app.css", "public/css/app.min.css", [
    require("tailwindcss"),
]).scripts(require("./resources/assets/js/app.js"), "public/js/app.min.js");

// Build medias
mix.copyDirectory("resources/assets/medias", "public/medias");
