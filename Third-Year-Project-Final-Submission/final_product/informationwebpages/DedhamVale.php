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
    <h1 class="infoTitle">Dedham Vale</h1>
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
        <h1>Dedham Vale</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"The Dedham Vale AONB and Stour Valley embraces one of our most cherished landscapes. The characteristic lowland English landscape on the Suffolk-Essex border, made famous worldwide by artists, is still recognisable today as it was when painted by Constable and Gainsborough. The charm of the villages, fascinating local attractions and beauty of the surrounding countryside mean there’s no shortage of places to go and things to see."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/dedham-vale</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"The Stour Valley offers a wide range of activities for the whole family to enjoy from walking in the stunning landscape including the Stour Valley Path, exploring the River Stour by canoe or boat or by stepping back in time during a visit to one of the areas stately homes."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://www.dedhamvalestourvalley.org/visiting/what-to-see/activities-for-children-and-families/
            </p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"The open landscape of the Stour Valley provides a home for over 1,500 plant species, 175 bird and almost 1,000 moth species!"</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://www.dedhamvalestourvalley.org/visiting/what-to-see/activities-for-children-and-families/</p>
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
    const comments_page_id = 9;
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
        center: [0.9152984619140625,
            51.97726758181177
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
                                0.8943557739257811,
                                51.97261482608728
                            ],
                            [
                                0.9238815307617188,
                                51.97621017975556
                            ],
                            [
                                0.9523773193359375,
                                51.9730378238461
                            ],
                            [
                                0.9592437744140624,
                                51.97705610339705
                            ],
                            [
                                0.9424209594726561,
                                51.99756486200956
                            ],
                            [
                                0.8953857421874999,
                                52.0001013752444
                            ],
                            [
                                0.8740997314453125,
                                51.98636020931768
                            ],
                            [
                                0.8713531494140625,
                                51.9698652433205
                            ],
                            [
                                0.8799362182617188,
                                51.96775006484702
                            ],
                            [
                                0.8943557739257811,
                                51.97261482608728
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
        'Dedham Vale'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([0.9152984619140625,
            51.97726758181177
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([0.9152984619140625,
            51.97726758181177
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
