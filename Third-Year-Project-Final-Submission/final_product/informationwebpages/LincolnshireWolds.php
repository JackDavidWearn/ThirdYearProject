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
    <h1 class="infoTitle">Lincolnshire Wolds</h1>
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
        <h1>Lincolnshire Wolds</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"The Lincolnshire Wolds is a peaceful and expansive landscape; unlike some AONBs with large tracts of wild land, much of the area has been in intensive agricultural for centuries with the shift from sheep farming to cultivation through agricultural improvements from as early as the 1800’s." </p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/lincolnshire-wolds</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p> "Often described as Lincolnshire’s best kept secret, the Wolds is becoming well known to those who appreciate open rural landscapes, literary connections with the poet Lord Tennyson, and its many miles of fine walking, cycling and horse riding country. Many local businesses are working alongside one another, under the Love Lincolnshire Wolds banner, to help promote the area as a sustainable tourism destination and enhance links with visitors to the City of Lincoln and Lincolnshire’s coastal attractions from the Humber to the Wash"</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/lincolnshire-wolds</p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"Topographically, the Wolds are a dissected chalk plateaux in the north, falling gently eastward from a western scarp face which crests in subtle contrast to the surrounding plain. To the south and east, the chalk ridge gives way to river valleys of mixed geology, sheltered settlements and pasture land. The grasslands and abandoned chalk pits are an important habitat for rare flowers and insects and some areas of fine mixed woodland are managed to conserve their traditional oak, ash and hazel coppice. Today the AONB’s rural economy is based on mixed farming with a large proportion of fields in arable cultivation, alongside grazing pastures in the valley slopes and bottoms. There are many unspoilt villages, with distinctive churches reflecting the patterns and colours of the local building stones. The Wolds is surrounded and supported by a range of market towns such as Caistor, Horncastle and Louth – all with their own unique character and distinctive range of independent shops."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/lincolnshire-wolds</p>
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
    const comments_page_id = 18;
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
        center: [0.021629333496093747,
            53.374009960094746
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
                                -0.012187957763671873,
                                53.377082187864424
                            ],
                            [
                                -0.024375915527343747,
                                53.36776241350118
                            ],
                            [
                                -0.028152465820312497,
                                53.35803080300195
                            ],
                            [
                                -0.02025604248046875,
                                53.353215394910215
                            ],
                            [
                                0.0037765502929687496,
                                53.344915223283344
                            ],
                            [
                                0.0157928466796875,
                                53.335690914921614
                            ],
                            [
                                0.01338958740234375,
                                53.31631337214051
                            ],
                            [
                                0.0748443603515625,
                                53.33394832152006
                            ],
                            [
                                0.09441375732421875,
                                53.366942995161345
                            ],
                            [
                                0.0583648681640625,
                                53.39458965465114
                            ],
                            [
                                0.0322723388671875,
                                53.41198760270909
                            ],
                            [
                                -0.0254058837890625,
                                53.405233950075996
                            ],
                            [
                                -0.02231597900390625,
                                53.39254236949268
                            ],
                            [
                                -0.0116729736328125,
                                53.3845570163884
                            ],
                            [
                                -0.012187957763671873,
                                53.377082187864424
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
        'Lincolnshire Wolds'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([0.021629333496093747,
            53.374009960094746
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([0.021629333496093747,
            53.374009960094746
        ])
        .addTo(map)
        .setPopup(popup);
</script>

<?php
    include_once 'footer.php';
?>