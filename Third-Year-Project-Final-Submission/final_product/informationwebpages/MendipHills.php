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
    <h1 class="infoTitle">Mendip Hills</h1>
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
        <h1>Mendip Hills</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"Stretching eastward from the Bristol Channel, the imposing 300-m ridge of the Mendips rises, like a rampart above the Somerset Levels."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/mendip-hills</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p> "Several important landscape features help to create the AONB’s distinctive character, ranging from dew ponds and drystone walls to the ‘gruffy ground’ of old mine workings. The AONB, with two National Nature Reserves and many Sites of Special Scientific Interest, contains varied and important natural habitats including limestone pastures, ancient woodland and the gorge cliffs themselves with their rare flora. The Mendip plateau is particularly rich in ancient Bronze, Iron Age, Roman and medieval field monuments."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/mendip-hills</p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"The landscape’s distinctive silver-grey crags, gorges, dry valleys and rock outcrops show unmistakably that this is carboniferous limestone country and in fact, Britain’s most southerly example. Sink holes and depressions pockmark the surface and chemical action on the rock has produced spectacular underground caves."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/mendip-hills
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
    const comments_page_id = 20;
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
        center: [-2.7510452270507812,
            51.307867213356445
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
                                -2.797222137451172,
                                51.32363931013688
                            ],
                            [
                                -2.800312042236328,
                                51.311515663360325
                            ],
                            [
                                -2.7937889099121094,
                                51.301428064502886
                            ],
                            [
                                -2.7870941162109375,
                                51.2939145823131
                            ],
                            [
                                -2.7896690368652344,
                                51.28768819403519
                            ],
                            [
                                -2.774219512939453,
                                51.279420822339475
                            ],
                            [
                                -2.750873565673828,
                                51.28865441307455
                            ],
                            [
                                -2.7433204650878906,
                                51.28876176949068
                            ],
                            [
                                -2.745037078857422,
                                51.28328627226109
                            ],
                            [
                                -2.706584930419922,
                                51.282749423668605
                            ],
                            [
                                -2.7110481262207027,
                                51.31162296632194
                            ],
                            [
                                -2.736968994140625,
                                51.31870440697447
                            ],
                            [
                                -2.7529335021972656,
                                51.32203016092245
                            ],
                            [
                                -2.7517318725585933,
                                51.332756755987944
                            ],
                            [
                                -2.7927589416503906,
                                51.33447277836131
                            ],
                            [
                                -2.797222137451172,
                                51.32363931013688
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
        'Mendip Hills'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-2.7510452270507812,
            51.307867213356445
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-2.7510452270507812,
            51.307867213356445
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
