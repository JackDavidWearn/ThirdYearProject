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
    <h1 class="infoTitle">Suffolk Coast and Heaths</h1>
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
        <h1>Suffolk Coast and Heaths</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"The Suffolk Coast and Heaths Area of Outstanding Natural Beauty (AONB) is a low-lying coastal landscape of astonishing variety, stretching from the Stour estuary in the South to Kessingland in the North, and covering 403 square kilometres."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/suffolk-coast-and-heaths</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"A source of inspiration to countless artists, writers and musicians, the AONB is a landscape rich in history and largely spared from modern development. Its picturesque countryside, towns and villages have an unspoilt and tranquil atmosphere, with a very distinctive ‘Suffolk’ character. Visitor activity to the AONB is centred around the medieval market town of Aldeburgh and other coastal towns and hamlets such as Southwold and Walberswick."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/suffolk-coast-and-heaths</p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"Its unique mixture of shingle beaches, crumbling cliffs, marshes, estuaries, heathland, forests and farmland makes the AONB a very special place to live, work and visit."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/suffolk-coast-and-heaths
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
    const comments_page_id = 31;
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
        center: [1.4845275878906248,
            52.082037871680605
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
                                1.32659912109375,
                                51.93664541998453
                            ],
                            [
                                1.404876708984375,
                                51.988263083821714
                            ],
                            [
                                1.479034423828125,
                                52.04911238586802
                            ],
                            [
                                1.577911376953125,
                                52.08456959594681
                            ],
                            [
                                1.5902709960937498,
                                52.12927304719675
                            ],
                            [
                                1.627349853515625,
                                52.217704193421454
                            ],
                            [
                                1.643829345703125,
                                52.300081389496114
                            ],
                            [
                                1.701507568359375,
                                52.3605059352529
                            ],
                            [
                                1.731719970703125,
                                52.42168546718757
                            ],
                            [
                                1.717987060546875,
                                52.431734261871235
                            ],
                            [
                                1.67266845703125,
                                52.38565847278254
                            ],
                            [
                                1.6204833984374998,
                                52.29420237796669
                            ],
                            [
                                1.5902709960937498,
                                52.175616047410195
                            ],
                            [
                                1.542205810546875,
                                52.10650519075632
                            ],
                            [
                                1.461181640625,
                                52.06093458403525
                            ],
                            [
                                1.39251708984375,
                                52.00263774475873
                            ],
                            [
                                1.32110595703125,
                                51.95865365978013
                            ],
                            [
                                1.32659912109375,
                                51.93664541998453
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
        'Suffolk Coast and Heaths'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([1.4845275878906248,
            52.082037871680605
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([1.4845275878906248,
            52.082037871680605
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
