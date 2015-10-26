/*
* Dependencias 
* npm install --save-dev gulp gulp-connect-php browser-sync gulp-concat gulp-replace gulp-imagemin gulp-minify-css gulp-concat-css gulp-notify gulp-rename gulp-autoprefixer gulp-uncss gulp-uglify gulp-imagemin
*/

var requireDir = require('require-dir');

// Require all tasks in gulp/tasks, including subfolders
requireDir('./gulp/tasks', { recurse: true });