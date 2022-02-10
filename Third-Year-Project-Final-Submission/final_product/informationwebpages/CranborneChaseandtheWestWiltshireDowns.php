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
    <h1 class="infoTitle">Cranborne Chase and the West Wiltshire Downs</h1>
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
        <h1>Cranborne Chase and the West Wiltshire Downs</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"Cranborne Chase and West Wiltshire Downs AONB is part of the extensive belt of chalkland which stretches across southern England. It is divided into its two areas by the fertile wooded Vale of Wardour."</p>
            <p style="font-weight: bold; font-size: 20px">"To the south, Cranborne Chase with its smooth rounded downs, steeply cut combes and dry valleys shows a typical chalk landscape. To the north, the topography of the Wiltshire Downs is more varied and broken, with shapely knolls and whaleback ridges. Both areas are fringed on the west by an impressive scarp, cresting above the adjoining clay vales."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/cranborne-chase</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"Old Wardour Castle - Set in the beautiful Wiltshire countryside beside a lake, these 14th Century castle ruins provide a relaxed, romantic day out for couples, families and budding historians alike."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://cranbornechase.org.uk/exploring/visitor-attractions/
            </p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"The AONB is of great ecological importance. Its protected sites range from ancient downland, herb-rich fen and river meadow to scattered deciduous woodland which includes remnants of the ancient Cranborne Chase hunting forest and the former Royal Forests of Selwood and Gillingham. It is rich in prehistoric sites with many ancient monuments and field patterns on the downs, whilst the Vale of Wardour is dominated by large 18th and 19th century estates, parklands and associated villages."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/cranborne-chase</p>
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
    const comments_page_id = 8;
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
        center: [-1.9720458984374998,
            50.999928855859636
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
                                -2.18353271484375,
                                50.86837814203458
                            ],
                            [
                                -1.9335937499999998,
                                50.939392513903876
                            ],
                            [
                                -1.8649291992187502,
                                51.01721046364217
                            ],
                            [
                                -1.7962646484375,
                                51.060386316691016
                            ],
                            [
                                -1.7962646484375,
                                51.069016659603896
                            ],
                            [
                                -1.85943603515625,
                                51.084547222263666
                            ],
                            [
                                -1.88690185546875,
                                51.12076493195686
                            ],
                            [
                                -2.164306640625,
                                51.19139393653174
                            ],
                            [
                                -2.1917724609375,
                                51.18278643144626
                            ],
                            [
                                -2.15606689453125,
                                51.138001488062564
                            ],
                            [
                                -2.18353271484375,
                                50.86837814203458
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
        'Cranborne Chase and the West Wiltshire Downs.'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-1.9720458984374998,
            50.999928855859636
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-1.9720458984374998,
            50.999928855859636
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
