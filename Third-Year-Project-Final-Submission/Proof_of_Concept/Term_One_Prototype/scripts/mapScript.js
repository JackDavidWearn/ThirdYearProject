// Code modified from LeafletJS tutorial
var streetmap = L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=rEB9H4Z1tk1AaMs4H8U7', { id: 'mapid', tileSize: 512, zoomOffset: -1, attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>' }),
    naturalmap = L.tileLayer('https://api.maptiler.com/maps/topographique/{z}/{x}/{y}.png?key=HDGEFv4K5BJ245QWGUsn', { id: 'mapid', tileSize: 512, zoomOffset: -1, attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>' });

var aonbmap = L.map('AONBMap', {
    zoom: 10,
    layers: [streetmap, naturalmap]
}).locate({ setView: true, maxZoom: 13 });;

var baseMaps = {
    "<span style='color: gray'>streetmap</span>": streetmap,
    "naturalmap": naturalmap
};

L.control.scale().setPosition('bottomleft').addTo(aonbmap);
L.control.layers(baseMaps).setPosition('topleft').addTo(aonbmap);

var currentLocationMarker = L.icon({
    iconUrl: 'CurrentLocation.png',
    iconSize: [50, 50],
    iconAnchor: [25, 25],
    popupAnchor: [1, -15]
});

function onLocationFound(e) {
    L.marker(e.latlng).addTo(aonbmap).bindPopup("Current Location").openPopup();
}
aonbmap.on('locationfound', onLocationFound);

function onLocationError(e) {
    alert(e.message);
    aonbmap.setView([51.40780, -0.61498], 13);
}
aonbmap.on('locationerror', onLocationError);

// Based off code from http://jsfiddle.net/z0m14to7/ - Modified to be a searchbar
var searchbar = L.control({ position: 'topright' });
searchbar.onAdd = function (aonbmap) {
    var div = L.DomUtil.create('div', 'searchbar');
    div.innerHTML = '<input id="searchbar" type="text" onkeyup="searchAONB()" placeholder="Search..">';
    return div;
}
searchbar.addTo(aonbmap);

// Getting the markers to appear on the map
var markers = [
    {
        "name": "Surrey Hills",
        "lat": 51.255,
        "lng": -0.3075
    },
    {
        "name": "Isles of Scilly",
        "lat": 49.9220,
        "lng": -6.2955,
    }
];
function searchAONB() {
    var userinput = document.getElementById('searchbar').value;
    var userstring = userinput.toUpperCase();
    var aonbmarkers;

    for (var i = 0; i < markers.length; i++) {
        aonbmarkers = markers[i].name.toUpperCase();
        if (userstring == aonbmarkers) {
            L.marker([markers[i].lat, markers[i].lng]).bindPopup(markers[i].name).addTo(aonbmap);
            aonbmap.setView(new L.LatLng(markers[i].lat, markers[i].lng), 13, { animation: true });
        } else {
            console.log("This is not a location yet");
        }
    }
}

var downloadbutton = L.control({ position: 'topleft' });
downloadbutton.onAdd = function (aonbmap) {
    var downloadbuttondiv = L.DomUtil.create('div', 'downloadbutton');
    downloadbuttondiv.innerHTML = '<button type="button" class="btn btn-light downloadbtn"><i class="fas fa-save"></button>';
    return downloadbuttondiv;
}
downloadbutton.addTo(aonbmap);
