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
    <h1 class="infoTitle">Shropshire Hills</h1>
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
        <h1>Shropshire Hills</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"A landscape of diversity and contrast created by varied geology, the Shropshire Hills provide a dramatic link between the Midlands and the Welsh mountains."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/shropshire-hills</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"A rich heritage of hillforts, castles, mottes and Offa’s Dyke tell of centuries of border strife. Much of the pattern of dispersed settlement and small fields is very ancient. Stone, brick and timbered buildings combine with the industrial relics of lead mining, quarrying and charcoal burning. Off the beaten track, unspoilt and remote in the context of the West Midlands, the Shropshire Hills are a haven of tranquillity – peace and quiet, dark skies, and of high scenic and environmental quality."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/shropshire-hills</p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"Of the hills themselves, the craggy Stiperstones and Wrekin, the moorland plateau and valleys of the Long Mynd, the quarried Clee Hills, the wooded Wenlock Edge and the rolling Clun Forest all have their own character."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/shropshire-hills
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
    const comments_page_id = 28;
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
        center: [-2.964935302734375,
            52.471069987788326
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
                                -2.964935302734375,
                                52.35715118125809
                            ],
                            [
                                -2.89215087890625,
                                52.35715118125809
                            ],
                            [
                                -2.7987670898437496,
                                52.38901106223458
                            ],
                            [
                                -2.827606201171875,
                                52.41414736782131
                            ],
                            [
                                -2.827606201171875,
                                52.4752525720828
                            ],
                            [
                                -2.8138732910156246,
                                52.528754547664185
                            ],
                            [
                                -2.76031494140625,
                                52.60388157154259
                            ],
                            [
                                -2.945709228515625,
                                52.61138719721736
                            ],
                            [
                                -2.989654541015625,
                                52.56382983983128
                            ],
                            [
                                -3.00750732421875,
                                52.54128465552713
                            ],
                            [
                                -3.028106689453125,
                                52.521234766555494
                            ],
                            [
                                -3.036346435546875,
                                52.50284765940397
                            ],
                            [
                                -3.09814453125,
                                52.500339730516934
                            ],
                            [
                                -3.2299804687499996,
                                52.453498792506736
                            ],
                            [
                                -3.2244873046875,
                                52.42671015087138
                            ],
                            [
                                -3.0445861816406246,
                                52.34624647178617
                            ],
                            [
                                -2.964935302734375,
                                52.35715118125809
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
        'Shropshire Hills'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-2.964935302734375,
            52.471069987788326
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-2.964935302734375,
            52.471069987788326
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
