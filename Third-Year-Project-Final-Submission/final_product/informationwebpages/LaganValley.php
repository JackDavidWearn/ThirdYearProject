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
    <h1 class="infoTitle">Lagan Valley</h1>
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
        <h1>Lagan Valley</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"Focused on the course of the River Lagan, this AONB is within easy access by the large population of the Belfast Urban Area."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/lagan-valley</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"Most of the AONB now lies within the Lagan Valley Regional Park which was designated in 1967. The riverbank scenery, meadows, woods and the pleasant pastoral land of the Lagan valley make this a peaceful haven. The area has a rich heritage, not only through its impressive monuments such as the Giant’s Ring, its Early Christian raths, and the remnants of fine estates, but also its important industrial archaeology related to linen production and the old Lagan Canal and its towpath."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/lagan-valley</p>
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
    const comments_page_id = 42;
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
    
    mapboxgl.accessToken = 'pk.eyJ1IjoiamFja2R3ZWFybiIsImEiOiJja2dtNGFsYTUwenRoMnRuYTA3NDg3cmlrIn0.QKml-G9Bmp2lM4vqLZlD6w';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [-5.9621429443359375,
            54.53423091291802
        ],
        zoom: 10,
        interactive: false
    });

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
                                -5.9140777587890625,
                                54.56529452128724
                            ],
                            [
                                -5.9236907958984375,
                                54.56609071304939
                            ],
                            [
                                -5.9278106689453125,
                                54.57126558050856
                            ],
                            [
                                -5.9635162353515625,
                                54.55733174844988
                            ],
                            [
                                -5.9731292724609375,
                                54.55016392333889
                            ],
                            [
                                -5.9765625,
                                54.553349778899495
                            ],
                            [
                                -5.9820556640625,
                                54.55096041055632
                            ],
                            [
                                -5.997161865234375,
                                54.555340812270934
                            ],
                            [
                                -6.0198211669921875,
                                54.54020652089137
                            ],
                            [
                                -6.032180786132812,
                                54.52705902840288
                            ],
                            [
                                -6.024627685546875,
                                54.51829168058968
                            ],
                            [
                                -6.0266876220703125,
                                54.50513712914144
                            ],
                            [
                                -5.9964752197265625,
                                54.50115006509871
                            ],
                            [
                                -5.986862182617187,
                                54.50234622515822
                            ],
                            [
                                -5.9758758544921875,
                                54.49955513055588
                            ],
                            [
                                -5.9710693359375,
                                54.50633317249733
                            ],
                            [
                                -5.96282958984375,
                                54.51709598731105
                            ],
                            [
                                -5.9525299072265625,
                                54.515900259026985
                            ],
                            [
                                -5.9058380126953125,
                                54.52506661464527
                            ],
                            [
                                -5.889358520507812,
                                54.523871119721406
                            ],
                            [
                                -5.896224975585937,
                                54.53781638269267
                            ],
                            [
                                -5.906524658203125,
                                54.54697781894988
                            ],
                            [
                                -5.9140777587890625,
                                54.55016392333889
                            ],
                            [
                                -5.926437377929687,
                                54.54737609560663
                            ],
                            [
                                -5.914764404296875,
                                54.55733174844988
                            ],
                            [
                                -5.9140777587890625,
                                54.56529452128724
                            ]
                        ]
                    ]
                }
            }
        });
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

    var popup = new mapboxgl.Popup({
        offset: 25
    }).setText(
        'Lagan Valley'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-5.9621429443359375,
            54.53423091291802
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-5.9621429443359375,
            54.53423091291802
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
