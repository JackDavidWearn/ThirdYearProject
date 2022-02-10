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
    <h1 class="infoTitle">Quantock Hills</h1>
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
        <h1>Quantock Hills</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"A narrow, gently curving 19-km ridge, the Quantock Hills run north west from the Vale of Taunton Deane to the Bristol Channel coast."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/quantock-hills</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"The heathland and sessile oak woodlands of the AONB are nationally important wildlife habitats, notably rich in species. Much of southern Britain’s heathland has vanished or survives as fragments, making the AONB’s extensive heaths particularly valuable. Native red deer still roam the Quantock Hills.<br>Tourism is a significant part of the economy, based on farm accommodation and guest houses. The AONB is also a highly popular local recreational area with heavy demand from the towns on its fringe."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/quantock-hills</p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"Standing out above the agricultural plain, the ridge looks far more imposing than its actual height of 245 to 275m and is famous for its views that, by repute, stretch over nine counties."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/quantock-hills
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
    const comments_page_id = 27;
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
        center: [-3.000640869140625,
            51.146617353835516
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
                                -3.0356597900390625,
                                51.32889547080779
                            ],
                            [
                                -3.0123138427734375,
                                51.32160104493043
                            ],
                            [
                                -3.022613525390625,
                                51.267500303915845
                            ],
                            [
                                -2.99652099609375,
                                51.23827658825513
                            ],
                            [
                                -3.069305419921875,
                                51.2025812899514
                            ],
                            [
                                -3.065185546875,
                                51.16513602013777
                            ],
                            [
                                -2.9903411865234375,
                                51.1078332929739
                            ],
                            [
                                -2.970428466796875,
                                51.12722939437096
                            ],
                            [
                                -2.9848480224609375,
                                51.15307819787913
                            ],
                            [
                                -2.9958343505859375,
                                51.17374682092236
                            ],
                            [
                                -3.0445861816406246,
                                51.17589926990911
                            ],
                            [
                                -3.01025390625,
                                51.207313583256386
                            ],
                            [
                                -2.9972076416015625,
                                51.22494784771605
                            ],
                            [
                                -2.9827880859375,
                                51.2425753584134
                            ],
                            [
                                -3.008880615234375,
                                51.2640631837338
                            ],
                            [
                                -3.0054473876953125,
                                51.31001339554934
                            ],
                            [
                                -3.0054473876953125,
                                51.3254629443313
                            ],
                            [
                                -3.0356597900390625,
                                51.32889547080779
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
        'Quantock Hills'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-3.000640869140625,
            51.146617353835516
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-3.000640869140625,
            51.146617353835516
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
