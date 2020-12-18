// gulp pot
const gulp = require('gulp');
const gulpif = require('gulp-if');
const del = require('del');
const wpPot = require('gulp-wp-pot');
const replace = require('gulp-replace');
const rename = require('gulp-rename');

const config = {
  "text_domain" : "starter-wp-theme",
  "twig_files"  : "views/**/*.twig",
  "php_files"   : "**/*.php",
  "cacheFolder" : "views/temp",
  "destFolder"  : "languages",
};

const gettext_regex = {
  simple: /(__|_e|translate|esc_attr__|esc_attr_e|esc_html__|esc_html_e)\(\s*?['"].+?['"]\s*?,\s*?['"].+?['"]\s*?\)/g,
  plural: /_n\(\s*?['"].*?['"]\s*?,\s*?['"].*?['"]\s*?,\s*?.+?\s*?,\s*?['"].+?['"]\s*?\)/g,
  disambiguation: /(_x|_ex|_nx|esc_attr_x|esc_html_x)\(\s*?['"].+?['"]\s*?,\s*?['"].+?['"]\s*?,\s*?['"].+?['"]\s*?\)/g,
  noop: /(_n_noop|_nx_noop)\((\s*?['"].+?['"]\s*?),(\s*?['"]\w+?['"]\s*?,){0,1}\s*?['"].+?['"]\s*?\)/g,
};

gulp.task('compile-twig', () => {
  return gulp.src(config.twig_files)
    .pipe(replace(gettext_regex.simple, match => `<?php ${match}; ?>`))
    .pipe(replace(gettext_regex.plural, match => `<?php ${match}; ?>`))
    .pipe(replace(gettext_regex.disambiguation, match => `<?php ${match}; ?>`))
    .pipe(replace(gettext_regex.noop, match => `<?php ${match}; ?>`))
    .pipe(rename({
      extname: '.php',
    }))
    .pipe(gulp.dest(config.cacheFolder));
});

gulp.task('generate-pot', () => {
  const output = gulp.src(config.php_files)
    .pipe(wpPot({
      domain: config.text_domain
    }))
    .pipe(gulp.dest(`${config.destFolder}/${config.text_domain}.pot`))
  return output;
});

gulp.task('clean-temp', function(){
   return del('views/temp/**', {force:true});
});

gulp.task('pot', gulp.series('compile-twig', 'generate-pot', 'clean-temp'));

// gulp style
'use strict';
 
var sass = require("gulp-sass"),
    postcss = require("gulp-postcss"),
    autoprefixer = require("autoprefixer"),
    cssnano = require("cssnano");

var paths = {
    styles: {
      src: "assets/sass/*.scss",
      dest: "assets/css/"
    }
};

function style() {
  return gulp
  .src(paths.styles.src)
  .pipe(sass())
  .on("error", sass.logError)
  .pipe(postcss([autoprefixer(), cssnano()]))
  .pipe(gulp.dest(paths.styles.dest));
}

exports.style = style;

var build = gulp.parallel(style);

gulp.task('build', build);

gulp.task('default', build);