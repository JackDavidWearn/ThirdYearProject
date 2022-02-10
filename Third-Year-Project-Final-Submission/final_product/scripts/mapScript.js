// Code modified from LeafletJS tutorial
// Creates the two forms of map that will be used on the index page. A street map and a natural map which was customised to show 
// more of the terrain heights, etc...
var streetmap = L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=rEB9H4Z1tk1AaMs4H8U7', {
        id: 'mapid',
        tileSize: 512,
        zoomOffset: -1,
        attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
    }),
    naturalmap = L.tileLayer('https://api.maptiler.com/maps/topographique/{z}/{x}/{y}.png?key=HDGEFv4K5BJ245QWGUsn', {
        id: 'mapid',
        tileSize: 512,
        zoomOffset: -1,
        attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
    });

// Creating the variable which will create the map with the two different layers from above, at the zoomed out level of 10. 
// It also uses the .locate funciton which will find the user based on their current location. 
var aonbmap = L.map('AONBMap', {
    zoom: 10,
    layers: [streetmap, naturalmap]
}).locate({
    setView: true,
    maxZoom: 13
});;

var baseMaps = {
    "<span style='color: gray'>streetmap</span>": streetmap,
    "naturalmap": naturalmap
};

// Creating the popup box for displaying the different map layer options. 
L.control.scale().setPosition('bottomleft').addTo(aonbmap);
L.control.layers(baseMaps).setPosition('topleft').addTo(aonbmap);

// Variable for creating the marker which will appear for the users current location if they accept location services. 
var currentLocationMarker = L.icon({
    iconSize: [50, 50],
    iconAnchor: [25, 25],
    popupAnchor: [1, -15]
});

// When the users current locaiton is found, it will create the marker and add it to the map. 
function onLocationFound(e) {
    L.marker(e.latlng).addTo(aonbmap).bindPopup("Current Location").openPopup();
}
aonbmap.on('locationfound', onLocationFound);

// If there is an error, it will give the error message and use a predefined location. 
function onLocationError(e) {
    alert(e.message);
    aonbmap.setView([51.40780, -0.61498], 13);
}
aonbmap.on('locationerror', onLocationError);

// Based off code from http://jsfiddle.net/z0m14to7/ - Modified to be a searchbar
var searchbar = L.control({
    position: 'topright'
});
searchbar.onAdd = function(aonbmap) {
    var div = L.DomUtil.create('div', 'searchbar');
    div.innerHTML = '<input id="searchbar" type="text" onkeyup="searchAONB()" placeholder="Search..">';
    return div;
}
searchbar.addTo(aonbmap);

// Getting the markers to appear on the map
var markers = [{
        "name": "Arnside and Silverdale",
        "lat": 54.1708,
        "lng": -2.7995
    },
    {
        "name": "Blackdown Hills",
        "lat": 50.8826763249596,
        "lng": -3.154449462890624
    },
    {
        "name": "Cannock Chase",
        "lat": 52.74834683007907,
        "lng": -2.0019149780273438
    },
    {
        "name": "Chichester Harbour",
        "lat": 50.80729072259863,
        "lng": -0.8668899536132812
    },
    {
        "name": "Chiltern Hills",
        "lat": 51.69155367255663,
        "lng": -0.9060287475585939
    },
    {
        "name": "Cornwall",
        "lat": 50.55401621902838,
        "lng": -4.552459716796875
    },
    {
        "name": "Cotswolds",
        "lat": 51.72277481454246,
        "lng": -2.091522216796875
    },
    {
        "name": "Cranborne Chase and the West Wiltshire Downs",
        "lat": 51.72277481454246,
        "lng": -2.091522216796875
    },
    {
        "name": "Dedham Vale",
        "lat": 51.97726758181177,
        "lng": 0.9152984619140625
    },
    {
        "name": "Dorset",
        "lat": 50.752097042863106,
        "lng": -2.7074432373046875
    },
    {
        "name": "East Devon",
        "lat": 50.70385104825872,
        "lng": -3.1565093994140625
    },
    {
        "name": "Forest of Bowland",
        "lat": 53.98032002986215,
        "lng": -2.525482177734375
    },
    {
        "name": "High Weald",
        "lat": 51.06362288384342,
        "lng": 0.4593658447265625
    },
    {
        "name": "Howardian Hills",
        "lat": 54.38855462060335,
        "lng": -0.9613037109374999
    },
    {
        "name": "Isle of Wight",
        "lat": 50.6712242729033,
        "lng": -1.29638671875
    },
    {
        "name": "Ilses of Scilly",
        "lat": 49.91895662150218,
        "lng": -6.298255920410156
    },
    {
        "name": "Kent Downs",
        "lat": 51.156523611533814,
        "lng": 0.979156494140625
    },
    {
        "name": "Lincolnshire Wolds",
        "lat": 53.374009960094746,
        "lng": 0.021629333496093747
    },
    {
        "name": "Malvern Hills",
        "lat": 52.07444183716456,
        "lng": -2.3675537109375
    },
    {
        "name": "Mendip Hills",
        "lat": 51.307867213356445,
        "lng": -2.7510452270507812
    },
    {
        "name": "Nidderdale",
        "lat": 54.10570980429925,
        "lng": -1.778411865234375
    },
    {
        "name": "Norfolk Coast",
        "lat": 52.81438319143107,
        "lng": 0.70587158203125
    },
    {
        "name": "North Devon Coast",
        "lat": 50.90649688226159,
        "lng": -4.47967529296875
    },
    {
        "name": "North Pennines",
        "lat": 54.75791607936991,
        "lng": -2.05718994140625
    },
    {
        "name": "Northumberland Coast",
        "lat": 55.26659815231191,
        "lng": -1.591644287109375
    },
    {
        "name": "North Wessex Downs",
        "lat": 51.41623104850411,
        "lng": -1.4931106567382812
    },
    {
        "name": "Quantock Hills",
        "lat": 51.146617353835516,
        "lng": -3.000640869140625,
    },
    {
        "name": "Shropshire Hills",
        "lat": 52.471069987788326,
        "lng": -2.964935302734375
    },
    {
        "name": "Solway Coast",
        "lat": 54.85961574715581,
        "lng": -3.3625030517578125
    },
    {
        "name": "South Devon",
        "lat": 50.30337575356313,
        "lng": -3.7408447265625
    },
    {
        "name": "Suffolk Coast and Heaths",
        "lat": 52.082037871680605,
        "lng": 1.4845275878906248
    },
    {
        "name": "Surrey Hills",
        "lat": 51.263633525637,
        "lng": -0.29422760009765625
    },
    {
        "name": "Tamar Valley",
        "lat": 50.51447034793093,
        "lng": -4.222065210342407
    },
    {
        "name": "Wye Valley",
        "lat": 51.83832319038298,
        "lng": -2.6360321044921875
    },
    {
        "name": "Anglesey",
        "lat": 53.18217289215352,
        "lng": -4.4171905517578125
    },
    {
        "name": "Clwydian Range and Dee Valley",
        "lat": 53.1335898292448,
        "lng": -3.2258605957031246
    },
    {
        "name": "Gower",
        "lat": 51.60266574567797,
        "lng": -4.156951904296875
    },
    {
        "name": "Llyn",
        "lat": 52.860839234299405,
        "lng": -4.562072753906249
    },
    {
        "name": "Wye Valley",
        "lat": 51.83832319038298,
        "lng": -2.6360321044921875
    },
    {
        "name": "Antrim Coast and Glens",
        "lat": 55.01306371757699,
        "lng": -6.1083984375
    },
    {
        "name": "Binevenagh",
        "lat": 55.11451369585085,
        "lng": -6.87744140625
    },
    {
        "name": "Causeway Coast",
        "lat": 55.23058939555117,
        "lng": -6.48468017578125
    },
    {
        "name": "Lagan Valley",
        "lat": 54.53423091291802,
        "lng": -5.9621429443359375
    },
    {
        "name": "Mourne Mountains",
        "lat": 54.18815548107151,
        "lng": -6.0479736328125
    },
    {
        "name": "Ring of Gullion",
        "lat": 54.1214072381932,
        "lng": -6.41876220703125
    },
    {
        "name": "Sperrins",
        "lat": 54.78643362918132,
        "lng": -7.11090087890625
    },
    {
        "name": "Strangford and Lecale",
        "lat": 54.4013,
        "lng": -5.6085,
    }
];

// This function performs the searching of the search bar. It checks through the list  of markers seen above
// And checks if what the user has entered is the same
// If it is, then it will change the map to show it and place a marker
// If not, it will give an error that it is not a location yet
function searchAONB() {

    // Creates/Displays the user input of the searchbar
    var userinput = document.getElementById('searchbar').value;

    // Changes the string that the user entered into the search bar to uppercase 
    var userstring = userinput.toUpperCase();

    // Creates a variable for the markers
    var aonbmarkers;

    // For loop, which checks through each of the different locations within the markers above
    for (var i = 0; i < markers.length; i++) {

        // Adds these to the markers variable in uppercase form
        aonbmarkers = markers[i].name.toUpperCase();

        // If the string the user has entered matches a markers "name"
        if (userstring == aonbmarkers) {

            // A new marker will be added to the map with its latitude and longitude, with a popup of its name
            L.marker([markers[i].lat, markers[i].lng]).bindPopup(markers[i].name).addTo(aonbmap);

            // The maps view is changed to go to that marker at a zoom level of 13
            aonbmap.setView(new L.LatLng(markers[i].lat, markers[i].lng), 13, {

                // Animation true means that it will smoothly "fly" the user of to the new point of interest
                animation: true
            });
        } else {

            // If not it will console log that this is not a location yet
            console.log("This is not a location yet");
        }
    }
}