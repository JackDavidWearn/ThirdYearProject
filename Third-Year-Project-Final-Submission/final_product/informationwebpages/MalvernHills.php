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
    <h1 class="infoTitle">Malvern Hills</h1>
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
        <h1>Malvern Hills</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"The special quality of the Malverns lies in its contrasts. The distinctive, narrow, north-south ridge, a mountain range in miniature, thrusts unexpectedly from the pastoral farmland patchwork of the Severn Vale."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/malvern-hills</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p> "Tourists have flocked here to ‘take the waters’ since the early 1800s and Great Malvern’s formal paths and rides give the nearby slopes the air of a Victorian pleasure garden. The ridge and hillside paths and the commons are traditional Midlands ‘day trip’ country. The Worcestershire Way footpath is an important new recreation resource in the AONB"</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/malvern-hills</p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"The highest point is Worcestershire Beacon (425m) and walkers along the ridge crest enjoy views as far as Wales and the Cotswolds."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/malvern-hills</p>
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
    const comments_page_id = 19;
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
        center: [-2.3675537109375,
            52.07444183716456
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
                                -2.3867797851562496,
                                52.19371883423884
                            ],
                            [
                                -2.404632568359375,
                                52.18614182026113
                            ],
                            [
                                -2.4005126953125,
                                52.17477387796151
                            ],
                            [
                                -2.40875244140625,
                                52.17351059389276
                            ],
                            [
                                -2.3998260498046875,
                                52.1520292754815
                            ],
                            [
                                -2.4066925048828125,
                                52.14908004993246
                            ],
                            [
                                -2.38128662109375,
                                52.128008471364694
                            ],
                            [
                                -2.3957061767578125,
                                52.11114403064544
                            ],
                            [
                                -2.410125732421875,
                                52.079084011853325
                            ],
                            [
                                -2.4190521240234375,
                                52.065156039527885
                            ],
                            [
                                -2.423858642578125,
                                52.06304536165708
                            ],
                            [
                                -2.42523193359375,
                                52.04869010664418
                            ],
                            [
                                -2.409439086914062,
                                52.044044771802895
                            ],
                            [
                                -2.42523193359375,
                                52.033062969886096
                            ],
                            [
                                -2.40875244140625,
                                52.02038830745109
                            ],
                            [
                                -2.409439086914062,
                                52.0094006941874
                            ],
                            [
                                -2.3957061767578125,
                                52.00475127623642
                            ],
                            [
                                -2.374420166015625,
                                51.998410382390325
                            ],
                            [
                                -2.3503875732421875,
                                51.99714209583072
                            ],
                            [
                                -2.3236083984375,
                                52.02165593534503
                            ],
                            [
                                -2.3201751708984375,
                                52.03475265347471
                            ],
                            [
                                -2.3146820068359375,
                                52.036864668162416
                            ],
                            [
                                -2.3105621337890625,
                                52.04995693234413
                            ],
                            [
                                -2.289276123046875,
                                52.067688721304165
                            ],
                            [
                                -2.3016357421875,
                                52.07190953840937
                            ],
                            [
                                -2.3133087158203125,
                                52.094273208568964
                            ],
                            [
                                -2.3050689697265625,
                                52.107770376769224
                            ],
                            [
                                -2.3455810546875,
                                52.12632231442671
                            ],
                            [
                                -2.3517608642578125,
                                52.14360239845529
                            ],
                            [
                                -2.3600006103515625,
                                52.151607969506735
                            ],
                            [
                                -2.352447509765625,
                                52.15919086706848
                            ],
                            [
                                -2.3586273193359375,
                                52.16550896167102
                            ],
                            [
                                -2.3785400390625,
                                52.16803594836457
                            ],
                            [
                                -2.382659912109375,
                                52.174352787258066
                            ],
                            [
                                -2.3716735839843746,
                                52.174352787258066
                            ],
                            [
                                -2.3805999755859375,
                                52.18277384398686
                            ],
                            [
                                -2.3867797851562496,
                                52.19371883423884
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
        'Malvern Hills'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-2.3675537109375,
            52.07444183716456
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-2.3675537109375,
            52.07444183716456
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
