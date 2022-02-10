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
    <h1 class="infoTitle">Cornwall</h1>
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
        <h1>Cornwall</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"The Cornwall Area of Outstanding Natural Beauty is made up of 12 separate geographical areas and covers approximately 27% of the County – an area of 958 sq km (370 sq miles). The AONB containing some of Britain’s finest coastal scenery, including Land’s End and the Lizard peninsula."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/cornwall</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"There are many distinctive geological formations. The Lizard’s famous serpentine rock is found in the many reefs and spectacular stacks that emphasise the wild isolated character of the coastline. The granite intrusions around Land’s End have created rocks rich in minerals that have been mined for centuries and the old engine house chimneys still stand sentinel against the sky."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/cornwall
            </p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"The AONB protects many important natural and historic sites. The Lizard, with its complex geology, is a National Nature Reserve, and the Fal River is one of Europe’s best unspoilt examples of a drowned estuary complex and is a Special Area of Conservation. The traditional farmed landscape of small hedged and banked fields (many dating to mediaeval or even pre-historic times) is intrinsically part of the AONB’s value as are its ancient standing stones and the distinctive mining ruins (now a haven for wildlife). 80 per cent of the AONB is in agricultural use and, in favoured pockets, horticulture."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/cornwall</p>
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
    const comments_page_id = 6;
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
        center: [-4.552459716796875,
            50.55401621902838
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
                                -4.6575164794921875,
                                50.50949663804864
                            ],
                            [
                                -4.6355438232421875,
                                50.48940543332045
                            ],
                            [
                                -4.588851928710937,
                                50.48285210566184
                            ],
                            [
                                -4.528427124023437,
                                50.482415184837045
                            ],
                            [
                                -4.492034912109375,
                                50.49071598979375
                            ],
                            [
                                -4.4556427001953125,
                                50.512989888239126
                            ],
                            [
                                -4.427490234375,
                                50.52434116637026
                            ],
                            [
                                -4.437103271484375,
                                50.53263460481829
                            ],
                            [
                                -4.429550170898437,
                                50.53918102653924
                            ],
                            [
                                -4.442596435546875,
                                50.5583786226931
                            ],
                            [
                                -4.4556427001953125,
                                50.56797448965885
                            ],
                            [
                                -4.4528961181640625,
                                50.5780044432562
                            ],
                            [
                                -4.472808837890625,
                                50.588032261433824
                            ],
                            [
                                -4.4803619384765625,
                                50.58541651472972
                            ],
                            [
                                -4.5146942138671875,
                                50.59369921413021
                            ],
                            [
                                -4.5215606689453125,
                                50.615924518530534
                            ],
                            [
                                -4.57305908203125,
                                50.62420185009975
                            ],
                            [
                                -4.603958129882812,
                                50.629428887865565
                            ],
                            [
                                -4.6231842041015625,
                                50.61113171332364
                            ],
                            [
                                -4.6382904052734375,
                                50.597186230587035
                            ],
                            [
                                -4.6712493896484375,
                                50.58410858688503
                            ],
                            [
                                -4.6863555908203125,
                                50.57364385626088
                            ],
                            [
                                -4.687042236328125,
                                50.567538356277026
                            ],
                            [
                                -4.66644287109375,
                                50.55794240049447
                            ],
                            [
                                -4.66644287109375,
                                50.548344490674786
                            ],
                            [
                                -4.6746826171875,
                                50.53568971468197
                            ],
                            [
                                -4.6918487548828125,
                                50.52870631568803
                            ],
                            [
                                -4.687042236328125,
                                50.52172188294704
                            ],
                            [
                                -4.664382934570312,
                                50.51517303835635
                            ],
                            [
                                -4.6575164794921875,
                                50.50949663804864
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
        'Cornwall.'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-4.552459716796875,
            50.55401621902838
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-4.552459716796875,
            50.55401621902838
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
