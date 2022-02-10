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
    <h1 class="infoTitle">Norfolk Coast</h1>
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
        <h1>Norfolk Coast</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"This long coastal strip incorporates the finest, remotest and wildest of Norfolk’s renowned marsh coastlands."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/norfolk-coast</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"This is a soft shifting coastline of unique scientific and ecological value and contains some of the most important salt-marsh, intertidal flats, dunes, shingle and grazing marsh in Europe. Together the coastal habitats form an ecosystem of outstanding importance and National Nature Reserves within the area include the world-famous bird reserves, Titchwell and Cley Marshes, and Winterton Dunes, one of the country’s finest dune systems. The Heritage Coast stretch is a Ramsar site, a Biosphere Reserve, a Site of Special Scientific Interest, a Special Protection Area and candidate Special Area for Conservation (SAC) and Marine SAC."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/norfolk-coast</p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"It includes the silt expanses of the Wash, the north-facing coastal marsh and dunes of the Heritage Coast and the high boulder clay cliffs east of Weybourne which the sea is rapidly eroding away. The coast is backed by gently rolling chalkland and glacial moraine including the distinctive 90-m high Cromer Ridge. An undulating, intimate landscape under huge skies, the area is characterised by its imposing churches and quiet brick and flint villages and small towns such as Wells-next-the-Sea."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/norfolk-coast
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
    const comments_page_id = 22;
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
        center: [0.70587158203125,
            52.81438319143107
        ],
        zoom: 9,
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
                                0.3570556640625,
                                52.81770312827123
                            ],
                            [
                                0.3790283203125,
                                52.784492347358785
                            ],
                            [
                                0.48889160156250006,
                                52.84757114966556
                            ],
                            [
                                0.582275390625,
                                52.93374122040315
                            ],
                            [
                                0.80474853515625,
                                52.92049543493046
                            ],
                            [
                                1.07666015625,
                                52.91387102227775
                            ],
                            [
                                1.28265380859375,
                                52.900619156807274
                            ],
                            [
                                1.43646240234375,
                                52.832639706103215
                            ],
                            [
                                1.69464111328125,
                                52.65306169664117
                            ],
                            [
                                1.7358398437499998,
                                52.65139547872391
                            ],
                            [
                                1.68914794921875,
                                52.72963909783717
                            ],
                            [
                                1.5655517578125,
                                52.81438319143107
                            ],
                            [
                                1.27716064453125,
                                52.95691159357149
                            ],
                            [
                                0.54107666015625,
                                52.98337682621539
                            ],
                            [
                                0.48339843749999994,
                                52.94367289991597
                            ],
                            [
                                0.43395996093749994,
                                52.855864177853974
                            ],
                            [
                                0.3570556640625,
                                52.81770312827123
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
        'Norfolk Coast'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([0.54656982421875,
            52.96187505907603
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([0.54656982421875,
            52.96187505907603
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
