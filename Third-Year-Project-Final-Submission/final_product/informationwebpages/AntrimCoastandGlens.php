<?php
// Gathering the Database connection variables file
require_once("../config/db.php");

// Gathering the Login Class
require_once("../classes/Login.php");

// Creating a new login token
$login = new Login();

// If-Else statement checking if the user is logged in
if ($login->isUserLoggedIn() == true) {
    // If they are, then it will show the header for logged in users
    include_once 'headerloggedin.php';
} else {
    // Otherwise it will show the default header
    include_once 'header.php';
}
?>

<!-- Title at the top of the page, merging with the navigation bar via the Class CSS details -->
<div class="title">
    <h1 class="infoTitle">Antrim Coast and Glens</h1>
</div>

<!-- Links to the Mapbox API stylesheet and scripting -->
<link href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js"></script>

<!-- Dispalying the map with a set height and width CSS styling -->
<div class="container-fluid">
    <div class="row">
        <div id="map" style="width: 100%; height: 600px;"></div>
    </div>
</div>
<!-- Creating a new container which will store the name of the AONB again -->
<div class="container">
    <div class="row justify-content-center">
        <h1>Antrim Coast and Glens</h1>
    </div>
</div>
<!-- Creating a new container to house all of the information about the AONB location -->
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"The Antrim Coast and Glens AONB was designated in 1989 under the Nature Conservation and Amenity Lands (NI) Order. It includes Rathlin Island, the Glens of Antrim and the coastal area between Larne and Ballycastle. There is no doubt this area contains some of the most beautiful and varied scenery in Northern Ireland."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/antrim-coast-and-glens</p> <!-- Link to the source of the informaiton -->
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"The area is dominated by the Antrim Plateau rising to over 500m and cut by fast flowing rivers to form a series of picturesque glens running east and north-east towards the sea. Above all the Antrim Coast and Glens AONB is an area of contrasts with Northern Ireland’s only inhabited offshore island, gentle bays and valleys, dramatic headlands, farmland and the wild open expanse of moorland on the plateau."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/antrim-coast-and-glens</p> <!-- Link to the source of the informaiton -->
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"Added to this, the area has a long settlement history with many important archaeological sites; listed buildings, historic monuments, and conservation areas. Rich in folklore, it has a strong cultural heritage and close associations with Scotland. On a clear day there are fine views eastwards to the Scottish Islands and the Mull of Kintyre which is only 20 km away from Torr Head."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/antrim-coast-and-glens</p> <!-- Link to the source of the informaiton -->
        </div>
    </div>
</div>

<!-- Conatiner for displaying the comments section -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <!-- Title for the section of the webpage -->
        <h1>Comments Section</h1>
    </div>
    <div class="row justify-content-center">
        <!-- Div which will be used to display the comments code -->
        <div class="comments"></div>
    </div>
</div>

<!-- Link to the stylesheet for the comments CSS styling -->
<link rel="stylesheet" href="../styles/comments.css" />

<script>
    
    /* 
        Creating a constant which will store the page id for this AONB location. 
        Each of the AONB location pages has its own unique page id, ensuring that only the comments
        for that location are displayed
    */ 
    const comments_page_id = 39; 
    fetch("comments.php?page_id=" + comments_page_id).then(response => response.text()).then(data => {
        document.querySelector(".comments").innerHTML = data;
        document.querySelectorAll(".comments .write_comment_btn, .comments .reply_comment_btn").forEach(element => {
            element.onclick = event => {
                event.preventDefault();
                document.querySelectorAll(".comments .write_comment").forEach(element => element.style.display = 'none');
                document.querySelector("div[data-comment-id='" + element.getAttribute("data-comment-id") + "']").style.display = 'block';
                document.querySelector("div[data-comment-id='" + element.getAttribute("data-comment-id") + "'] input[name='name']").focus();
            };
        });

        document.querySelectorAll(".comments .write_comment form").forEach(element => {
            element.onsubmit = event => {
                event.preventDefault();
                fetch("comments.php?page_id=" + comments_page_id, {
                    method: 'POST',
                    body: new FormData(element)
                }).then(response => response.text()).then(data => {
                    element.parentElement.innerHTML = data;
                });
            };
        });
    });
    
    // Setting the access token for the Mapbox API to display the map
    mapboxgl.accessToken = 'pk.eyJ1IjoiamFja2R3ZWFybiIsImEiOiJja2dtNGFsYTUwenRoMnRuYTA3NDg3cmlrIn0.QKml-G9Bmp2lM4vqLZlD6w';
    /* 
        Creating the map variable, which is an instance of Mapbox Map
        Here the style of streets version 11 is set and the center coordinates are allocated
        The zoom level is also set so that all of the AONB is visible
        Interactivity is turned off so the user doesnt use this map to look around
    */
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [-6.1083984375,55.01306371757699],
        zoom: 10,
        interactive: false
    });

    // Setting the GeoJSON polygon feature, which will be used to create the outline of the location
    map.on('load', function() {
        map.addSource('arnside', {
            'type': 'geojson',
            'data': {
                'type': 'Feature',
                'geometry': {
                    'type': 'Polygon',
                    'coordinates': [[[-5.821380615234375,54.87502640669144],[-5.83648681640625,54.899513279793524],[-5.877685546874999,54.909777539554824],[-5.925750732421875,54.96657837889866],[-5.966949462890625,54.98313017954608],[-5.991668701171875,54.98628213000453],[-5.95458984375,55.04769570951166],[-5.98480224609375,55.05949523049586],[-6.046600341796875,55.05477583937811],[-6.054840087890625,55.081511700352344],[-6.030120849609375,55.10115902751222],[-6.03973388671875,55.13021935663458],[-6.027374267578125,55.16867212754337],[-6.04522705078125,55.171025174948866],[-6.06170654296875,55.19689953107653],[-6.112518310546875,55.212572782761725],[-6.150970458984375,55.229023057406344],[-6.17706298828125,55.21413976860117],[-6.203155517578124,55.21335628339293],[-6.241607666015625,55.20395325785898],[-6.2677001953125,55.215706692749436],[-6.304779052734375,55.16710335211384],[-6.285552978515624,55.159258549008925],[-6.299285888671875,55.14356431251199],[-6.278686523437499,55.116869938726154],[-6.282806396484375,55.10901525530758],[-6.25946044921875,55.07600871853944],[-6.28692626953125,55.05241593518546],[-6.27593994140625,55.039040517291504],[-6.22650146484375,55.0217245215306],[-6.2237548828125,54.98864593043392],[-6.1962890625,54.9847061857119],[-6.175689697265625,54.97524922057544],[-6.216888427734375,54.94923107905585],[-6.149597167968749,54.93345430690937],[-6.17431640625,54.89714423283752],[-6.141357421875,54.88371700077861],[-6.128997802734375,54.86001096585755],[-6.104278564453124,54.86080139164163],[-6.090545654296875,54.840245285755714],[-6.060333251953125,54.83312727008725],[-6.05621337890625,54.839454457113696],[-6.024627685546875,54.826007999094955],[-6.0369873046875,54.80939148433864],[-6.005401611328125,54.81255706180707],[-5.97930908203125,54.81651368485327],[-5.97930908203125,54.80385112692028],[-5.953216552734374,54.80543416369777],[-5.870819091796875,54.84578065235765],[-5.854339599609374,54.862382196732526],[-5.854339599609374,54.86791452655563],[-5.833740234375,54.86791452655563],[-5.821380615234375,54.87502640669144]]]
                }
            }
        });
        
        // This adds the coordinates to the map, fills them in with the colour #088 (A light teal) and opacity of 0.3
        map.addLayer({
            'id': 'arnside',
            'type': 'fill',
            'source': 'arnside',
            'layout': {},
            'paint': {
                'fill-color': '#088',
                'fill-opacity': 0.3
            }
        });
    });

    // Creating the popup for the marker with the offset of 25 and text of Anglesey
    var popup = new mapboxgl.Popup({
        offset: 25
    }).setText(
        'Antrim Coast and Glens'
    );

    // Creating the document element for the marker
    var el = document.createElement('div');
    el.id = 'marker';

    // creating the marker
    new mapboxgl.Marker(el)
        .setLngLat([-6.1083984375,55.01306371757699])
        .setPopup(popup)
        .addTo(map);

    // Creating the marker adding it to the map
    var marker = new mapboxgl.Marker()
        .setLngLat([-6.1083984375,55.01306371757699])
        .addTo(map)
        .setPopup(popup);

</script>

<!-- Dispalying the footer at the bottom of the webpage and closing off all remaining tags that were opened -->
<?php
    include_once 'footer.php';
?>
