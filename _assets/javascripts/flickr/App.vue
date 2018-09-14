<template lang="pug">
    #appFlickr
      .media__slider.media__slider--img.d-none(v-show='images.length > 0 && !loading')
        .item-gallery--img.col-9.col-sm-6.col-md-4.col-lg-3(v-for='image in images')
          feed-image(:data='image')
      spinner(v-show="loading")
</template>

<script>
  import FeedImage from './components/FeedImage.vue';
  import Spinner from "./components/Spinner.vue";

  import config from './config';
  import axios from 'axios';

  // import Flickity from 'flickity'
  import imagesLoaded from 'imagesloaded';
  import Flickity from 'flickity-bg-lazyload';
  import magnificPopup from 'magnific-popup'

  export default {
    data() {
      return {
        images: [],
        loading: false
      };
    },
    components: {
      FeedImage,
      Spinner
    },
    mounted() {
      let self = this;
      self.images = [];
      self.loading = true;
      self.fetchImages().then((response) => {
        self.images = response.data.photosets.photoset;
        self.loading = false; 
        imagesLoaded( '.media__slider', { background: true }, function() {
          self.imageSlider()
          self.magnificPopUp()
        });
      });
    },
    methods: {
      magnificPopUp() {
        $('.popup-gallerys').each(function() {
          $('.popup-gallerys').magnificPopup({
            delegate: 'a.item__popup__btn',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
              enabled: true,
              navigateByImgClick: true,
              preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
              markup: '<div class="mfp-figure">' +
                        '<div class="mfp-close"></div>' +
                        '<div class="mfp-img"></div>' +
                        '<div class="mfp-bottom-bar">' +
                        '<div class="mfp-counter"></div>' +
                        '</div>' +
                        '<div class="mfp-title"></div>' +
                      '</div>',
              tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
              titleSrc: function(item) {
                return '<div class="mfp__title">' + item.el.attr('data-title') + '</div>'
              }
            }
          })
        })
      },
      imageSlider() {
        // latest images gallery
        const options = {
          cellSelector: '.item-gallery--img',
          accessibility: false,
          autoPlay: 8000,
          wrapAround: true,
          draggable: true,
          prevNextButtons: true,
          pageDots: false,
          setGallerySize: false,
          bgLazyLoad: 3
        }

        // disable/enable options adapting to different screen sizes
        if (matchMedia('screen and (min-width: 576px)').matches) {
          options.groupCells = 2
          options.prevNextButtons = false
          options.cellAlign = 'left'
        }

        if (matchMedia('screen and (min-width: 768px)').matches) {
          options.pageDots = true
          options.prevNextButtons = true
        }

        const sliderElem = document.querySelector('.media__slider.media__slider--img')
        // show
        const $carousel = $('.media__slider.media__slider--img').removeClass('d-none')
        // trigger redraw for transition
        $carousel[0].offsetHeight // eslint-disable-line

        const $slider = new Flickity(sliderElem, options)
        
        return $slider
      },
      fetchImages() {
        return axios({
          method: 'get',
          url: 'https://api.flickr.com/services/rest',
          params: {
            method: 'flickr.photosets.getList',
            api_key: config.api_key,
            // tags: tag,
            user_id: '125042914@N07',
            // extras: 'url_n',
            // page: 1,
            format: 'json',
            nojsoncallback: 1,
            // per_page: 30,
          },
        });
      },
    },
  };
</script>

<style lang='scss'>
// bootstrap functions
@import "~bootstrap/scss/functions";
// bootstrap variables
@import "~bootstrap/scss/variables";
// bootstrap mixins
@import "~bootstrap/scss/mixins";
@import '../../scss/_custom.scss';

.item,
%item {
  //.item__wrap {}
  .item__title {
    min-height: 3.44em;
  } //.item__sub-title {}
  //.item__content {}
  //.item__header {}
  //.item__body {}
  //.item__footer {}
  //.item__desc {}
  //.item__btn {}
  //.item__icon {}
  //.item__media {}
  .item__meta {
    transition: all .35s linear;
    text-transform: uppercase;
  }
  .item__bkg {
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
  }
  .item__img--bkg {
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
  }
  .item__img {
    img {
      @include img-fluid;
    }
  } //.item__video {}
  .is-button-in {
    &:hover {
      .is-button-hidden {
        top: 50%;
        left: 50%;
        transition: opacity .35s ease-out, transform .35s ease-out;
        transform: translate3d(-50%, -50%, 0);
        opacity: 1;
      }
    }
  }
}

.item-gallery,
%item-gallery {
    padding: 0 .94em;
    @extend %item; //&#{&} {}
    &.px-0 {
        padding: 0;
    }
    .item__bkg {
        position: relative;

        height: 13.88em;
    }
    .item__header {
        position: relative;

        display: table;
        overflow: hidden;

        width: 100%;

        backface-visibility: hidden;
        .item__btn__inner {
            width: 100%;
            height: 100%;
            .btn {
                position: absolute;
                top: 50%;
                left: 50%;

                padding: 0 1.5em;

                transform: translate3d(-50%, -50%, 0);
            }
        }
        &:hover {
            &:before {
                transition: opacity .35s ease-out, transform .35s ease-out;

                opacity: 1;
            }
        }
        &:before {
            position: absolute;
            z-index: 1;
            top: 0;
            left: 0;

            width: 100%;
            height: 100%;

            content: '';
            transition: opacity .2s ease-in, transform .2s ease-in;

            opacity: 0;
            background: rgba(67, 80, 97, .7);
        }
        .item__popup__btn {
            display: block;

            width: 100%;
            height: 100%;
        }
    }
    .item__title {
        line-height: 5.1rem;
        min-height: auto;
        margin-bottom: 0;
        
        padding-bottom: 0;

        text-transform: uppercase;

        color: $brand-color;
        color: #435061;
    }
    .item__body {
        overflow: hidden;

        max-height: 5.1rem;
        padding-right: .4em;
        padding-left: .4em;

        text-align: center;

        background-color: $gray-100;
    }

    .item__btn__inner {
        position: absolute;
        z-index: 2;
        top: 50%;
        left: 50%;

        display: flex;

        width: 100%;
        height: auto;
        margin: auto;

        transform: translate3d(-50%, -50%, 0);
        text-align: center;

        justify-content: center;

        backface-visibility: hidden;

        &.is-button-hidden {
            transition: opacity .25s ease-in, transform .25s ease-in;
            transform: translate3d(-50%, 200%, 0);

            opacity: 0;

            backface-visibility: hidden;
        }

        .item__popup__btn {
            &.btn {
                margin-left: .38em;
                padding: 0 1.5em;
            }
        }
        .btn {
            line-height: 2em;

            position: relative;

            height: 32px;
            padding: .2em 1em;

            text-transform: capitalize;

            border: none;
            .icon-search {
                font-size: 1.9rem;
                line-height: 1.2;

                position: absolute;
                top: 50%;
                left: 50%;

                width: 26px;

                transform: translate3d(-50%, -50%, 0);
                &:before {
                    line-height: 1em;

                    position: absolute;
                    top: 50%;
                    left: 50%;

                    width: 20px;

                    transform: translate3d(-50%, -50%, 0);
                }
            }
        }
    }
}

.item-gallery {
    &.album-item {
        overflow: hidden;
        .item__wrap {
            display: table;

            width: 100%;
        }
        .item__header {
            position: relative;

            display: table;
            overflow: hidden;

            width: 100.1%;

            backface-visibility: hidden;
            &:hover {
                &:before {
                    transition: opacity .35s ease-out, transform .35s ease-out;

                    opacity: 1;
                }
            }
            &:before {
                position: absolute;
                top: 0;
                left: 0;

                width: 100%;
                height: 100%;

                content: '';
                transition: opacity .2s ease-in, transform .2s ease-in;

                opacity: 0;
                background: rgba(67, 80, 97, .7);
            }
        }
        .album__slider {
            width: 100%;
            .item__bkg {
                width: 100%;
                padding-top: 56.25%;

                vertical-align: top;
            }
        }
    }
}

.item-gallery--img {
    @extend %item-gallery;
    .item__img--bkg {
        position: relative;

        height: 13.88em;
    }
    .item__bkg {
        width: 100%;
        padding-top: 56.25%;

        vertical-align: top;
    }
    .item__header {
        position: relative;

        display: table;
        overflow: hidden;

        width: 100%;

        backface-visibility: hidden;
        .item__btn__inner {
            width: 100%;
            height: 100%;
            .btn {
                position: absolute;
                top: 50%;
                left: 50%;

                padding: 0 1.5em;

                transform: translate3d(-50%, -50%, 0);
            }
        }
        &:hover {
            &:before {
                transition: opacity .35s ease-out, transform .35s ease-out;

                opacity: 1;
            }
        }
        &:before {
            position: absolute;
            z-index: 1;
            top: 0;
            left: 0;

            width: 100%;
            height: 100%;

            content: '';
            transition: opacity .2s ease-in, transform .2s ease-in;

            opacity: 0;
            background: rgba(67, 80, 97, .7);
        }
        .item__popup__btn {
            display: block;

            width: 100%;
            height: 100%;
        }
    }
}

%media__slider,
.media__slider {
    margin-right: ($grid-gutter-width / -2);
    margin-bottom: 2.31em;
    margin-left: ($grid-gutter-width / -2);

    @include media-breakpoint-up(sm){
        margin-bottom: 2.5em;
    }
}


.media__slider--img {
    @extend %media__slider;

    .flickity-viewport {
        height: 27rem !important;
    }
}
</style>
