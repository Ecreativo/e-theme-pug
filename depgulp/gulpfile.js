/*
* Dependencias


// Include Gulp
var gulp                    = require('gulp');

// CSS plugins
//var sass                    = require('gulp-sass');
//var combineMediaQueries     = require('gulp-combine-media-queries');
var prefix            		= require('gulp-autoprefixer');
var minifyCSS 				= require('gulp-minify-css');
var uncss 					= require('gulp-uncss');
var concatCss 				= require('gulp-concat-css'):

// JS plugins
var concat                  = require('gulp-concat');
var uglify                  = require('gulp-uglify');

// Image plugins
var imagemin                = require('gulp-imagemin');
//var svgmin                  = require('gulp-svgmin');

// General plugins
var replace					= require('gulp-replace');
var	connect 				= require('gulp-connect-php');
var browserSync             = require('browser-sync');
var notify                  = require('gulp-notify');
var rename 					= require('gulp-rename');
*/



/*
* Dependencias 
* npm install --save-dev gulp gulp-connect-php browser-sync gulp-concat gulp-replace gulp-minify-css gulp-concat-css gulp-notify gulp-rename gulp-autoprefixer gulp-uncss gulp-uglify gulp-imagemin
*/
var gulp = require('gulp'),
  	connect = require('gulp-connect-php'),
	browserSync = require('browser-sync'),
  	concat = require('gulp-concat'),
  	replace = require('gulp-replace'),
  	imagemin = require('gulp-imagemin'),
  	minifyCSS = require('gulp-minify-css'),
	concatCss = require('gulp-concat-css'),
	notify = require('gulp-notify'),
  	rename = require('gulp-rename'),
  	prefix = require('gulp-autoprefixer'),
  	uncss = require('gulp-uncss'),
  	uglify = require('gulp-uglify');
	

//Init task
gulp.task('init', function(){
  gulp.src(['../public_html/**/*', '../public_html/.htaccess'])
    .pipe(replace('wiwuxboilerplate.com', 'node'))
    .pipe(gulp.dest('../public_html/'))
    .pipe(notify("Ha finalizado la task Init!"));
    
});

//Server LiveReload task
//Connet Localhost
gulp.task('connect-sync', function() {
	connect.server({}, function() {
		browserSync({
			proxy: 'http://localhost/wiwuxboilerplate.com/'
		});
	});
	
}); 

//Scripts task
//Uglifies
//Watch Js
gulp.task('scripts', function() {
	gulp.src('../content/js/*.js')
	.pipe(concat('allcumains,js'))
	.pipe(uglify())
	.pipe(rename('allcumains.min.js'))
	.pipe(gulp.dest('../content/js/min/'))
	.pipe(notify("Ha finalizado la task scripts!"))
	browserSync.reload();
});

//Styles task
//Uglifies
//Watch Css	
gulp.task('styles', function () {
return gulp.src('../content/css/*.css')
    .pipe(concatCss("style.css"))
    .pipe(uncss({
            html: ['../content/private/html/*.html', 'http://www.wiwuxboilerplate.com/index.php']
        }))
    .pipe(prefix('last 2 versions', '> 5%', 'ie 9'))
    .pipe(minifyCSS({keepBreaks:false}))
    .pipe(rename('style.min.css'))
    .pipe(gulp.dest('../public_html/'))
    .pipe(notify("Ha finalizado la task styles!"))
	browserSync.reload();
});
 
//Image task
//Compress
//Watch Images
gulp.task('images', function(){
	gulp.src('../content/private/images/**/*.*')
	.pipe(imagemin())
	.pipe(gulp.dest('../content/img/'))
	.pipe(notify("Ha finalizado la task images!"));
	browserSync.reload();
});

//Watch task
//Watch Html
gulp.task('html', function() {
	browserSync.reload();
});
//Watch task
//Watch Php
gulp.task('php', function() {
	browserSync.reload();
});


gulp.task('default', ['connect-sync', 'scripts', 'styles', 'images'], function() {
	// watch for changes
	gulp.watch('../public_html/*', ['html']);
	gulp.watch('../content/css/*.css', ['styles']);
    gulp.watch('../content/js/**/*.js', ['scripts']);
    gulp.watch('../content/images/**/*.*', ['images']);
    gulp.watch('../public_html/**/*.php', ['php']);
});
