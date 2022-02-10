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
    <h1 class="infoTitle">Solway Coast</h1>
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
        <h1>Solway Coast</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"Stretching along the Cumbrian shore of the Solway Firth, this is a low, open and windswept AONB with wide views across to the hills of Galloway."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/solway-coast</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"Tourism is an important, though relatively undeveloped, supplement to the local economy, concentrated in caravan sites at the small resorts of Silloth and Allonby. A number of archaeological sites include defences built by the Romans.<br>The AONB is also a popular day trip destination for touring motorists from Carlisle, the West Cumbrian coast towns and Tyneside, and the shore road bears heavy peak season traffic. The Cumbria Cycle Way passes through the AONB and the proposed regional footpath, the Cumbria Coastal Way follows the foreshore and continues to Port Carlisle. The Hadrian’s Wall Path National Trail follows the line of Hadrian’s Wall through the north of the AONB."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/solway-coast</p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"Physically part of the Solway Plain, the coast’s characteristic feature is its continuous 7.6m raised beach. Silting along the estuary has left extensive marine deposits and the open foreshore strip now consists either of marine terrace with low, scrub-covered sandstone cliffs or undulating dunes. The falling tides expose wide sand stretches, intertidal mud-flats and, higher upstream, salt-marsh and peat moss, in a landscape with a sense of remoteness that is the essence of its value and character."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/solway-coast
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
    const comments_page_id = 29;
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
        center: [-3.3625030517578125,
            54.85961574715581
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
                                -3.4909057617187496,
                                54.72699938009519
                            ],
                            [
                                -3.492279052734375,
                                54.720654575930766
                            ],
                            [
                                -3.4407806396484375,
                                54.73730756865752
                            ],
                            [
                                -3.4222412109375,
                                54.76623577446008
                            ],
                            [
                                -3.429107666015625,
                                54.79831000983151
                            ],
                            [
                                -3.384475708007812,
                                54.85487282062161
                            ],
                            [
                                -3.343276977539062,
                                54.88608683754535
                            ],
                            [
                                -3.2897186279296875,
                                54.87344609731539
                            ],
                            [
                                -3.297958374023437,
                                54.85210585589739
                            ],
                            [
                                -3.2711791992187496,
                                54.85171055972851
                            ],
                            [
                                -3.28216552734375,
                                54.87897690906443
                            ],
                            [
                                -3.339157104492187,
                                54.900697751009574
                            ],
                            [
                                -3.3782958984375,
                                54.88411198325295
                            ],
                            [
                                -3.40850830078125,
                                54.85250114819277
                            ],
                            [
                                -3.438720703125,
                                54.79553916639435
                            ],
                            [
                                -3.437347412109375,
                                54.7595009150459
                            ],
                            [
                                -3.4909057617187496,
                                54.72699938009519
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
        'Solway Coast'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-3.3625030517578125,
            54.85961574715581
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-3.3625030517578125,
            54.85961574715581
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
