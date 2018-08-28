/*eslint-disable */
/* ==============================================
  Google map
  =============================================== */

export default function $initMap() {
  $(window).on('load', function() {
    if ($('#location-tab').length) {
      var casa = {
        lat: 4.720271,
        lng: -74.102174
      };

      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        center: casa,
      });

      var marker = new google.maps.Marker({
        position: casa,
        map: map
      });

      $("a[href='#location']").on('shown.bs.tab', function() {
        google.maps.event.trigger(map, "resize");
        map.setCenter(new google.maps.LatLng(4.720271, -74.102174));
      });
    }
  })
}
