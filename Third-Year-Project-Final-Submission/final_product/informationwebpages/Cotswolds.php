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
    <h1 class="infoTitle">Cotswolds</h1>
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
        <h1>Cotswolds</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"The Cotswold Hills rise gently west from the broad, green meadows of the upper Thames to crest in a dramatic escarpment above the Severn valley and Evesham Vale. Rural England at its most mellow, the landscape draws a unique warmth and richness from the famous stone beauty of its buildings."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/cotswolds</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"Blenheim palace - A visit to Blenheim Palace offers an unforgettable experience. It’s a chance to share the splendours of Baroque architecture designed in the 1700s by Vanbrugh and Hawksmoor, to wonder at the collections of art, tapestry and antiques, and to explore the Park and Gardens and discover landscapes crafted by Lancelot ‘Capability’ Brown to form magnificent vistas of English countryside."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://www.cotswolds.com/things-to-do/attractions
            </p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"The Roman Baths - The Roman Baths is located at the heart of the World Heritage City of Bath. Here, the Romans built a magnificent temple and bathing complex on the site of Britain’s only hot spring, which still flows with naturally hot water."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://www.cotswolds.com/things-to-do/attractions</p>
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
    const comments_page_id = 7;
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
        center: [-2.091522216796875,
            51.72277481454246
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
                                -2.06817626953125,
                                51.70235319992082
                            ],
                            [
                                -2.042083740234375,
                                51.71596863417754
                            ],
                            [
                                -2.02972412109375,
                                51.723625515056554
                            ],
                            [
                                -2.033843994140625,
                                51.74743863117572
                            ],
                            [
                                -2.058563232421875,
                                51.76868973964185
                            ],
                            [
                                -2.086029052734375,
                                51.80097227240144
                            ],
                            [
                                -2.118988037109375,
                                51.81540697949439
                            ],
                            [
                                -2.120361328125,
                                51.79672589054756
                            ],
                            [
                                -2.154693603515625,
                                51.77378851755184
                            ],
                            [
                                -2.187652587890625,
                                51.76104049272952
                            ],
                            [
                                -2.1917724609375,
                                51.735533641609564
                            ],
                            [
                                -2.1917724609375,
                                51.723625515056554
                            ],
                            [
                                -2.1450805664062496,
                                51.72277481454246
                            ],
                            [
                                -2.1299743652343746,
                                51.71171425120453
                            ],
                            [
                                -2.094268798828125,
                                51.71171425120453
                            ],
                            [
                                -2.06817626953125,
                                51.70235319992082
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
        'Cotswolds.'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-2.091522216796875,
            51.72277481454246
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-2.091522216796875,
            51.72277481454246
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
