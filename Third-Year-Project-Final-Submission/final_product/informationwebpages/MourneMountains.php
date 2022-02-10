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
    <h1 class="infoTitle">Mourne Mountains</h1>
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
        <h1>Mourne Mountains</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"Famed in song and close to the heart of everyone in the Province are the Mourne mountains and their hinterland."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/mourne</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"It is one of the most picturesque mountain districts in Ireland. The twelve peaks include Slieve Donard, which at 850m is Northern Ireland’s highest mountain. Beneath the cluster of fine peaks, cliffs and rock pinnacles, the mountain slopes descend through moorland, woodland, field and farm before meeting the coast. Slieve Croob lies as a northern outlier to the main massif."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/mourne</p>
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
    const comments_page_id = 43;
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
        center: [-6.0479736328125,
            54.18815548107151
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
                                -6.197662353515625,
                                54.0900064257852
                            ],
                            [
                                -6.188049316406249,
                                54.062611954247565
                            ],
                            [
                                -6.068572998046875,
                                54.01503157408856
                            ],
                            [
                                -5.998535156249999,
                                54.04971418210692
                            ],
                            [
                                -5.887298583984375,
                                54.10450206317112
                            ],
                            [
                                -5.87493896484375,
                                54.17449291896076
                            ],
                            [
                                -5.887298583984375,
                                54.20502653194099
                            ],
                            [
                                -5.821380615234375,
                                54.24035307182535
                            ],
                            [
                                -5.840606689453125,
                                54.262015759179484
                            ],
                            [
                                -5.79254150390625,
                                54.26682814469075
                            ],
                            [
                                -5.810394287109375,
                                54.289278516618545
                            ],
                            [
                                -5.847473144531249,
                                54.28286537279382
                            ],
                            [
                                -5.854339599609374,
                                54.259609355756226
                            ],
                            [
                                -5.8831787109375,
                                54.25559837127025
                            ],
                            [
                                -5.92437744140625,
                                54.2884769282426
                            ],
                            [
                                -5.909271240234375,
                                54.32933804825253
                            ],
                            [
                                -5.9326171875,
                                54.36215777495516
                            ],
                            [
                                -5.977935791015625,
                                54.374158445055734
                            ],
                            [
                                -6.019134521484375,
                                54.37015861132772
                            ],
                            [
                                -6.065826416015625,
                                54.32773641556515
                            ],
                            [
                                -6.0919189453125,
                                54.32533384958536
                            ],
                            [
                                -6.09466552734375,
                                54.313318914476056
                            ],
                            [
                                -6.05621337890625,
                                54.29168318814591
                            ],
                            [
                                -6.06719970703125,
                                54.28126193082709
                            ],
                            [
                                -6.0205078125,
                                54.262817862443384
                            ],
                            [
                                -6.03973388671875,
                                54.23232696675557
                            ],
                            [
                                -6.141357421875,
                                54.20181352941122
                            ],
                            [
                                -6.208648681640625,
                                54.20101023973888
                            ],
                            [
                                -6.2017822265625,
                                54.178511788181325
                            ],
                            [
                                -6.25396728515625,
                                54.15117577572709
                            ],
                            [
                                -6.249847412109375,
                                54.11899263524837
                            ],
                            [
                                -6.302032470703125,
                                54.13267352528723
                            ],
                            [
                                -6.278686523437499,
                                54.10852773013968
                            ],
                            [
                                -6.18255615234375,
                                54.064223894211956
                            ],
                            [
                                -6.197662353515625,
                                54.0900064257852
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
        'Mourne Mountains'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-6.0479736328125,
            54.18815548107151
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-6.0479736328125,
            54.18815548107151
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
