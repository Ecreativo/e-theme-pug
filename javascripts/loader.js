/* ==============================================
LOADER
=============================================== */

export default function $loader() {
  var $loader = {
    el: '#loader',
    in: function() {
      $(this.el).fadeIn()
    },

    out: function() {
      $(this.el).fadeOut('slow')
    }
  }

  $(window).on('load', function() {
    $loader.out()
  })
}

// todo cover loader to a class with a construtor.
// example of construtor
// class Entry {
//   constructor(el) {
//       this.DOM = {
//           el: el
//       };
//       this.init();
//   }
//   init() {
//       // DOM elements:
//       // title
//       this.DOM.title = this.DOM.el.querySelector('.section__content > .section__title');
//       charming(this.DOM.title);
//       this.DOM.titleLetters = this.DOM.title.querySelectorAll('span');
//       // description
//       this.DOM.description = this.DOM.el.querySelector('.section__content > .section__description');
//       // image
//       this.DOM.image = this.DOM.el.querySelector('.section__img > .section__img-inner');
//       // more box
//       this.DOM.more = this.DOM.el.querySelector('.section__more > .section__more-inner');
//   }
// }
