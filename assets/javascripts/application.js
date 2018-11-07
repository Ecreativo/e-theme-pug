import $loader from './loader'
import $goTop from './go-top'
import $burgerIcon from './burguer-icon'
import $slider from './slider'
import $initMap from './map'
// import Isotope from './isotope';
// import magnificPopup from 'magnific-popup'

// import main style
import '../scss/main.scss'
import 'font-awesome/scss/font-awesome.scss'

(function($, window, document, undefined) {
  'use strict'
  $slider()
  $goTop()
  $loader()
  $burgerIcon()
  $initMap()
})(jQuery, window, document)
