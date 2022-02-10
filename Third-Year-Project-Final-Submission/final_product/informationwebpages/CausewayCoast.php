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
    <h1 class="infoTitle">Causeway Coast</h1>
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
        <h1>Causeway Coast</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"Extending for 30km along the North Antrim Coast the Causeway Coast AONB has a wide variety of different landscapes including the Giant’s Causeway and Causeway Coast World Heritage Site."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/causeway-coast</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"The western part of the AONB is characterised by an extensive dune system at East Strand. It also includes a dramatic stretch of alternating white chalk and black basalt cliffs. Dunluce Castle forms a spectacular landmark with views of Donegal and the Skerries to the north. Contrasting with this wild coastal scenery are the gentler landscapes of the Bush valley with its mixed farmland, woodland and the historic village of Bushmills."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/causeway-coast</p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"The duneland system at White Park Bay has national importance. Further east, Carrick-a-Rede rope bridge is one of Northern Ireland’s top visitor attractions.The rugged coastal scenery around Kinbane has steep basalt cliffs and there are spectacular views north to Islay and Rathlin Island. This area is characterised by rough grassland, dry-stone walls, bogland, and gorse (known locally as ‘whin’)."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/causeway-coast
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
    const comments_page_id = 41; 
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
        center: [-6.48468017578125,
            55.23058939555117
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
                                -6.270446777343749,
                                55.21100573522985
                            ],
                            [
                                -6.247100830078125,
                                55.21178926670743
                            ],
                            [
                                -6.278686523437499,
                                55.22275708802209
                            ],
                            [
                                -6.2896728515625,
                                55.23293878712267
                            ],
                            [
                                -6.315765380859374,
                                55.23293878712267
                            ],
                            [
                                -6.3336181640625,
                                55.2415520356525
                            ],
                            [
                                -6.3665771484375,
                                55.245466531916485
                            ],
                            [
                                -6.414642333984374,
                                55.23528803992295
                            ],
                            [
                                -6.477813720703125,
                                55.2525116539652
                            ],
                            [
                                -6.53411865234375,
                                55.23528803992295
                            ],
                            [
                                -6.53961181640625,
                                55.21962373322949
                            ],
                            [
                                -6.593170166015625,
                                55.20787145508382
                            ],
                            [
                                -6.637115478515625,
                                55.21178926670743
                            ],
                            [
                                -6.64398193359375,
                                55.20395325785898
                            ],
                            [
                                -6.617889404296874,
                                55.1961157065271
                            ],
                            [
                                -6.524505615234375,
                                55.20865504825601
                            ],
                            [
                                -6.527252197265624,
                                55.19454801114891
                            ],
                            [
                                -6.499786376953125,
                                55.20865504825601
                            ],
                            [
                                -6.50665283203125,
                                55.21962373322949
                            ],
                            [
                                -6.41326904296875,
                                55.23058939555117
                            ],
                            [
                                -6.403656005859375,
                                55.21805696330365
                            ],
                            [
                                -6.340484619140625,
                                55.231372541494274
                            ],
                            [
                                -6.270446777343749,
                                55.21100573522985
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
        'Causeway Coast'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-6.48468017578125,
            55.23058939555117
        ])
        .setPopup(popup)
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-6.48468017578125,
            55.23058939555117
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
