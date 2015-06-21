// Load plugins
var gulp = require('gulp')
  , plugins = require('gulp-load-plugins')({ camelize: true })
  , lr = require('tiny-lr')
  , server = lr()
  , sass = require("gulp-ruby-sass")
  , sourcemaps = require('gulp-sourcemaps')
  , browserSync = require('browser-sync').create();

// Static Server + watching scss/html files
gulp.task('serve', ['styles'], function () {

  browserSync.init({
    proxy: "http://rwom.dev"
  });

  gulp.watch('assets/styles/**/*.scss', ['styles']);
  gulp.watch('assets/js/{source,vendor}/*.js', ['plugins', 'scripts']);
  //gulp.watch('assets/images/**/*', ['images']);
  gulp.watch("*.php").on('change', browserSync.reload);
});

/**
 * Compile with gulp-ruby-sass + source maps
 */
gulp.task('styles', function () {

  return sass('assets/styles', { style: 'expanded', sourcemap: true, require: ['breakpoint'] })
    .on('error', function (err) {
      console.error('Error!', err.message);
    })
    .pipe(plugins.autoprefixer())
    .pipe(gulp.dest('assets/styles/build'))
    .pipe(sourcemaps.write('./', {
      includeContent: false,
      sourceRoot: './assets/styles'
    }))
    .pipe(browserSync.stream())
    .pipe(plugins.minifyCss({ keepSpecialComments: 0 }))
    .pipe(plugins.rename({ suffix: '.min' }))
    .pipe(gulp.dest('assets/styles/build'));
});

// Vendor Plugin Scripts
gulp.task('plugins', function () {
  return gulp.src(['assets/js/source/scripts.js', 'assets/js/vendor/*.js'])
    .pipe(plugins.concat('scripts.js'))
    .pipe(gulp.dest('assets/js/build'))
    .pipe(plugins.rename({ suffix: '.min' }))
    .pipe(plugins.uglify())
    .pipe(gulp.dest('assets/js/build'))
    .pipe(plugins.notify({ message: 'Vendor: Scripts task complete' }));
});

// Site Scripts
gulp.task('scripts', function () {
  return gulp.src(['assets/js/source/*.js', '!assets/js/source/scripts.js'])
    .pipe(plugins.jshint('.jshintrc'))
    .pipe(plugins.jshint.reporter('default'))
    .pipe(plugins.concat('main.js'))
    .pipe(gulp.dest('assets/js/build'))
    .pipe(plugins.rename({ suffix: '.min' }))
    .pipe(plugins.uglify())
    .pipe(gulp.dest('assets/js/build'))
    .pipe(plugins.notify({ message: 'Site: Scripts task complete' }));
});

// Images
gulp.task('images', function () {
  return gulp.src('assets/images/**/*')
    .pipe(plugins.cache(plugins.imagemin({ optimizationLevel: 7, progressive: true, interlaced: true })))
    .pipe(gulp.dest('assets/images'))
    .pipe(plugins.notify({ message: 'Images task complete' }));
});

// Watch
gulp.task('watch', function () {

  // Listen on port 35729
  server.listen(35729, function (err) {
    if (err) {
      return console.log(err)
    }

    // Watch .scss files
    gulp.watch('assets/styles/**/*.scss', ['styles']);

    // Watch .js files
    gulp.watch('assets/js/**/*.js', ['plugins', 'scripts']);

    // Watch image files
    gulp.watch('assets/images/**/*', ['images']);

  });

});

// Default task
gulp.task('default', ['styles', 'plugins', 'scripts', 'images', 'serve']);