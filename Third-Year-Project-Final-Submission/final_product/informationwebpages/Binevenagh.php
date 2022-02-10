<?php
require_once("../config/db.php");

require_once("../classes/Login.php");

$login = new Login();
    if ($login->isUserLoggedIn() == true) {
    include_once 'headerloggedin.php';

    } else {
        include_once 'header.php';
    }
?>

<div class="title">
    <h1 class="infoTitle">Binevenagh</h1>
</div>


<link href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js"></script>

<div class="container-fluid">
    <div class="row">
        <div id="map" style="width: 100%; height: 600px;"></div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <h1>Binevenagh</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"Binevenagh AONB was designated in 2006. This is a re-designation and extension of the area previously designated in 1966 as the North Derry AONB."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/binevenagh</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"The distinctive headland of Binevenagh with its dramatic cliffs marks the western limit of the Antrim basalt plateau. From here there are spectacular panoramic views of Magilligan, Inishowen and of Islay and Jura in Scotland. The AONB includes some of the finest beaches and dune systems in Ireland together with the small seaside resort of Castlerock. The flat alluvial plain near Lough Foyle is important for arable farming whereas the upland area, characterised by open moor land and forestry, is more suited to sheep farming."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/binevenagh</p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"In addition, Binevenagh AONB has a colourful cultural and an outstanding built and archaeological heritage which includes many listed buildings and scheduled monuments. Visitors have the opportunity to take part in a wide range of recreational activity including walking, cycling, swimming, orienteering, angling and gliding. This, together with the easy access by road, rail, air and sea, has helped to establish Binevenagh AONB as one of Northern Ireland’s most popular visitor destinations.</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/binevenagh
            </p>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <h1>Comments Section</h1>
    </div>
    <div class="row justify-content-center">
        <div class="comments"></div>
    </div>
</div>

<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css">
<link rel="stylesheet" href="../styles/comments.css" />

<script>
    
    // Code to display the comments section
    const comments_page_id = 40; 
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
    
    // Code to display the map
    mapboxgl.accessToken = 'pk.eyJ1IjoiamFja2R3ZWFybiIsImEiOiJja2dtNGFsYTUwenRoMnRuYTA3NDg3cmlrIn0.QKml-G9Bmp2lM4vqLZlD6w';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [-6.87744140625,
            55.11451369585085
        ],
        zoom: 10,
        interactive: false
    });
    
    
    // GeoJSON code to display coordinates
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
                                -6.800537109375,
                                55.1247230779239
                            ],
                            [
                                -6.810150146484375,
                                55.1262935204707
                            ],
                            [
                                -6.818389892578125,
                                55.14199454927118
                            ],
                            [
                                -6.801910400390625,
                                55.157689403187746
                            ],
                            [
                                -6.8170166015625,
                                55.16631894125083
                            ],
                            [
                                -6.892547607421875,
                                55.175730853115766
                            ],
                            [
                                -6.966705322265624,
                                55.1906285027331
                            ],
                            [
                                -7.03125,
                                55.10665854913562
                            ],
                            [
                                -7.021636962890625,
                                55.10351605801967
                            ],
                            [
                                -6.966705322265624,
                                55.105087334466745
                            ],
                            [
                                -6.9488525390625,
                                55.10901525530758
                            ],
                            [
                                -6.94061279296875,
                                55.0822977788132
                            ],
                            [
                                -6.913146972656249,
                                55.083869889387856
                            ],
                            [
                                -6.898040771484374,
                                55.07600871853944
                            ],
                            [
                                -6.866455078125,
                                55.06028174159373
                            ],
                            [
                                -6.911773681640625,
                                55.04769570951166
                            ],
                            [
                                -6.85546875,
                                55.04140120974331
                            ],
                            [
                                -6.8115234375,
                                55.046122177308106
                            ],
                            [
                                -6.766204833984375,
                                55.035892710948424
                            ],
                            [
                                -6.767578125,
                                55.046122177308106
                            ],
                            [
                                -6.75933837890625,
                                55.05005589189804
                            ],
                            [
                                -6.763458251953125,
                                55.079153372273815
                            ],
                            [
                                -6.782684326171875,
                                55.12236729829848
                            ],
                            [
                                -6.800537109375,
                                55.1247230779239
                            ]
                        ]
                    ]
                }
            }
        });
        // Adding them to the map
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

    // Creating the popup
    var popup = new mapboxgl.Popup({
        offset: 25
    }).setText(
        'Binevenagh'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-6.87744140625,
            55.11451369585085
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-6.87744140625,
            55.11451369585085
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
