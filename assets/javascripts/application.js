import $loader from './loader'
// import $goTop from './go-top'
import $slider from './slider'
import $initMap from './map'
// import Isotope from './isotope';
// import magnificPopup from 'magnific-popup'

// import main style
import '../scss/main.scss'

(function($, window, document, undefined) {
  $(function () {
    'use strict'
    // DOM ready, take it away
    $slider()
    // $goTop()
    $loader()
    $initMap()
  })
})(jQuery, window, document)
