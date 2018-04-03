/* ==============================================
GO TO TOP
=============================================== */

export default function $goTop() {
  $(function() {
    $(window).scroll(function() {
      if ($(this).scrollTop() > 50) {
        $('.back-to-top').fadeIn('slow')
      } else {
        $('.back-to-top').fadeOut('slow')
      }
    })
    $('.back-to-top').click(function() {
      $('html, body').animate({
        scrollTop: 0
      }, 500)
      return false
    })
  })
}
