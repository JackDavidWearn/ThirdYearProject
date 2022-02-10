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
    <h1 class="infoTitle">Isles of Scilly</h1>
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
        <h1>Isles of Scilly</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"The Isles of Scilly are the smallest AONB designation in the UK. However, the Islands possess a diversity of scenery that belies their small scale. The archipelago combines rugged granite cliffs and headlands, sparkling sandy bays, hidden coves, shifting dunes and saline lagoons. Over 6,000 years of human occupation has led to the development of lowland heath, enclosed pasture, hedged bulb-strips, small harbours and quays, and scattered rural settlement punctuated by tiny townships. The Islands are home to a variety of wildlife, most of which thrives due to the Islands’ unique environment. Nationally important habitats such as maritime heathland and grassland, small pockets of woodland, arable fields, hedges and stone walls support a large variety of plants and animals, some of which are unique to Scilly, such as the Scilly Shrew and the Scilly Bee."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/isles-scilly</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p> "The Islands’ population of Atlantic Grey Seals and breeding bird colonies are of international importance. For migrant bird species, Scilly often provides a vital feeding ground as they make their journey across continents, attracting hundreds of visitors to the Islands every autumn. The Islands’ crystal clear waters support a wide variety of marine flora and fauna and a wealth of colourful marine life from anemones, soft coral, sea fans and seagrass beds, visiting dolphins and occasionally basking sharks."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/isles-scilly
            </p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"Scilly possesses exceptional heritage and has the greatest density of Scheduled Monuments in the UK. Some areas such as the whole Island of Samson and Shipman Head Down on Bryher are scheduled landscapes that protect and conserve complex historic environments in their entirety. The Islands are famous for historic shipwrecks, notably The Association and three other vessels of the British Naval Fleet lost in 1707 while under the command of Sir Cloudesley Shovell. Scilly’s maritime history is of significant value both locally and nationally."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/isles-scilly</p>
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
    const comments_page_id = 16;
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
        center: [-6.298255920410156,
            49.91895662150218
        ],
        zoom: 12,
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
                                -6.327438354492187,
                                49.91265613102976
                            ],
                            [
                                -6.323833465576172,
                                49.90812369024422
                            ],
                            [
                                -6.320743560791016,
                                49.90845534669593
                            ],
                            [
                                -6.317481994628906,
                                49.908787000867136
                            ],
                            [
                                -6.317653656005859,
                                49.91298775631512
                            ],
                            [
                                -6.314735412597656,
                                49.91342991981491
                            ],
                            [
                                -6.311473846435547,
                                49.91188232982888
                            ],
                            [
                                -6.307010650634765,
                                49.90646537377806
                            ],
                            [
                                -6.307010650634765,
                                49.904696440039785
                            ],
                            [
                                -6.303577423095702,
                                49.90292744143264
                            ],
                            [
                                -6.301517486572266,
                                49.904143634943416
                            ],
                            [
                                -6.299800872802734,
                                49.90679704163232
                            ],
                            [
                                -6.30340576171875,
                                49.911108516212224
                            ],
                            [
                                -6.301517486572266,
                                49.912103417153176
                            ],
                            [
                                -6.296367645263672,
                                49.90978194969788
                            ],
                            [
                                -6.296367645263672,
                                49.911550696942044
                            ],
                            [
                                -6.289329528808594,
                                49.90989249830104
                            ],
                            [
                                -6.284694671630859,
                                49.911108516212224
                            ],
                            [
                                -6.283321380615234,
                                49.91508799683254
                            ],
                            [
                                -6.285381317138672,
                                49.91718814588049
                            ],
                            [
                                -6.2841796875,
                                49.917630270866894
                            ],
                            [
                                -6.278858184814453,
                                49.91641441739937
                            ],
                            [
                                -6.277656555175781,
                                49.918625037263894
                            ],
                            [
                                -6.276798248291015,
                                49.92227233846661
                            ],
                            [
                                -6.276798248291015,
                                49.92481423371189
                            ],
                            [
                                -6.280918121337891,
                                49.92779802667553
                            ],
                            [
                                -6.28143310546875,
                                49.931113135569234
                            ],
                            [
                                -6.286582946777344,
                                49.93199712609763
                            ],
                            [
                                -6.29138946533203,
                                49.935422436244636
                            ],
                            [
                                -6.299285888671875,
                                49.93807412205248
                            ],
                            [
                                -6.30340576171875,
                                49.93498047442262
                            ],
                            [
                                -6.309070587158203,
                                49.934207031480234
                            ],
                            [
                                -6.3094139099121085,
                                49.93022912882622
                            ],
                            [
                                -6.3137054443359375,
                                49.927355994928085
                            ],
                            [
                                -6.308898925781249,
                                49.92348804421907
                            ],
                            [
                                -6.308727264404297,
                                49.91718814588049
                            ],
                            [
                                -6.314563751220703,
                                49.91508799683254
                            ],
                            [
                                -6.321773529052734,
                                49.916967081867064
                            ],
                            [
                                -6.327438354492187,
                                49.91265613102976
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
        'Isles of Scilly'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-6.298255920410156,
            49.91895662150218
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-6.298255920410156,
            49.91895662150218
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
