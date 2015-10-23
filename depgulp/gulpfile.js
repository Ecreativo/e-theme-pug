/*
* Dependencias 
* npm install --save-dev gulp gulp-connect-php browser-sync gulp-concat gulp-replace gulp-imagemin gulp-minify-css gulp-concat-css gulp-notify gulp-rename gulp-autoprefixer gulp-uncss gulp-uglify
*/
// Include Gulp
var gulp = require('gulp');

// CSS plugins
var prefix = require('gulp-autoprefixer');
var minifyCSS = require('gulp-minify-css');
var uncss = require('gulp-uncss');
var	concatCss = require('gulp-concat-css');
//var sass                    = require('gulp-sass');
//var combineMediaQueries     = require('gulp-combine-media-queries');

// JS plugins
var concat = require('gulp-concat');
//var uglify = require('gulp-uglify');

// Image plugins
//var imagemin = require('gulp-imagemin');
//var svgmin                  = require('gulp-svgmin');

// General plugins
var replace = require('gulp-replace');
var	notify = require('gulp-notify');
var rename = require('gulp-rename');

// Conet
var connect = require('gulp-connect-php');
var browserSync = require('browser-sync').create();
var reload      = browserSync.reload;
	
//Init task
gulp.task('init', function(){
  gulp.src(['../dev.com/public_html/**/*', '../dev.com/public_html/.htaccess'])
    .pipe(replace('wiwuxboilerplate.com', 'node'))
    .pipe(gulp.dest('../dev.com/public_html/'))
    .pipe(notify("Ha finalizado la task Init!"));
});

//Server LiveReload task
//Connet Localhost
gulp.task('connect-sync', function() {
	connect.server({}, function() {
		browserSync({
			proxy: 'http://localhost/wiwuxboilerplate.com/'
		});
		gulp.watch(['../regalwear.esy.es/public_html/**/*', '../regalwear.esy.es/content/**/*'], reload);
	});
	
});

//Scripts task
//Uglifies
//Watch Js
gulp.task('scripts', function() {
	gulp.src(['../dev.com/content/js/vendor/bootstrap.js', '../dev.com/content/js/vendor/jquery.validate.js', '../dev.com/content/js/*.js'])
	.pipe(concat('allcumains.js'))
	.pipe(uglify())
	.pipe(rename('allcumains.min.js'))
	.pipe(gulp.dest('../dev.com/content/js/min/'))
	.pipe(notify("Ha finalizado la task scripts!"))
	browserSync.reload();
});

//Styles task
//Uglifies
//Watch Css
gulp.task('styles', function () {
	return gulp.src(['../dev.com/content/css/**/*.css', '!../dev.com/content/css/**/*.min.css'])
		.pipe(concatCss("styles.css"))
	    .pipe(uncss({
		        html: ['../dev.com/content/private/html/*.html', 'http://localhost/dev.com/'],
				ignore: [
	                // Bootstrap selectors added via JS
	                ".fade",
	                ".fade.in",
	                ".collapse",
	                /(#|\.)btn(\-[a-zA-Z]+)?/,
	                ".collapsing",
	                ".collapse.in",
	                ".collapsing",
	                /(#|\.)alert(\-[a-zA-Z]+)?/,
	                ".alert-danger",
	                ".open",
	                /\.right/,
	                ".modal-open",
	                /\.modal-open/,
	                "/open+/",
	                ".modal-backdrop",
	                /\w\.in/,
	                /\.open/,
	                /(#|\.)navbar(\-[a-zA-Z]+)?/,
                    /(#|\.)dropdown(\-[a-zA-Z]+)?/,
                    /(#|\.)(open)/,
                    // currently only in a IE conditional, so uncss doesn't see it
                    ".close",
                    ".alert-dismissible"
	           ]
		    }))
	    .pipe(prefix('last 2 versions'))
	    .pipe(minifyCSS({keepBreaks:false}))
	    .pipe(rename('style.min.css'))
	    .pipe(gulp.dest('../dev.com/public_html/'))
	    .pipe(notify("Ha finalizado la task styles!"))
	    browserSync.reload();
});
 
//Image task
//Compress
//Watch Images
gulp.task('images', function(){
	gulp.src('../dev.com/content/private/images/**/*.*')
	.pipe(imagemin())
	.pipe(gulp.dest('../dev.com/content/images/'))
	.pipe(notify("Ha finalizado la task images!"))
	browserSync.reload();
});

gulp.task('default', ['connect-sync', 'scripts', 'styles', 'images'], function() {
	// watch for changes
	gulp.watch('../dev.com/content/css/*.css', ['styles'], reload);
    gulp.watch('../dev.com/content/js/**/*.js', ['scripts'], reload);
    gulp.watch('../dev.com/content/images/**/*.*', ['images'], reload);
});