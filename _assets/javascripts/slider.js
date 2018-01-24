import Flickity from 'flickity'

/* ==============================================
  Flickity
  =============================================== */
export default function $slider(slider) {
  if ($('.slider').length) {
    // Main slider options
    let options = {
      cellSelector: '.slide',
      accessibility: false,
      cellAlign: 'center',
      draggable: true,
      autoPlay: true,
      wrapAround: true,
      prevNextButtons: true,
      pageDots: false,
      lazyLoad: true,
      imagesLoaded: true
    }

    /* eslint-disable */
    // disable/enable options adapting to different screen sizes
    if (matchMedia('screen and (max-width: 375px)').matches) {
      // options.prevNextButtons = false
    }

    if (matchMedia('screen and (min-width: 576px)').matches) {
    }

    if (matchMedia('screen and (min-width: 768px)').matches) {
    }

    if (matchMedia('screen and (min-width: 992px)').matches) {
    }

    if (matchMedia('screen and (min-width: 1200px)').matches) {
    }

    if (matchMedia('screen and (min-width: 1480px)').matches) {
    }
    /* eslint-enable */

    let sliderElem = document.querySelector('.slider')
    let slider = new Flickity(sliderElem, options)
    return slider
  }
}
