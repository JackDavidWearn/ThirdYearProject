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
    <h1 class="infoTitle">High Weald</h1>
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
        <h1>High Weald</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"The coastal stretch of the AONB is a highly popular tourist area and major resorts such as Weymouth and Swanage attract two million visitors a year. The 956 km South West Coast Path starts at Poole Harbour and the coast’s extensive footpath network is well-used by residents and visitors."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/high-weald</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p> "The 5 key components of the High Weald that make up the area’s natural beauty are its;
                rolling hills, dissected by steep-sided gill streams and studded by sandstone outcrops.
                small, irregular-shaped fields and open heaths which are often the remnants of medieval hunting forests."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/high-weald
            </p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"abundant, interconnected ancient woods and hedges. The dense forest which gave the Weald its name has largely vanished, but fine ancient broadleaved woodland is still abundant, particularly in the deep gills which incise the ridges. The Weald retains one of the highest levels of woodland cover in the country at over 23 per cent. Traces of the ancient Wealden iron industry, including hammer ponds, are found scattered throughout the woodlands."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/high-weald</p>
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
    const comments_page_id = 13;
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
        center: [0.4593658447265625,
            51.06362288384342
        ],
        zoom: 11,
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
                                0.44185638427734375,
                                51.065348960470374
                            ],
                            [
                                0.44666290283203125,
                                51.05304926006922
                            ],
                            [
                                0.47103881835937494,
                                51.02520102968731
                            ],
                            [
                                0.48648834228515625,
                                51.033837930308316
                            ],
                            [
                                0.48374176025390625,
                                51.04031454959097
                            ],
                            [
                                0.5046844482421875,
                                51.0405304213097
                            ],
                            [
                                0.50811767578125,
                                51.083684549980795
                            ],
                            [
                                0.49369812011718744,
                                51.109126619728926
                            ],
                            [
                                0.46314239501953125,
                                51.11386850819646
                            ],
                            [
                                0.44666290283203125,
                                51.10697105503078
                            ],
                            [
                                0.43155670166015625,
                                51.11041991029264
                            ],
                            [
                                0.40203094482421875,
                                51.111066542002845
                            ],
                            [
                                0.39825439453125,
                                51.09187928712511
                            ],
                            [
                                0.4226303100585937,
                                51.08001801329413
                            ],
                            [
                                0.44322967529296875,
                                51.065348960470374
                            ],
                            [
                                0.44185638427734375,
                                51.065348960470374
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
        'High Weald'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([0.4593658447265625,
            51.06362288384342
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([0.4593658447265625,
            51.06362288384342
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
