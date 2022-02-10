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
    <h1 class="infoTitle">Arnside and Silverdale</h1>
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
        <h1>Arnside and Silverdale</h1>
    </div>
</div>
<!-- Creating a new container to house all of the information about the AONB location -->
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"Situated in the north west of England, spanning the county boundary of Cumbria and Lancashire, Arnside & Silverdale AONB was designated in 1972. Covering 75 sq km, this is one of the smallest of the AONB family."</p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"Arnside & Silverdale AONB is a living, working landscape – a place where people want to live, work and visit. There are almost 10,000 people living in the AONB, mostly in the vibrant communities of Arnside, Silverdale and Warton. There are 2 major landowning estates but other large areas are owned and/or managed by conservation organisations such as RSPB, National Trust and the Wildlife Trusts. Two thirds of the AONB is protected by SSSI and County Wildlife designations."</p>
        </div>
        <div class="col">
            <h2>Visitor Information</h2>
            <p>"With stations at Arnside, Silverdale and Carnforth, the AONB is well served by public transport. Visitors are drawn to the area by the panoramic views and spectacular sunsets but most of all they value its tranquillity. With almost 100km of well-maintained footpaths and narrow lanes and byways, walking and cycling are very popular activities and by far the best way to experience the Area’s sights and sounds to the full."</p>
        </div>
    </div>
</div>
<!-- Container for displaying the source of all of the information -->
<div class="container">
    <div class="row">
        <p style="color: grey; font-size: 12px;">All information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/arnside-silverdale</p> <!-- Link to the source of the informaiton -->
    </div>
</div>

<!-- Conatiner for displaying the comments section -->
<div class="container-fluid">
    <div class="row justify-content-center">
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
        center: [-2.7995, 54.1708],
        zoom: 11,
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
                    'coordinates': [
                        [
                            [
                                -2.8639984130859375,
                                54.183534825556876
                            ],
                            [
                                -2.8543853759765625,
                                54.18132476428218
                            ],
                            [
                                -2.8440856933593746,
                                54.17810991883245
                            ],
                            [
                                -2.835845947265625,
                                54.17409101056006
                            ],
                            [
                                -2.8341293334960938,
                                54.168061915905334
                            ],
                            [
                                -2.8341293334960938,
                                54.16122787964904
                            ],
                            [
                                -2.8217697143554688,
                                54.1497682863569
                            ],
                            [
                                -2.8186798095703125,
                                54.13750099630237
                            ],
                            [
                                -2.801513671875,
                                54.12704076466584
                            ],
                            [
                                -2.7908706665039062,
                                54.12824784926948
                            ],
                            [
                                -2.764434814453125,
                                54.13025957879543
                            ],
                            [
                                -2.7472686767578125,
                                54.130863078605216
                            ],
                            [
                                -2.739715576171875,
                                54.14634989865955
                            ],
                            [
                                -2.7386856079101562,
                                54.15961970707518
                            ],
                            [
                                -2.7383422851562496,
                                54.16886584596351
                            ],
                            [
                                -2.735595703125,
                                54.177507107487024
                            ],
                            [
                                -2.7266693115234375,
                                54.186347459978535
                            ],
                            [
                                -2.7252960205078125,
                                54.20020693445026
                            ],
                            [
                                -2.7211761474609375,
                                54.224098588973646
                            ],
                            [
                                -2.7898406982421875,
                                54.2271091613527
                            ],
                            [
                                -2.8076934814453125,
                                54.219080480461116
                            ],
                            [
                                -2.8183364868164062,
                                54.211853332753485
                            ],
                            [
                                -2.8269195556640625,
                                54.20362087407783
                            ],
                            [
                                -2.8337860107421875,
                                54.20482572660276
                            ],
                            [
                                -2.8502655029296875,
                                54.19679271275147
                            ],
                            [
                                -2.8543853759765625,
                                54.19377992993876
                            ],
                            [
                                -2.8612518310546875,
                                54.193980788958875
                            ],
                            [
                                -2.8643417358398438,
                                54.191570416294546
                            ],
                            [
                                -2.8639984130859375,
                                54.183534825556876
                            ]
                        ]
                    ]
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
        'Arnside and Silverdale.'
    );

    // Creating the document element for the marker
    var el = document.createElement('div');
    el.id = 'marker';

    // creating the marker
    new mapboxgl.Marker(el)
        .setLngLat([-2.7819442749023433, 54.18534296964949])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    // Creating the marker and adding it to the map
    var marker = new mapboxgl.Marker()
        .setLngLat([-2.7819442749023433,54.18534296964949])
        .addTo(map)
        .setPopup(popup);


    /* 
        Creating a constant which will store the page id for this AONB location. 
        Each of the AONB location pages has its own unique page id, ensuring that only the comments
        for that location are displayed
    */    
    const comments_page_id = 1; 
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

</script>

<!-- Dispalying the footer at the bottom of the webpage and closing off all remaining tags that were opened -->
<?php
    include_once 'footer.php';
?>
