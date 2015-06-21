// Load plugins
var gulp = require('gulp'),
  plugins = require('gulp-load-plugins')({ camelize: true }),
  lr = require('tiny-lr'),
  server = lr();

// Styles
gulp.task('styles', function() {
  return plugins.rubySass('assets/styles', { style: 'expanded', sourcemap: true, require: ['breakpoint'] })
    .pipe(plugins.autoprefixer('last 2 versions', 'ie 9', 'ios 6', 'android 4'))
    .pipe(gulp.dest('assets/styles/build'))
    .pipe(plugins.minifyCss({ keepSpecialComments: 0 }))
    .pipe(plugins.rename({ suffix: '.min' }))
    .pipe(plugins.livereload(server))
    .pipe(gulp.dest('assets/styles/build'))
    .pipe(plugins.notify({ message: 'Styles task complete' }));
});

// Vendor Plugin Scripts
gulp.task('plugins', function() {
  return gulp.src(['assets/js/source/scripts.js', 'assets/js/vendor/*.js'])
    .pipe(plugins.concat('scripts.js'))
    .pipe(gulp.dest('assets/js/build'))
    .pipe(plugins.rename({ suffix: '.min' }))
    .pipe(plugins.uglify())
    .pipe(plugins.livereload(server))
    .pipe(gulp.dest('assets/js'))
    .pipe(plugins.notify({ message: 'Scripts task complete' }));
});

// Site Scripts
gulp.task('scripts', function() {
  return gulp.src(['assets/js/source/*.js', '!assets/js/source/scripts.js'])
    .pipe(plugins.jshint('.jshintrc'))
    .pipe(plugins.jshint.reporter('default'))
    .pipe(plugins.concat('main.js'))
    .pipe(gulp.dest('assets/js/build'))
    .pipe(plugins.rename({ suffix: '.min' }))
    .pipe(plugins.uglify())
    .pipe(plugins.livereload(server))
    .pipe(gulp.dest('assets/js'))
    .pipe(plugins.notify({ message: 'Scripts task complete' }));
});

// Images
gulp.task('images', function() {
  return gulp.src('assets/images/**/*')
    .pipe(plugins.cache(plugins.imagemin({ optimizationLevel: 7, progressive: true, interlaced: true })))
    .pipe(plugins.livereload(server))
    .pipe(gulp.dest('assets/images'))
    .pipe(plugins.notify({ message: 'Images task complete' }));
});

// Watch
gulp.task('watch', function() {

  // Listen on port 35729
  server.listen(35729, function (err) {
    if (err) {
      return console.log(err)
    };

    // Watch .scss files
    gulp.watch('assets/styles/**/*.scss', ['styles']);

    // Watch .js files
    gulp.watch('assets/js/**/*.js', ['plugins', 'scripts']);

    // Watch image files
    gulp.watch('assets/images/**/*', ['images']);

  });

});

// Default task
gulp.task('default', ['styles', 'plugins', 'scripts', 'images', 'watch']);