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
    <h1 class="infoTitle">South Devon</h1>
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
        <h1>South Devon</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"Stretching from Torbay to the outskirts of Plymouth, the AONB coastline is one of many moods and also a Heritage Coast."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/south-devon</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"The AONB’s coast is the prime day trip destination for nearby resorts such as Brixham, Paignton and Torquay as well as for city dwellers from Plymouth and Exeter, and each summer sees a huge casual visitor influx. Dartmouth and Salcombe are long-established local and holiday sailing centres and the South Devon Coast Path and local network of footpaths are increasingly well-used"</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/south-devon</p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"It ranges from sheltered hidden coves to the jagged pre-Cambrian cliffs of Bolt Head and from the long golden expanses of Slapton Sands to the cool, tree-shaded serenity of the Dart and Kingsbridge estuaries, some of Britain’s finest ria coastline."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/south-devon
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
    const comments_page_id = 30;
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
        center: [-3.7408447265625,
            50.30337575356313
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
                                -4.15008544921875,
                                50.36824070514717
                            ],
                            [
                                -4.053955078125,
                                50.29109404231143
                            ],
                            [
                                -3.90838623046875,
                                50.29109404231143
                            ],
                            [
                                -3.84246826171875,
                                50.22436656050062
                            ],
                            [
                                -3.70513916015625,
                                50.20679116099066
                            ],
                            [
                                -3.6474609374999996,
                                50.22085199853943
                            ],
                            [
                                -3.614501953125,
                                50.312146463247444
                            ],
                            [
                                -3.5211181640624996,
                                50.34370762530209
                            ],
                            [
                                -3.46893310546875,
                                50.40326597175612
                            ],
                            [
                                -3.54034423828125,
                                50.41376850768414
                            ],
                            [
                                -3.5430908203125,
                                50.45925260052624
                            ],
                            [
                                -3.482666015625,
                                50.45925260052624
                            ],
                            [
                                -3.51287841796875,
                                50.5064398321055
                            ],
                            [
                                -3.47991943359375,
                                50.56579378237965
                            ],
                            [
                                -3.4332275390625,
                                50.61113171332364
                            ],
                            [
                                -3.31787109375,
                                50.62507306341435
                            ],
                            [
                                -3.27667236328125,
                                50.66164944798126
                            ],
                            [
                                -3.18328857421875,
                                50.67905676828541
                            ],
                            [
                                -3.0596923828124996,
                                50.68949806239989
                            ],
                            [
                                -2.911376953125,
                                50.72776293129446
                            ],
                            [
                                -2.9718017578125,
                                50.76252207716766
                            ],
                            [
                                -3.06793212890625,
                                50.77815527465925
                            ],
                            [
                                -3.18878173828125,
                                50.79725542144864
                            ],
                            [
                                -3.34259033203125,
                                50.828493376227115
                            ],
                            [
                                -3.45794677734375,
                                50.78510168548186
                            ],
                            [
                                -3.64471435546875,
                                50.73124000713507
                            ],
                            [
                                -4.0594482421875,
                                50.51342652633956
                            ],
                            [
                                -4.15557861328125,
                                50.401515322782366
                            ],
                            [
                                -4.15008544921875,
                                50.36824070514717
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
        'South Devon'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-3.7408447265625,
            50.30337575356313
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-3.7408447265625,
            50.30337575356313
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
