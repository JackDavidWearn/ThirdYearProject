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
    <h1 class="infoTitle">East Devon</h1>
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
        <h1>East Devon</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"The East Devon AONB, full of contrast and colour, diverse and rich in wildlife and a working landscape home to approximately 30,640 residents. Designated in 1963, covering 268 sq kms and a third of East Devon District, the AONB skirts the major settlements in the area with the exception of Budleigh Salterton."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/cranborne-chase</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p> "The World Heritage Site ‘Jurassic’ coastline and South West Coast Path play an important role in the popularity of the AONB. With its dramatic cliffs, a unique insight into 185 million years of earth history and attractive coastal villages that still retain a vernacular character and rural charm, the coast brings in significant economic benefit to the area."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/east-devon
            </p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"The AONB is punctuated by hamlets and villages built of local stone, thatch and cob, reflecting the geology and traditional land use of the area. Chert and pebblebed stone (“popple”) can be found in many churches and local buildings and the much sought after Beer limestone helped build Exeter Cathedral and buildings across America. Evidence of man’s former activity is evident today in the form of nationally significant Bronze Age hill-barrow cemetery at Farway, several Iron Age hill-forts and numerous tumuli and former quarries."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/cranborne-chase</p>
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
    const comments_page_id = 11;
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
        center: [-3.1565093994140625,
            50.70385104825872
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
                                -3.1805419921874996,
                                50.686452924955525
                            ],
                            [
                                -3.146896362304687,
                                50.68471275767546
                            ],
                            [
                                -3.1290435791015625,
                                50.68688795669134
                            ],
                            [
                                -3.09539794921875,
                                50.68558284938287
                            ],
                            [
                                -3.0919647216796875,
                                50.692977977464544
                            ],
                            [
                                -3.097457885742187,
                                50.6964576343863
                            ],
                            [
                                -3.11187744140625,
                                50.70211152632997
                            ],
                            [
                                -3.127670288085937,
                                50.70602535992328
                            ],
                            [
                                -3.131103515625,
                                50.711678098380915
                            ],
                            [
                                -3.14483642578125,
                                50.71385204707258
                            ],
                            [
                                -3.1743621826171875,
                                50.70732989852461
                            ],
                            [
                                -3.1702423095703125,
                                50.70298129536074
                            ],
                            [
                                -3.1585693359375,
                                50.693847915895624
                            ],
                            [
                                -3.157196044921875,
                                50.68906305486583
                            ],
                            [
                                -3.1805419921874996,
                                50.686452924955525
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
        'East Devon'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-3.1565093994140625,
            50.70385104825872
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-3.1565093994140625,
            50.70385104825872
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
