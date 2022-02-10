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
    <h1 class="infoTitle">Llŷn</h1>
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
        <h1>Llŷn</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"Nowhere is far from the sea on the long, low peninsula of Llŷn, which is famous for the unspoilt beauty of its coastline. The AONB, covering a quarter of the peninsula, is largely coastal, but extends inland to take in the volcanic domes which punctuate the plateau."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/llyn</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"Llŷn’s highest points are the north’s abrupt volcanic peaks dominated by the granite crags of Yr Eifl (564m). At its foot, a landscape of hedged fields and rough pastures rolls out towards the sea and finally to the sheer black cliffs of Mynydd Mawr, the tip of the peninsula. The countryside is characterised by its narrow lanes and white-washed farms and includes stretches of ancient open common."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/llyn</p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"Tourism, particularly water sports, is central to the local economy. The south coast, with its fine facilities many moorings, is one of Britain’s leading sailing centres. Diving, waterskiing and windsurfing are also major visitor activities. The AONB is a very popular caravan and camping destination."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/llyn
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
    const comments_page_id = 38;
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
        center: [-4.562072753906249,
            52.860839234299405
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
                                -4.45220947265625,
                                52.87410326334818
                            ],
                            [
                                -4.320373535156249,
                                52.89564866211353
                            ],
                            [
                                -4.317626953125,
                                52.908902047770255
                            ],
                            [
                                -4.21600341796875,
                                52.92049543493046
                            ],
                            [
                                -4.2022705078125,
                                52.95856614537994
                            ],
                            [
                                -4.34783935546875,
                                53.04121304075649
                            ],
                            [
                                -4.42474365234375,
                                53.00486789706824
                            ],
                            [
                                -4.515380859375,
                                52.94367289991597
                            ],
                            [
                                -4.5703125,
                                52.95525697845468
                            ],
                            [
                                -4.68841552734375,
                                52.87741863698718
                            ],
                            [
                                -4.70489501953125,
                                52.86249745970948
                            ],
                            [
                                -4.72137451171875,
                                52.860839234299405
                            ],
                            [
                                -4.72686767578125,
                                52.83429900891837
                            ],
                            [
                                -4.76806640625,
                                52.7994403373623
                            ],
                            [
                                -4.7296142578125,
                                52.78781456679963
                            ],
                            [
                                -4.70489501953125,
                                52.80442185934101
                            ],
                            [
                                -4.6966552734375,
                                52.78781456679963
                            ],
                            [
                                -4.67193603515625,
                                52.80442185934101
                            ],
                            [
                                -4.64447021484375,
                                52.80110090809378
                            ],
                            [
                                -4.6087646484375,
                                52.826001860971836
                            ],
                            [
                                -4.55657958984375,
                                52.81106300100147
                            ],
                            [
                                -4.5428466796875,
                                52.79113653258534
                            ],
                            [
                                -4.51812744140625,
                                52.78283114251513
                            ],
                            [
                                -4.49615478515625,
                                52.79279742036009
                            ],
                            [
                                -4.48516845703125,
                                52.80774255697418
                            ],
                            [
                                -4.493408203125,
                                52.83761742439466
                            ],
                            [
                                -4.4659423828125,
                                52.84259457223949
                            ],
                            [
                                -4.4769287109375,
                                52.855864177853974
                            ],
                            [
                                -4.45220947265625,
                                52.87410326334818
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
        'Llŷn'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-4.562072753906249,
            52.860839234299405
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-4.562072753906249,
            52.860839234299405
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
