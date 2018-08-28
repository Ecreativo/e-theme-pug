import Flickity from 'flickity-bg-lazyload'
require('flickity-imagesloaded')
/* ==============================================
  Flickity
  =============================================== */
export default function $slider() {
  if ($('.property-slider').length) {
    $(window).on('load', function() {
      // Main slider options
      let options = {
        cellSelector: '.custom_slide',
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

      const galleryElems = document.querySelectorAll('.modal')

      for (let i = 0, len = galleryElems.length; i < len; i++) {
        
        let sliders = {}
        var galleryElem = galleryElems[i].querySelector('.property-slider')
        sliders[galleryElems[i].id] = new Flickity(galleryElem, options) // eslint-disable-line
        $(galleryElems[i]).on('shown.bs.modal', function(event) {
          sliders[galleryElems[i].id].resize()
        });

        // show
        // galleryElems[i].classList.remove('d-none')
        // // trigger redraw for transition
        // galleryElems[i].offsetHeight // eslint-disable-line
      }
      const slider = galleryElem
      return slider
    })
  }
}
