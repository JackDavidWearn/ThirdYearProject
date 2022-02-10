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
    <h1 class="infoTitle">North Pennines</h1>
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
        <h1>North Pennines</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"The North Pennines is one of England’s most special places – a peaceful, unspoilt landscape with a rich history and vibrant natural beauty."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/north-pennines</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"40% of the UK’s upland hay meadows<br>30% of England’s upland heathland and 27% of its blanket bog<br>80% of England’s black grouse<br>36% of the AONB designated as Sites of Special Scientific Interest<br>Red squirrels, otters and rare arctic alpine plants<br>22,000 pairs of breeding wading birds<br>England’s biggest waterfall – High Force in Teesdale"</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/north-pennines</p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"Tumbling waterfalls, sweeping moorland views, dramatic dales, stone-built villages, snaking stonewalls and friendly faces – the North Pennines has all this and more! The designation of the North Pennines as an AONB was confirmed in 1988 and at 1983km2, it is the second largest of the AONBs. One of the most remote and unspoilt places in England, it lies between the National Parks of the Yorkshire Dales and Northumberland, with the former West Durham Coalfield to the east and the Eden Valley to the west."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/north-pennines
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
    const comments_page_id = 24;
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
        center: [-2.05718994140625,
            54.75791607936991
        ],
        zoom: 9,
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
                                -2.76031494140625,
                                54.659535037041586
                            ],
                            [
                                -2.55157470703125,
                                54.62774828881341
                            ],
                            [
                                -2.25494384765625,
                                54.53064512815931
                            ],
                            [
                                -1.966552734375,
                                54.532238849162084
                            ],
                            [
                                -1.724853515625,
                                54.62774828881341
                            ],
                            [
                                -1.80999755859375,
                                54.730964378350336
                            ],
                            [
                                -1.8841552734374998,
                                54.84973402078036
                            ],
                            [
                                -1.9775390625,
                                54.97446103959508
                            ],
                            [
                                -2.2055053710937496,
                                54.987070078948776
                            ],
                            [
                                -2.493896484375,
                                54.96657837889866
                            ],
                            [
                                -2.67242431640625,
                                54.953962903574094
                            ],
                            [
                                -2.87567138671875,
                                54.88450696185534
                            ],
                            [
                                -2.8839111328125,
                                54.8086000512159
                            ],
                            [
                                -2.76031494140625,
                                54.659535037041586
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
        'North Pennines'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-2.05718994140625,
            54.75791607936991
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-2.05718994140625,
            54.75791607936991
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
