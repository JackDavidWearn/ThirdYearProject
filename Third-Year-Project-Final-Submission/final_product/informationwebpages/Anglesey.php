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
    <h1 class="infoTitle">Anglesey</h1>
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
        <h1>Anglesey</h1>
    </div>
</div>
<!-- Creating a new container to house all of the information about the AONB location -->
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"Almost the entire 201 km coastline of Ynys Mon, the Isle of Anglesey, is designated as an AONB. The island contains a great variety of fine coastal landscapes and the AONB coincides with three stretches of Heritage Coast."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/anglesey</p> <!-- Link to the source of the informaiton -->
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"Some of the oldest rocks in Britain, the pre-Cambrian Mona Complex, form the low ridges and shallow valleys of Anglesey’s sea-planed plateau. Holyhead Mountain is its highest point (219m) with superb distant views to Snowdonia. Low cliffs, alternating with coves, pebble beaches and tucked-away villages, line the island’s northern shores. The east coast’s sheer limestone cliffs, interspersed with fine sandy beaches, contrast with the south’s wilderness of sand dunes that roll away down to Aberffraw Bay."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/anglesey</p> <!-- Link to the source of the informaiton -->
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"Tourism plays a significant part in the rural economy, largely centred on static caravan sites. The AONB is also an important recreation area both for local people, for day visitors from across North Wales and also for urban north-west England. Sailing, riding, sea fishing, diving and cliff climbing are just some of the leisure demands on the AONB coastline. The 201 km Isle of Anglesey Coastal Path is a popular route to discover and explore the AONB"</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/anglesey</p> <!-- Link to the source of the informaiton -->
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
    const comments_page_id = 34; 
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
        center: [-4.4171905517578125, 53.18217289215352],
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
                    'coordinates': [[[-4.467315673828125,53.18134990842877],[-4.442596435546875,53.15665305315798],[-4.4219970703125,53.160770182808506],[-4.41925048828125,53.13770917044239],[-4.4000244140625,53.141828116682696],[-4.33135986328125,53.128646098440754],[-4.2352294921875,53.18381881222983],[-4.198150634765625,53.21836854473267],[-4.104766845703125,53.25535521592485],[-4.016876220703125,53.322670996353274],[-4.148712158203125,53.31118556593906],[-4.21600341796875,53.3202100928807],[-4.229736328124999,53.36038708103963],[-4.27093505859375,53.38250924866264],[-4.288787841796875,53.416080203680465],[-4.427490234375,53.42999210132505],[-4.5703125,53.40707596167943],[-4.577178955078124,53.3349733850843],[-4.571685791015625,53.30297979468481],[-4.681549072265625,53.32431151982718],[-4.681549072265625,53.283279508679094],[-4.61700439453125,53.27588955899134],[-4.610137939453125,53.247138717452785],[-4.55108642578125,53.24467346019639],[-4.501647949218749,53.20850003436528],[-4.50439453125,53.18793333608315],[-4.467315673828125,53.18134990842877]]]
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
        'Anglesey'
    );

    // Creating the document element for the marker
    var el = document.createElement('div');
    el.id = 'marker';

    // creating the marker
    new mapboxgl.Marker(el)
        .setLngLat([-4.4171905517578125,53.18217289215352])
        .setPopup(popup) 
        .addTo(map);

    // Creating the marker and adding it to the map
    var marker = new mapboxgl.Marker()
        .setLngLat([-4.4171905517578125,
            53.18217289215352
        ])
        .addTo(map)
        .setPopup(popup);
    
</script>

<!-- Dispalying the footer at the bottom of the webpage and closing off all remaining tags that were opened -->
<?php
    include_once 'footer.php';
?>
