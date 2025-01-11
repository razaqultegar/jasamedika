const mix = require("laravel-mix");
const glob = require("glob");
const fs = require("fs");
const path = require("path");

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
mix.options({ cssNano: { discardComments: true } });

// Build css/js
mix.postCss("resources/assets/css/app.css", "public/css/app.min.css", [
    require("tailwindcss"),
]).scripts(require("./resources/assets/js/app.js"), "public/js/app.min.js");

// Build medias
mix.copyDirectory("resources/assets/medias", "public/medias");

// Build third-party plugins
(glob.sync("resources/assets/plugins/**/*.css") || []).forEach((file) => {
    mix.postCss(file, `public/${file.replace("resources/assets/", "")
        .replace(".css", ".min.css")}`);
});

(glob.sync("resources/assets/plugins/**/*.js.json") || []).forEach((file) => {
    let filePaths = JSON.parse(fs.readFileSync(file, "utf-8"));
    const fileName = path.basename(file).replace(".js.json", "");

    mix.scripts(filePaths, `public/plugins/${fileName}/${fileName}.min.js`);
});

// Build single page use scripts
(glob.sync("resources/assets/js/pages/**/*.js") || []).forEach((file) => {
    mix.scripts(file, `public/${file.replace("resources/assets/", "")
        .replace(".js", ".min.js")}`);
});
