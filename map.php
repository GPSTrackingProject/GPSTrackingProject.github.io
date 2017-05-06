<script>
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 4,
    center: {lat: -33, lng: 151}
  });

  var image = 'car.png';
  var beachMarker = new google.maps.Marker({
    position: {lat: -33.890, lng: 151.274},
    map: map,
    icon: image
  });
}
// To add the marker to the map, call setMap();
marker.setMap(map);
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9bs3xuOS3v7WzVgpqkRpMzGJ0vNPXTcM&callback=initMap">
    </script>