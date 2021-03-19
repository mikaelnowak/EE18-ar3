const eTable = document.querySelector('table');
const eKnapp = document.querySelector('button');

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

    var LastCell = newRow.insertCell();
    LastCell.contentEditable = "true";
    LastCell.innerText = '...';
});

eKnapp.addEventListener('click', function() {
    //console.log(eTable);

    /* for (i = 1; i < eTable.rows.length; i++) {

    var objCells = eTable.rows.item(i).cells;

        for (var a = 0; a < objCells.length; a++) {
        console.log(objCells.item(a).innerHTML);
        }
    } */
    const eCeller = document.querySelectorAll('td');

    eCeller.forEach(cell => {
       console.log(cell.innerText);

       var formData = new FormData();
       formData.append("texten", "hej");

       fetch('./spara.php', {
         method: "post",
         body: formData
       })                                 //Skicka 
       .then(response => response.text()) //Ta emot
    });

});