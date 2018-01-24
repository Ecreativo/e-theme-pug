/*eslint-disable */
/* ==============================================
  Google map
  =============================================== */

export default function $initMap() {
  jQuery(document).ready(function($) {
    if ($('#mapBox').length) {
      var $zoom = $('#mapBox').data('zoom')

      var map
      var bounds = new google.maps.LatLngBounds()
      map = new google.maps.Map(document.getElementById('mapBox'), {
        zoom: $zoom
      })

      // Multiple Markers
      var markers = [
        ['Baitul Futuh, London', 51.396983, -0.199299],
        ['Mezquita Fazl, London', 51.451182, -0.207308]
      ]

      // Loop through our array of markers & place each one on the map
      var i = 0

      for (i = 0; i < markers.length; i++) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2])
        bounds.extend(position)
        var marker = new google.maps.Marker({
          position: position,
          map: map,
          title: markers[i][0]
        })

        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds)
      }
    }
  })
}
