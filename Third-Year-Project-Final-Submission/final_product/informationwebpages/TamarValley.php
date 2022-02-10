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
    <h1 class="infoTitle">Tamar Valley</h1>
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
        <h1>Tamar Valley</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"Rising on the borders of Cornwall and Devon, the rivers Tamar, Tavy and Lynher, form one of the last, unspoilt drowned valley river systems in England."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/tamar-valley</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"On their passage to the broad estuary near Plymouth, the rivers flow through a series of deep meanders, steep gorges and wooded valleys. A ribbon of woodland extends along the Estuary margin although it is often no more than a mature hedgerow above a steep earth bank. In the middle valleys where the ridges are wide the high land has an almost plateau character and there is a feeling of remoteness and solitude. The landscape contains a wide variety of wildlife habitats, including many ancient woodlands and wetlands that provide important wintering grounds for wildfowl and wading birds."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/tamar-valley</p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"People have lived in the Tamar Valley for centuries, and the diverse scenery reflects the impact of their activities in an area rich in natural resources. Field patterns disclose ancient farming practices, disused mine workings reveal intensive mining activity during the 18th century, and old orchards scattered on the warm, south-facing valley slopes are the remnants of market gardens that were widespread in the area at the beginning of the 20th century."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/tamar-valley
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
    const comments_page_id = 33;
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
        center: [-4.222065210342407,
            50.51447034793093
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
                                -4.290161132812499,
                                50.387507803003146
                            ],
                            [
                                -4.273681640625,
                                50.376123645596735
                            ],
                            [
                                -4.269561767578125,
                                50.386194385829306
                            ],
                            [
                                -4.253082275390625,
                                50.38400527636708
                            ],
                            [
                                -4.2345428466796875,
                                50.39232335474891
                            ],
                            [
                                -4.2166900634765625,
                                50.396700704675396
                            ],
                            [
                                -4.2084503173828125,
                                50.41683130885151
                            ],
                            [
                                -4.2043304443359375,
                                50.43257972996993
                            ],
                            [
                                -4.1974639892578125,
                                50.43782803992737
                            ],
                            [
                                -4.1864776611328125,
                                50.433454488702594
                            ],
                            [
                                -4.163818359375,
                                50.45750402042058
                            ],
                            [
                                -4.1864776611328125,
                                50.422956317144916
                            ],
                            [
                                -4.104766845703125,
                                50.45575537567455
                            ],
                            [
                                -4.0917205810546875,
                                50.484599748567774
                            ],
                            [
                                -4.12261962890625,
                                50.51473641640986
                            ],
                            [
                                -4.151458740234375,
                                50.54136296522161
                            ],
                            [
                                -4.2111968994140625,
                                50.57495207474565
                            ],
                            [
                                -4.3045806884765625,
                                50.60154463790289
                            ],
                            [
                                -4.329986572265625,
                                50.583672602863736
                            ],
                            [
                                -4.332733154296875,
                                50.5317616799443
                            ],
                            [
                                -4.313507080078125,
                                50.52041218671901
                            ],
                            [
                                -4.290161132812499,
                                50.387507803003146
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
        'Tamar Valley'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-4.222065210342407,
            50.51447034793093
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-4.222065210342407,
            50.51447034793093
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
