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
    <h1 class="infoTitle">Gower</h1>
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
        <h1>Gower</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"Chosen for its classic coastline and outstanding natural environment, Gower was the first AONB to be designated. Except for the small, urbanised eastern corner, the entire Gower peninsula is an AONB. Complex geology gives a wide variety of scenery in a relatively small area."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/gower</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"It ranges from the south coast’s superb carboniferous limestone scenery at Worms Head and Oxwich Bay to the salt-marshes and dune systems in the north. Inland, the most prominent features are the large areas of common, dominated by sandstone heath ridges including the soaring sweep of Cefn Bryn. Secluded valleys have rich deciduous woodland and the traditional agricultural landscape is a patchwork of fields characterised by walls, stone-faced banks and hedgerows."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/gower</p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"Gower is a highly popular area for overnight and day visitors, with tourism being a mainstay of the local economy. The AONB is a major water sports and family holiday destination for urban South Wales and the AONB is within four hours travelling time of 18 million people. The public rights of way network is extensive covering 431 km (268 miles) and is heavily used by both visitors and local people as it offers a wide variety of experiences reflecting the diversity of the Peninsula."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/gower
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
    const comments_page_id = 37;
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
        center: [-4.156951904296875,
            51.60266574567797
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
                                -4.214630126953124,
                                51.678516327862134
                            ],
                            [
                                -4.24346923828125,
                                51.671703487277476
                            ],
                            [
                                -4.239349365234375,
                                51.66488962182639
                            ],
                            [
                                -4.255828857421875,
                                51.65466690189882
                            ],
                            [
                                -4.25445556640625,
                                51.63847621195153
                            ],
                            [
                                -4.3121337890625,
                                51.6120474088444
                            ],
                            [
                                -4.290161132812499,
                                51.57706953722565
                            ],
                            [
                                -4.329986572265625,
                                51.565119704124186
                            ],
                            [
                                -4.280548095703125,
                                51.56170488911645
                            ],
                            [
                                -4.198150634765625,
                                51.53437713632629
                            ],
                            [
                                -4.19677734375,
                                51.54718906424884
                            ],
                            [
                                -4.137725830078125,
                                51.5403564848844
                            ],
                            [
                                -4.1583251953125,
                                51.55658218576253
                            ],
                            [
                                -4.10888671875,
                                51.56853426269097
                            ],
                            [
                                -4.06219482421875,
                                51.559143609567016
                            ],
                            [
                                -4.038848876953125,
                                51.56597336780693
                            ],
                            [
                                -3.96331787109375,
                                51.56597336780693
                            ],
                            [
                                -4.052581787109375,
                                51.58901622923166
                            ],
                            [
                                -3.992156982421875,
                                51.59669458697305
                            ],
                            [
                                -4.0045166015625,
                                51.60778325682619
                            ],
                            [
                                -4.077301025390625,
                                51.62739503977813
                            ],
                            [
                                -4.140472412109375,
                                51.63250976332741
                            ],
                            [
                                -4.1473388671875,
                                51.650406754602294
                            ],
                            [
                                -4.170684814453125,
                                51.650406754602294
                            ],
                            [
                                -4.189910888671875,
                                51.67255514839674
                            ],
                            [
                                -4.214630126953124,
                                51.678516327862134
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
        'Gower'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-4.156951904296875,
            51.60266574567797
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-4.156951904296875,
            51.60266574567797
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
