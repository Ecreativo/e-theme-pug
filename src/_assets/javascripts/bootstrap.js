window.$ = window.jQuery = require('jquery')
window.Popper = require('popper.js')

// If you don't have ES6 transpiler or have TypeScript then you could use distributed version but will loose module customization
//import 'bootstrap/dist/js/bootstrap';


// import all bootstrap
//require('bootstrap')

// import plugins individually
import 'bootstrap/js/dist/util';
import 'bootstrap/js/dist/modal';
import 'bootstrap/js/dist/tooltip';
import 'bootstrap/js/dist/popover';

// If you have ES6 transpiler then you could code below and will be able to customize what modules will be included in the build.
//import 'bootstrap/js/src/alert';
//import 'bootstrap/js/src/button';
//import 'bootstrap/js/src/carousel';
//import 'bootstrap/js/src/collapse';
//import 'bootstrap/js/src/dropdown';
//import 'bootstrap/js/src/modal';
//import 'bootstrap/js/src/popover';
//import 'bootstrap/js/src/scrollspy';
//import 'bootstrap/js/src/tab';
//import 'bootstrap/js/src/tooltip';
//import 'bootstrap/js/src/util';

//import '../scss/main.scss'

// use tooltip and popover components everywhere
$(function (){
  $('[data-toggle="tooltip"]').tooltip()
  $('[data-toggle="popover"]').popover()
})