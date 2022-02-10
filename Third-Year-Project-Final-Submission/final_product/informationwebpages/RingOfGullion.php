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
    <h1 class="infoTitle">Ring of Gullion</h1>
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
        <h1>Ring of Gullion</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"The landscape and the people mark out the Ring of Gullion as a special place and there are few small areas in Ireland which retain their local identity as clearly."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/ring-gullion</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"A special people living in a special place. The Ring of Gullion itself is a unique geological landform, (a ring dyke), not found anywhere else in the British Isles. The heather clad bulk of Slieve Gullion mountain lies at the centre of the AONB, which takes its name from the encircling ring of lower rugged hills. Rich wildlife habitats of heath, bog and woodland contrast with the neatly patterned fields and ladder farms. Slieve Gullion’s reputation as Ireland’s mountain of mystery arises from its rich associations with Irish legends and myths."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/ring-gullion</p>
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
    const comments_page_id = 44;
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
        center: [-6.41876220703125,
            54.1214072381932
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
                                -6.383056640625,
                                54.18815548107151
                            ],
                            [
                                -6.427001953125,
                                54.176904287355086
                            ],
                            [
                                -6.47369384765625,
                                54.180922922268515
                            ],
                            [
                                -6.483306884765625,
                                54.170473659213776
                            ],
                            [
                                -6.50115966796875,
                                54.169669760399614
                            ],
                            [
                                -6.529998779296875,
                                54.15278427641255
                            ],
                            [
                                -6.55609130859375,
                                54.123016895336384
                            ],
                            [
                                -6.565704345703124,
                                54.10852773013968
                            ],
                            [
                                -6.540985107421875,
                                54.10530722783159
                            ],
                            [
                                -6.51763916015625,
                                54.08597896079518
                            ],
                            [
                                -6.4764404296875,
                                54.06341793205027
                            ],
                            [
                                -6.475067138671874,
                                54.07631144981169
                            ],
                            [
                                -6.4434814453125,
                                54.0609999517185
                            ],
                            [
                                -6.389923095703125,
                                54.064223894211956
                            ],
                            [
                                -6.362457275390625,
                                54.07711716173652
                            ],
                            [
                                -6.362457275390625,
                                54.1173828217967
                            ],
                            [
                                -6.35009765625,
                                54.114967984383696
                            ],
                            [
                                -6.3336181640625,
                                54.10933281663397
                            ],
                            [
                                -6.3336181640625,
                                54.09483886777795
                            ],
                            [
                                -6.317138671875,
                                54.092422717142846
                            ],
                            [
                                -6.30615234375,
                                54.107722628012425
                            ],
                            [
                                -6.291046142578125,
                                54.112553006284585
                            ],
                            [
                                -6.318511962890625,
                                54.149567212540525
                            ],
                            [
                                -6.3720703125,
                                54.177708045578456
                            ],
                            [
                                -6.383056640625,
                                54.18815548107151
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
        'Ring of Gullion'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-6.41876220703125,
            54.1214072381932
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-6.41876220703125,
            54.1214072381932
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
