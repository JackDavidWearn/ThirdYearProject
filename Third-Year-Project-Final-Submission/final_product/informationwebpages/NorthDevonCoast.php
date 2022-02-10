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
    <h1 class="infoTitle">North Devon Coast</h1>
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
        <h1>North Devon Coast</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"Stretching west and south from Coombe Martin to the Cornish border, this is essentially a coastal AONB containing some of the finest cliff scenery in Britain."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/north-devon</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"The remote cliffs and cliff-top grasslands are important ecological sites, with many Sites of Special Scientific Interest. The dunes of Braunton Burrows, with their rare flora such as marsh orchids, are a National Nature Reserve<br>The AONB is heavily used both for traditional family holidays, coach excursions and increasingly for water sports, particularly surfing and windsurfing. The South West Coast Path, a National Trail, has opened up the high cliff tops for walkers and naturalists."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/north-devon</p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"In the north, steeply dipping rocks form hogsback cliffs in a natural continuation of Exmoor’s coastline. Turning south, Hartland Point’s dark, sheer crags and razor-like reefs are the coast at its sternest. Facing the full force of the Atlantic, its fractured jagged drama is the stuff of wreckers’ tales. The AONB also reaches inland to take in the cliff top plateau around Hartland. This is scored by deep valleys which reach the coast as steep hanging gaps in the cliffs, often foaming with spectacular coastal waterfalls."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/north-devon
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
    const comments_page_id = 23;
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
        center: [-4.47967529296875,
            50.90649688226159
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
                                -4.8504638671875,
                                50.59544275464843
                            ],
                            [
                                -4.924621582031249,
                                50.57626025689928
                            ],
                            [
                                -4.910888671875,
                                50.54136296522161
                            ],
                            [
                                -4.844970703125,
                                50.529142808410185
                            ],
                            [
                                -4.779052734375,
                                50.579748565025774
                            ],
                            [
                                -4.7186279296875,
                                50.649460483096135
                            ],
                            [
                                -4.581298828125,
                                50.736455137010665
                            ],
                            [
                                -4.52362060546875,
                                50.80419899467614
                            ],
                            [
                                -4.51263427734375,
                                50.913424211321335
                            ],
                            [
                                -4.4769287109375,
                                50.98609893339354
                            ],
                            [
                                -4.361572265625,
                                50.967076060181974
                            ],
                            [
                                -4.259948730468749,
                                50.968805734317804
                            ],
                            [
                                -4.18853759765625,
                                51.069016659603896
                            ],
                            [
                                -4.17205810546875,
                                51.13110763758015
                            ],
                            [
                                -4.12261962890625,
                                51.18622962638683
                            ],
                            [
                                -3.9495849609374996,
                                51.20688339486559
                            ],
                            [
                                -3.7985229492187496,
                                51.22408779639158
                            ],
                            [
                                -3.7957763671875,
                                51.244724592848236
                            ],
                            [
                                -4.1912841796875,
                                51.203441743080994
                            ],
                            [
                                -4.21600341796875,
                                51.184508061068165
                            ],
                            [
                                -4.21875,
                                51.15006324988587
                            ],
                            [
                                -4.251708984375,
                                51.14834033402119
                            ],
                            [
                                -4.22149658203125,
                                51.11904092252057
                            ],
                            [
                                -4.2352294921875,
                                51.056933728985435
                            ],
                            [
                                -4.3011474609375,
                                51.001657306391756
                            ],
                            [
                                -4.3780517578125,
                                50.98955680038983
                            ],
                            [
                                -4.42474365234375,
                                51.01375465718821
                            ],
                            [
                                -4.531860351562499,
                                51.01721046364217
                            ],
                            [
                                -4.5648193359375,
                                50.90476488890602
                            ],
                            [
                                -4.55657958984375,
                                50.793783247910106
                            ],
                            [
                                -4.68841552734375,
                                50.698197366045534
                            ],
                            [
                                -4.76806640625,
                                50.65990836093937
                            ],
                            [
                                -4.78729248046875,
                                50.61113171332364
                            ],
                            [
                                -4.8504638671875,
                                50.59544275464843
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
        'North Devon Coast'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-4.47967529296875,
            50.90649688226159
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-4.47967529296875,
            50.90649688226159
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
