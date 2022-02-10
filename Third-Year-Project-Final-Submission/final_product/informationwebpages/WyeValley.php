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
    <h1 class="infoTitle">Wye Valley</h1>
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
        <h1>Wye Valley</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"The Wye Valley, winding sinuously down from Hereford to Chepstow, is both one of the finest lowland river landscapes in Britain and the only protected landscape to straddle the border between England and Wales."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/wye-valley-1</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"In the north, the river meanders through the broad meadows, dotted woods and hedgerows of the Hereford plain renowned for its farming and orchards. The most dramatic limestone scenery, including the famous Symonds Yat Rock, lies downstream from Ross-on-Wye. Deeply incised meanders have cut into the plateau to form sheer wooded limestone cliffs with superb views down to the valley floor. Between the gorges are broader valley reaches, with rounded hills and bluffs and a gently rolling skyline."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/wye-valley-1</p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"Farming in the AONB still follows a traditional pattern of mixed arable and dairying plus fruit orchards in the fertile north, and is an essential part of the landscape’s value.<br>Forestry has been an industry for centuries both here and in the nearby Forest of Dean and the Forestry Commission both in England and Wales has substantial landholdings in the AONB. Limestone continues to be actively quarried."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/wye-valley-1
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
    const comments_page_id = 34;
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
        center: [-2.6360321044921875,
            51.83832319038298
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
                                -2.6971435546875,
                                51.84383831484229
                            ],
                            [
                                -2.7184295654296875,
                                51.80054765221206
                            ],
                            [
                                -2.7829742431640625,
                                51.753815013860255
                            ],
                            [
                                -2.76031494140625,
                                51.70958690964188
                            ],
                            [
                                -2.75482177734375,
                                51.64358968607138
                            ],
                            [
                                -2.7266693115234375,
                                51.62441118472021
                            ],
                            [
                                -2.68890380859375,
                                51.64699834847127
                            ],
                            [
                                -2.6387786865234375,
                                51.69852312061961
                            ],
                            [
                                -2.6387786865234375,
                                51.79417786947443
                            ],
                            [
                                -2.588653564453125,
                                51.818802709382474
                            ],
                            [
                                -2.5563812255859375,
                                51.85910744139958
                            ],
                            [
                                -2.57080078125,
                                51.92860125361562
                            ],
                            [
                                -2.6806640625,
                                51.931988446795515
                            ],
                            [
                                -2.778167724609375,
                                51.86716405856181
                            ],
                            [
                                -2.7410888671875,
                                51.836626093087354
                            ],
                            [
                                -2.6971435546875,
                                51.84383831484229
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
        'Wye Valley'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-2.6360321044921875,
            51.83832319038298
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-2.6360321044921875,
            51.83832319038298
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
