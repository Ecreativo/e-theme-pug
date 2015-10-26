var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var config      = require('../../config').browsersync.development;

/**
 * Start a server and watch changes with BrowserSync
 */
gulp.task('browsersync', ['build'], function() {
	browserSync.init(config.options);
});


	
	 