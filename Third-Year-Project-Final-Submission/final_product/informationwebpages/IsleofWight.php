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
    <h1 class="infoTitle">Isle of Wight</h1>
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
        <h1>Isle of Wight</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"Half of this beautiful island is protected as an AONB in separate areas which include the principal landscape features of the interior’s central and southern downlands and also much of its famous coastline. Visually, the AONB is dominated by chalk in the sharp upfold which forms both the island’s eastwest backbone and southern expanse of wide green downs, and its most famous landmark, the bright white stacks of the Needles."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/isle-wight</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p> "The AONB, with a population of 10,000, has few large settlements. It includes small resorts such as Freshwater Bay but skirts major resorts such as Shanklin, Ventnor and Cowes which are major centres of employment, in tourism and services."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk
            </p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"The Isle of Wight is one of Britain’s longest established visitor destinations and includes seaside family resorts, caravan and holiday parks and the seasonal day trip influx on the Solent ferries. The island is also a popular yachting centre, focused on Cowes and Yarmouth. To encourage countryside tourism, the council has created the Isle of Wight coastal footpath and seven long-distance trails."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk</p>
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
    const comments_page_id = 15;
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
        center: [-1.29638671875,
            50.6712242729033
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
                                -1.577911376953125,
                                50.66339047047327
                            ],
                            [
                                -1.5449523925781248,
                                50.6677427443026
                            ],
                            [
                                -1.487274169921875,
                                50.6677427443026
                            ],
                            [
                                -1.45843505859375,
                                50.64771894418296
                            ],
                            [
                                -1.388397216796875,
                                50.63030000433214
                            ],
                            [
                                -1.30462646484375,
                                50.57626025689928
                            ],
                            [
                                -1.2483215332031248,
                                50.582364626580485
                            ],
                            [
                                -1.175537109375,
                                50.60241627093303
                            ],
                            [
                                -1.165924072265625,
                                50.646848150517854
                            ],
                            [
                                -1.1041259765625,
                                50.6686131506577
                            ],
                            [
                                -1.06842041015625,
                                50.68688795669134
                            ],
                            [
                                -1.1151123046875,
                                50.72167742756552
                            ],
                            [
                                -1.160430908203125,
                                50.73210923577103
                            ],
                            [
                                -1.2359619140625,
                                50.745145729828636
                            ],
                            [
                                -1.29913330078125,
                                50.764259357116465
                            ],
                            [
                                -1.33758544921875,
                                50.756441089372665
                            ],
                            [
                                -1.432342529296875,
                                50.726893622009605
                            ],
                            [
                                -1.533966064453125,
                                50.70341617382632
                            ],
                            [
                                -1.577911376953125,
                                50.66339047047327
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
        'Isle of Wight'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-1.29638671875,
            50.6712242729033
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-1.29638671875,
            50.6712242729033
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
