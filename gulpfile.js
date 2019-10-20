'use strict';
 
var gulp = require("gulp"),
    sass = require("gulp-sass"),
    postcss = require("gulp-postcss"),
    autoprefixer = require("autoprefixer"),
    cssnano = require("cssnano"),
    // sourcemaps = require("gulp-sourcemaps"),
    browserSync = require("browser-sync").create();

var paths = {
    styles: {
        // use any scss files in this location
        src: "assets/sass/*.scss",
        // Compiled files will end up here
        dest: "assets/css/"
    }
};

function style() {
    return gulp
        .src(paths.styles.src)
        // Initialize sourcemaps before compilation starts - disabled
        // .pipe(sourcemaps.init())
        .pipe(sass())
        .on("error", sass.logError)
        // Use postcss with autoprefixer and compress the compiled file using cssnano
        .pipe(postcss([autoprefixer(), cssnano()]))
        // Now add/write the sourcemaps
        // .pipe(sourcemaps.write())
        .pipe(gulp.dest(paths.styles.dest))
        // Add browsersync stream pipe after compilation
        .pipe(browserSync.stream());
}


// A simple task to reload the page
function reload() {
    browserSync.reload();
}

// Add browsersync initialization at the start of the watch task
function watch() {
    browserSync.init({
        // You can tell browserSync to use this directory and serve it as a mini-server
        proxy: "yourproxyurl.link"
        // If you are already serving your website locally using something like xampp (hosts & httpd.conf files!)
        // You can use the proxy setting to proxy that
        // proxy: "syourproxyurl.link"
    });
    gulp.watch(paths.styles.src, style);
    // We should tell gulp which files to watch to trigger the reload
    // This can be html or whatever you're using to develop your website (twig!!)
    gulp.watch("*.twig").on('change', browserSync.reload);
    // gulp.watch("style.scss").on('change', browserSync.reload);
    // gulp.watch("test/*.twig").on('change', browserSync.reload);
    // gulp.watch("assets/css/custom.css").on('change', browserSync.reload);
}

// Don't forget to expose the task!
exports.watch = watch

// Expose the task by exporting it
// This allows you to run it from the commandline using gulp style. this is what I use mainly
exports.style = style;

/*
 * Specify if tasks run in series or parallel using `gulp.series` and `gulp.parallel`
 */
var build = gulp.parallel(style, watch);
 
/*
 * You can still use `gulp.task` to expose tasks
 */
gulp.task('build', build);
 
/*
 * Define default task that can be called by just running `gulp` from cli
 */
gulp.task('default', build);