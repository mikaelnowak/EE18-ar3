const mappen = document.getElementById("map");

mapboxgl.accessToken = 'pk.eyJ1IjoiZ3VubmFybnRpIiwiYSI6ImNrbDZkcnFjdDBvNGUycXFwc2RmbzM3bHAifQ.IlYnjpgsvyrVe-IC6k3RsQ';

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(visaPosition);
} else {
    p.textContent = "Kan inte hitta din position. Din webbläsare är för gammal!";
}

function visaPosition(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;

    var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/gunnarnti/ckm1xg7kxamz717qkr8lc8wqg',
    center: [position.coords.longitude, position.coords.latitude],
    zoom: 10
    });

    var postData = new FormData();
    postData.append("lat", latitude);
    postData.append("lon", longitude);
}