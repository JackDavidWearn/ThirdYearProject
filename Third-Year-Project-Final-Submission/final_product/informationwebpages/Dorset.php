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
    <h1 class="infoTitle">Dorset</h1>
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
        <h1>Dorset</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"Covering some 44 per cent of Dorset, the AONB stretches along one of Britain’s finest coastlines and reaching inland, takes in countryside which still evokes the settings of the Hardy novels. Curving through the county to the sea, the dominating chalk ridge of Dorset underpins the AONB’s landscape. It stretches in a broad band of downland from the Upper Axe Valley eastwards to the Stour Valley near Blandford Forum. A southern arm circles Dorchester and extends to the Isle of Purbeck. The rural landscape varies from the ridges and valleys of central Dorset, through chalk ridges and limestone plateau to the sandy heaths and flats of Poole Harbour."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/dorset</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"Jurassic Coast - The Jurassic Coast is England’s only natural World Heritage Site. It stretches 95 miles, from Orcombe Point near Exmouth to Old Harry Rocks near Swanage."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/dorset
            </p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"The coastal stretch of the AONB is a highly popular tourist area and major resorts such as Weymouth and Swanage attract two million visitors a year. The 956 km South West Coast Path starts at Poole Harbour and the coast’s extensive footpath network is well-used by residents and visitors."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/dorset</p>
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
    const comments_page_id = 10;
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
        center: [-2.7074432373046875,
            50.752097042863106
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
                                -2.7170562744140625,
                                50.77858945556799
                            ],
                            [
                                -2.745208740234375,
                                50.78900858809565
                            ],
                            [
                                -2.8179931640624996,
                                50.77033932897997
                            ],
                            [
                                -2.8639984130859375,
                                50.75687547184921
                            ],
                            [
                                -2.8482055664062496,
                                50.72298153061673
                            ],
                            [
                                -2.806320190429687,
                                50.71863437930216
                            ],
                            [
                                -2.7877807617187496,
                                50.718199641990765
                            ],
                            [
                                -2.6923370361328125,
                                50.68340758986141
                            ],
                            [
                                -2.6593780517578125,
                                50.69515279329137
                            ],
                            [
                                -2.5975799560546875,
                                50.74340774029213
                            ],
                            [
                                -2.6016998291015625,
                                50.75774422470732
                            ],
                            [
                                -2.6566314697265625,
                                50.76295640320208
                            ],
                            [
                                -2.682037353515625,
                                50.76556227474782
                            ],
                            [
                                -2.6909637451171875,
                                50.775550104554206
                            ],
                            [
                                -2.7170562744140625,
                                50.77858945556799
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
        'Dorset'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-2.7074432373046875,
            50.752097042863106
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-2.7074432373046875,
            50.752097042863106
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
