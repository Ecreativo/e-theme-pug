/* ==============================================
  burger icon
  =============================================== */

export default function burgerIcon() {
  $(function() {
    if ($('.burger__container').length) {
      $('.burger__icon').on('click', function(event) {
        event.preventDefault()
        $('.burger__container ~ ul').toggleClass('show-on-mobile')
        // when clicked on mobile-menu, normal menu is shown as a list, classic rwd menu story
        $('.burger__icon').toggleClass('is-active')

        // remove this for now.
        // $('html').toggleClass('is-noscroll is-noscroll-long')
      })
    }
  })
}
