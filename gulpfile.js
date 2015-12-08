// including plugins
var gulp = require('gulp')
var uglify = require("gulp-uglify");
var concat = require("gulp-concat");

// task
gulp.task('minify-js', function () {
    gulp.src([
      './content/themes/elements/js/vendor/pace.js',
      './content/themes/elements/js/vendor/scroll.js',
      './content/themes/elements/js/vendor/imagesLoaded.js',
      './content/themes/elements/js/vendor/lazyload.js',
      './content/themes/elements/js/vendor/isotope.js',
      './content/themes/elements/js/vendor/jquery.mobile.custom.min.js',
      './content/themes/elements/js/vendor/jquery.waypoints.min.js',
      './content/themes/elements/js/vendor/sticky.min.js',
      './content/themes/elements/js/vendor/skrollr.js',
      './content/themes/elements/js/vendor/slider.js',
      './content/themes/elements/js/pageload.js',
      './content/themes/elements/js/resize.js',
      './content/themes/elements/js/product-filter.js',
      './content/themes/elements/js/hero.js',
      './content/themes/elements/js/link-heading.js',
      './content/themes/elements/js/menu.js',
      './content/themes/elements/js/download-button.js',
      './content/themes/elements/js/video.js',
      './content/themes/elements/js/search.js',
      './content/themes/elements/js/init-isotope.js',
      './content/themes/elements/js/init-skrollr.js',
      './content/themes/elements/js/init-waypoints.js',
      './content/themes/elements/js/init-slider.js'
    ])
    .pipe(uglify())
    .pipe(gulp.dest('./content/themes/elements/js/min'));
});

// task
gulp.task('concat', function () {
    gulp.src([
      './content/themes/elements/js/min/pace.js',
      './content/themes/elements/js/min/scroll.js',
      './content/themes/elements/js/min/imagesLoaded.js',
      './content/themes/elements/js/min/lazyload.js',
      './content/themes/elements/js/min/isotope.js',
      './content/themes/elements/js/min/jquery.mobile.custom.min.js',
      './content/themes/elements/js/min/jquery.waypoints.min.js',
      './content/themes/elements/js/min/sticky.min.js',
      './content/themes/elements/js/min/skrollr.js',
      './content/themes/elements/js/min/slider.js',
      './content/themes/elements/js/min/pageload.js',
      './content/themes/elements/js/min/resize.js',
      './content/themes/elements/js/product-filter.js',
      './content/themes/elements/js/min/hero.js',
      './content/themes/elements/js/min/link-heading.js',
      './content/themes/elements/js/menu.js',
      './content/themes/elements/js/min/download-button.js',
      './content/themes/elements/js/min/video.js',
      './content/themes/elements/js/min/search.js',
      './content/themes/elements/js/min/init-isotope.js',
      './content/themes/elements/js/min/init-skrollr.js',
      './content/themes/elements/js/min/init-waypoints.js',
      './content/themes/elements/js/init-slider.js'
    ]) // path to your files
    .pipe(concat('app.js'))  // concat and name it "concat.js"
    .pipe(gulp.dest('./content/themes/elements/js'));
});

gulp.task('default', function () {
  gulp.run('minify-js');
  gulp.run('concat');
});