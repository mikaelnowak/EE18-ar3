const eTable = document.querySelector('table');

mapboxgl.accessToken = 'pk.eyJ1IjoiZ3VubmFybnRpIiwiYSI6ImNrbDZkcnFjdDBvNGUycXFwc2RmbzM3bHAifQ.IlYnjpgsvyrVe-IC6k3RsQ'; // replace this with your access token

var map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/gunnarnti/ckm1xg7kxamz717qkr8lc8wqg',
  center: [18.066675, 59.326885],
  zoom: 10
});

map.on("click", function(e) {
    console.log('hej', e.lngLat);

    var marker1 = new mapboxgl.Marker()
        .setLngLat(e.lngLat)
        .addTo(map);

    var newRow = eTable.insertRow();
    newRow.insertCell().innerText = e.lngLat.lng;
    newRow.insertCell().innerText = e.lngLat.lat;
    newRow.insertCell().innerHTML = '<input type="text"'>;
});