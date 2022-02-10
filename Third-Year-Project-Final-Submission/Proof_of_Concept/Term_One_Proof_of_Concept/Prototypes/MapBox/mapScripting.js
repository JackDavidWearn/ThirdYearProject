// Initialising the map with the access token
mapboxgl.accessToken = 'pk.eyJ1IjoiamFja2R3ZWFybiIsImEiOiJja2dtNGFsYTUwenRoMnRuYTA3NDg3cmlrIn0.QKml-G9Bmp2lM4vqLZlD6w';
// If statement to check if the users browser version supports the version of mapbox I am using
if (!mapboxgl.supported()) {
    // If the browser does not support it, the error will be alerted to the user
    alert('Your browser does not support Mapbox GL');
} else {
    // If the browser is supported, the map will be created and added to the index page in the map div
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/jackdwearn/ckgm4cnwi0mdh19qtqmu4x1bz',
        center: [-0.61498, 51.40780],
        zoom: 11
    });
}

// Adding the zoom buttons and compass to the map
map.addControl(new mapboxgl.NavigationControl());

// Adding the button under the zoom controls and compass for the user to locate themselved based on there current location
map.addControl(
    new mapboxgl.GeolocateControl({
        positionOptions: {
            enableHighAccuracy: true
        },
        trackUserLocation: true
    })
);

map.addControl(
    new MapboxDirections({
        accessToken: mapboxgl.accessToken
    }),
    'top-left'
);