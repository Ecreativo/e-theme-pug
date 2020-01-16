import Flickity from 'flickity-bg-lazyload'
require('flickity-imagesloaded')
/* ==============================================
  Flickity
  =============================================== */
export default function $slider() {
  if ($('.slider').length) {
    $(window).on('load', function() {
      // Main slider options
      const options = {
        cellSelector: '.slide',
        accessibility: false,
        cellAlign: 'center',
        draggable: true,
        autoPlay: true,
        wrapAround: true,
        prevNextButtons: true,
        pageDots: false,
        bgLazyLoad: true,
        imagesLoaded: true
      }

      /* eslint-disable */
        // disable/enable options adapting to different screen sizes
        if (matchMedia('screen and (max-width: 375px)').matches) {
          // options.prevNextButtons = false
        }

        if (matchMedia('screen and (min-width: 576px)').matches) {}

        if (matchMedia('screen and (min-width: 768px)').matches) {}

        if (matchMedia('screen and (min-width: 992px)').matches) {}

        if (matchMedia('screen and (min-width: 1200px)').matches) {}

        if (matchMedia('screen and (min-width: 1480px)').matches) {}
        /* eslint-enable */

      const sliderElem = document.querySelector('.slider')
      // show
      sliderElem.classList.remove('d-none')
      // trigger redraw for transition
      sliderElem.offsetHeight // eslint-disable-line

      const slider = new Flickity(sliderElem, options)
      return slider
    })
  }
}
