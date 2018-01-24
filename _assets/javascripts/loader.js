/* ==============================================
LOADER
=============================================== */

export default function $loader() {
  // function load() {
  // $('.loader').fadeIn()
  // }

  function download() {
    $('.loader').fadeOut()
  }

  $(window).on('load', function() {
    download()
  })
}
