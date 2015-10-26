var gulp        = require('gulp');
var changed     = require('gulp-changed');
var browsersync = require('browser-sync');
var config      = require('../../config').jekyll.production;

/**
 * Build the Jekyll Site
 */
gulp.task('jekyll:production', function(done) {
  browsersync.notify('Compiling Jekyll (Production)');

  return gulp.src(config.src)
  	.pipe(changed(config.dest)) // Ignore unchanged files
  	.pipe(gulp.dest(config.dest));
});

gulp.task('jekyll-rebuild:production', ['jekyll:production'], function() {
  browsersync.reload();
});