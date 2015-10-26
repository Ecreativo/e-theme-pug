var gulp        = require('gulp');
var changed     = require('gulp-changed');
var browsersync = require('browser-sync');
var config      = require('../../config').jekyll.development;

/**
 * Build the Jekyll Site
 */
gulp.task('jekyll', function(done) {
  browsersync.notify('Compiling Jekyll');

  return gulp.src(config.src)
  	.pipe(changed(config.dest)) // Ignore unchanged files
  	.pipe(gulp.dest(config.dest));
});

gulp.task('jekyll-rebuild', ['jekyll'], function() {
  browsersync.reload();
});
