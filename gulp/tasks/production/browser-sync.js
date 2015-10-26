var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var config      = require('../../config').browsersync.production;

/**
 * Start a server and watch changes with BrowserSync
 */
gulp.task('browsersync:production', ['build:production'], function() {
	browserSync.init(config);
});
