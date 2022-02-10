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
    <h1 class="infoTitle">Howardian Hills</h1>
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
        <h1>Howardian Hills</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"The Howardian Hills form a distinctive, roughly rectangular area of well-wooded undulating countryside that rise, sometimes sharply, between the flat agricultural Vales of Pickering and York."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/howardian-hills</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p> "Jurassic limestone gives the landscape its character and, in effect, the irregular 180m-high ridges of the Howardian Hills are a southern extension of the rocks of the North York Moors. The AONB contains a rich and intimate tapestry of wooded hills and valleys, pastures and rolling farmland, as well as dramatic views from the higher ground across the agricultural vales below. On the eastern edge, the River Derwent cuts through the Hills in the Kirkham Gorge, a deep winding valley which was formed as an overflow channel from glacial Lake Pickering. The area is probably most famous as the setting for a remarkable concentration of fine country houses, whose parklands are an intrinsic part of the landscape experience. Most notable is Vanbrugh’s famous masterpiece, Castle Howard."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/howardian-hills
            </p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"Combining high-grade arable land, pasture and managed woodland, this is rich farming country whose very diversity creates its attractive rural character."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/howardian-hills</p>
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
    const comments_page_id = 14;
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
        center: [-0.9613037109374999,
            54.38855462060335
        ],
        zoom: 8,
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
                                -1.307373046875,
                                54.39335222384589
                            ],
                            [
                                -1.336212158203125,
                                54.256400599379525
                            ],
                            [
                                -1.21673583984375,
                                54.1455455311243
                            ],
                            [
                                -1.176910400390625,
                                54.06905933872848
                            ],
                            [
                                -1.07666015625,
                                53.97224342934289
                            ],
                            [
                                -0.9063720703124999,
                                54.0932281163235
                            ],
                            [
                                -0.775909423828125,
                                54.15680525469165
                            ],
                            [
                                -0.74432373046875,
                                54.247575231805506
                            ],
                            [
                                -0.657806396484375,
                                54.33013884120688
                            ],
                            [
                                -0.64544677734375,
                                54.47083566372382
                            ],
                            [
                                -0.77178955078125,
                                54.457266680933856
                            ],
                            [
                                -0.8074951171874999,
                                54.50115006509871
                            ],
                            [
                                -0.92010498046875,
                                54.494769953452256
                            ],
                            [
                                -1.003875732421875,
                                54.52825442998894
                            ],
                            [
                                -1.138458251953125,
                                54.53064512815931
                            ],
                            [
                                -1.182403564453125,
                                54.463652645044796
                            ],
                            [
                                -1.307373046875,
                                54.39335222384589
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
        'Howardian Hills'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-0.9613037109374999,
            54.38855462060335
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-0.9613037109374999,
            54.38855462060335
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
