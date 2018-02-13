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
