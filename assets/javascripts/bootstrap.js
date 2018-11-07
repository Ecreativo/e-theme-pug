// If you don't have ES6 transpiler or have TypeScript then you could use distributed version but will loose module customization
// import 'bootstrap/dist/js/bootstrap'

// import all bootstrap
// require('bootstrap')

// If you have ES6 transpiler then you could code below and will be able to customize what modules will be included in the build.

// import 'bootstrap/js/src/alert'
// import 'bootstrap/js/src/button'
// import 'bootstrap/js/src/carousel'
// import 'bootstrap/js/src/collapse'
// import 'bootstrap/js/src/dropdown'
// import 'bootstrap/js/src/modal'
// import 'bootstrap/js/src/popover'
// import 'bootstrap/js/src/scrollspy'
// import 'bootstrap/js/src/tab'
// import 'bootstrap/js/src/tooltip'
// import 'bootstrap/js/src/util'

// import plugins individually

// import 'bootstrap/js/dist/alert'
// import 'bootstrap/js/dist/button'
// import 'bootstrap/js/dist/carousel'
import 'bootstrap/js/dist/collapse'
import 'bootstrap/js/dist/dropdown'
import 'bootstrap/js/dist/modal'
import 'bootstrap/js/dist/popover'
// import 'bootstrap/js/dist/scrollspy'
// import 'bootstrap/js/dist/tab'
import 'bootstrap/js/dist/tooltip'
import 'bootstrap/js/dist/util'

// use tooltip and popover components everywhere
if ($('[data-toggle="tooltip"]').length || $('[data-toggle="popover"]').length) {
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    $('[data-toggle="popover"]').popover()
  })
}
