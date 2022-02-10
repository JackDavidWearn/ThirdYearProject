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
    <h1 class="infoTitle">Surrey Hills</h1>
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
        <h1>Surrey Hills</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"Spanning Surrey from east to west, the much-loved, much-used hills of this ‘front line’ AONB are a beleaguered green expanse which, together with the Green Belt, hold back London’s advancing commuter sprawl."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/surrey-hills</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"The AONB is hugely popular with visitors. It includes within its borders such famous beauty spots as Box Hill and the Devil’s Punch Bowl. Much of the downland crest is owned by conservation bodies including the National Trust and there is a dense, heavily used network of public and recreational footpaths including the Greensand Way and the North Downs Way National Trail which runs from Farnham across the AONB and into Kent."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/surrey-hills</p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"The AONB links together a chain of varied upland landscapes including the North Downs, traditionally the day trip destination for southeast London. Rising near Guildford as the narrow Hog’s Back, the ridge of the downs stretches away to the Kent border, an unmistakable chalk landscape of swelling hills and beech-wooded combes with a steep scarp crest looking south to the Weald. The downs are paralleled to the south by an undulating wooded greensand ridge, rising at Leith Hill to southeast England’s highest point (294m). In the west, sandy open heathland, typified by Frensham Common, stretches away to the Hampshire border."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/surrey-hills
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
    const comments_page_id = 32;
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
        center: [-0.29422760009765625,
            51.263633525637
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
                                -0.3206634521484375,
                                51.235267210116255
                            ],
                            [
                                -0.2835845947265625,
                                51.24150070353523
                            ],
                            [
                                -0.2681350708007812,
                                51.24536934359527
                            ],
                            [
                                -0.2519989013671875,
                                51.2442947539955
                            ],
                            [
                                -0.221099853515625,
                                51.24042602354956
                            ],
                            [
                                -0.2286529541015625,
                                51.25869216883395
                            ],
                            [
                                -0.25096893310546875,
                                51.268574351257385
                            ],
                            [
                                -0.25989532470703125,
                                51.27394421143647
                            ],
                            [
                                -0.27500152587890625,
                                51.287902911134154
                            ],
                            [
                                -0.31482696533203125,
                                51.29906681689515
                            ],
                            [
                                -0.31070709228515625,
                                51.28597042110153
                            ],
                            [
                                -0.32684326171875,
                                51.282534682474655
                            ],
                            [
                                -0.32100677490234375,
                                51.271581550270724
                            ],
                            [
                                -0.3302764892578125,
                                51.26921876761326
                            ],
                            [
                                -0.3220367431640625,
                                51.25439490504132
                            ],
                            [
                                -0.3206634521484375,
                                51.235267210116255
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
        'Surrey Hills'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-0.29422760009765625,
            51.263633525637
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-0.29422760009765625,
            51.263633525637
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
