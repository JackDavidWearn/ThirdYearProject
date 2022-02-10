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
    <h1 class="infoTitle">Clwydian Range and Dee Valley</h1>
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
        <h1>Clwydian Range and Dee Valley</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"The Clwydian Range is an unmistakeable chain of purple heather-clad summits, topped by Britain’s most strikingly situated Hillforts. The Range’s highest hill at 554 metres is Moel Famau, a familiar site to residents of the North West. The historic Jubilee Tower surmounts this hill with views over 11 counties."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/clwydian-range-and-dee-valley</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"There’s a range of magnificent heritage attractions to explore: a chain of Iron Age hillforts, surmount the hill tops of the Clwydian and Llantysilio Mountains, in the Dee Valley there is the Pontcysyllte Aqueduct and Canal World Heritage Site, Valle Crucis Abbey, Castell Dinas Brân and the magnificent Marcher fortress of Chirk Castle."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/clwydian-range-and-dee-valley</p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"This is a living working landscape, with a distinctively Welsh culture. Traditions and close ties to the land are still very much alive here. Many local events such as country shows and eisteddfodau emphasise this special relationship between community and landscape."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/clwydian-range-and-dee-valley
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
    const comments_page_id = 35; 
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
        center: [-3.2258605957031246,
            53.1335898292448
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
                                -3.382415771484375,
                                53.33661343554715
                            ],
                            [
                                -3.415374755859375,
                                53.312006056326894
                            ],
                            [
                                -3.390655517578125,
                                53.26849833145892
                            ],
                            [
                                -3.302764892578125,
                                53.166533500950905
                            ],
                            [
                                -3.25469970703125,
                                53.03543290697411
                            ],
                            [
                                -3.3961486816406246,
                                52.96849212681396
                            ],
                            [
                                -3.2560729980468746,
                                52.94036259335616
                            ],
                            [
                                -3.12835693359375,
                                52.95277493707405
                            ],
                            [
                                -3.063812255859375,
                                52.92546307943839
                            ],
                            [
                                -3.061065673828125,
                                52.96518371955126
                            ],
                            [
                                -3.118743896484375,
                                52.97924270176987
                            ],
                            [
                                -3.0816650390625,
                                53.00734694782051
                            ],
                            [
                                -3.077545166015625,
                                53.05112003878514
                            ],
                            [
                                -3.132476806640625,
                                53.067626642387374
                            ],
                            [
                                -3.1475830078125,
                                53.07092720421678
                            ],
                            [
                                -3.148956298828125,
                                53.09154998522271
                            ],
                            [
                                -3.190155029296875,
                                53.09979633151167
                            ],
                            [
                                -3.173675537109375,
                                53.10556783354543
                            ],
                            [
                                -3.1654357910156246,
                                53.124525888278804
                            ],
                            [
                                -3.179168701171875,
                                53.17064968295498
                            ],
                            [
                                -3.197021484375,
                                53.16159356135435
                            ],
                            [
                                -3.2464599609375,
                                53.22330194749886
                            ],
                            [
                                -3.324737548828125,
                                53.238920640924974
                            ],
                            [
                                -3.3673095703125,
                                53.261105825983904
                            ],
                            [
                                -3.374176025390625,
                                53.297234816415404
                            ],
                            [
                                -3.368682861328125,
                                53.314467432871226
                            ],
                            [
                                -3.338470458984375,
                                53.32349126597425
                            ],
                            [
                                -3.34808349609375,
                                53.3349733850843
                            ],
                            [
                                -3.382415771484375,
                                53.33661343554715
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
        'Clwydian Range and Dee Valley'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-3.2258605957031246,
            53.1335898292448
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-3.2258605957031246,
            53.1335898292448
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
