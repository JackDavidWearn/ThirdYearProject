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
    <h1 class="infoTitle">Northumberland Coast</h1>
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
        <h1>Northumberland Coast</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"This bright, wild, lonely coast sweeps along some of Britain’s finest beaches and is internationally noted for its wildlife."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/northumberland-coast</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"Where the coastline is broken by the Whin Sill, ancient black basalt meets the sea in low headlands and rocky coves, dramatic setting for Bamburgh and Dunstanburgh Castles and shelter for working harbours such as Craster.<br>Much of the coast is owned or managed by conservation organisations and includes many Sites of Special Scientific Interest. The dunes, marshes and mud-flats of the Lindisfarne National Nature Reserve are one of the best sites in Europe for waders and waterfowl and offshore, the Farne Islands are a protected seabird sanctuary. The AONB’s dune systems are a particularly fine example of this fragile habitat."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/northumberland-coast</p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"The AONB, a narrow coastal strip, stretches from Berwick-upon-Tweed to Amble. Soft sandstone and limestone rocks dipping gently as a plain to the sea make this essentially a low-lying coast with long views. Open miles of beach are backed in places by extensive sand dunes and the AONB takes in the island of Lindisfarne and its treacherous intertidal flats, as well as the numerous small islands and rocks of the Farne Islands further out from the coast."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/northumberland-coast
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
    const comments_page_id = 25;
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
        center: [-1.591644287109375,
            55.26659815231191
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
                                -1.6094970703125,
                                55.38379153179286
                            ],
                            [
                                -1.6101837158203125,
                                55.370917218258874
                            ],
                            [
                                -1.5964508056640625,
                                55.33890835596374
                            ],
                            [
                                -1.555938720703125,
                                55.32289421921913
                            ],
                            [
                                -1.57379150390625,
                                55.30061990930196
                            ],
                            [
                                -1.583404541015625,
                                55.28067965709029
                            ],
                            [
                                -1.5676116943359373,
                                55.24037761161493
                            ],
                            [
                                -1.5380859375,
                                55.226673434540125
                            ],
                            [
                                -1.5113067626953125,
                                55.1961157065271
                            ],
                            [
                                -1.536712646484375,
                                55.17769138840118
                            ],
                            [
                                -1.5332794189453125,
                                55.15965082581807
                            ],
                            [
                                -1.5140533447265625,
                                55.103123229254905
                            ],
                            [
                                -1.4934539794921875,
                                55.103123229254905
                            ],
                            [
                                -1.494140625,
                                55.1286490684888
                            ],
                            [
                                -1.522979736328125,
                                55.16475007322762
                            ],
                            [
                                -1.4996337890624998,
                                55.19298025406383
                            ],
                            [
                                -1.51885986328125,
                                55.216881845376555
                            ],
                            [
                                -1.528472900390625,
                                55.23058939555117
                            ],
                            [
                                -1.5442657470703125,
                                55.23685413136347
                            ],
                            [
                                -1.5717315673828125,
                                55.28146181651345
                            ],
                            [
                                -1.5538787841796875,
                                55.30570111642547
                            ],
                            [
                                -1.5470123291015623,
                                55.32367554676877
                            ],
                            [
                                -1.5813446044921875,
                                55.340860856760045
                            ],
                            [
                                -1.6094970703125,
                                55.38379153179286
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
        'Northumberland Coast'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-1.591644287109375,
            55.26659815231191
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-1.591644287109375,
            55.26659815231191
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
