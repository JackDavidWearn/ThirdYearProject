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
    <h1 class="infoTitle">Forest of Bowland</h1>
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
        <h1>Forest of Bowland</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"Expanses of sky above the wild dramatic sweep of open moorland, gentle and tidy lowlands, criss-crossed with dry stone walls and dotted with picturesque farms and villages. This is a place like no other, a place with a strong sense of stepping back in time to a forgotten part of the English countryside, a place known as Bowland – the Forest of Bowland Area of Outstanding Natural Beauty."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/forest-bowland</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p> "An area of national and international importance because of its unspoiled and richly diverse landscapes, wildlife and heritage, Bowland has outstanding heather moorland, blanket bog, and rare birds. The deeply incised cloughs and wooded valleys are particularly characteristic of the Forest of Bowland as are its well managed sporting estates. The AONB also has semi-natural woodlands and wildflower meadows. Thirteen per cent of the AONB is designated as a Site of Special Scientific Interest (SSSI) for its habitats and geological features."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/forest-bowland
            </p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"The characteristic lowland English landscape on the Suffolk-Essex border, made famous worldwide by artists, is still recognisable today as it was when painted by Constable and Gainsborough. The charm of the villages, fascinating local attractions and beauty of the surrounding countryside mean there’s no shortage of places to go and things to see."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/forest-bowland</p>
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
    const comments_page_id = 12;
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
        center: [-2.525482177734375,
            53.98032002986215
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
                                -2.7685546874999996,
                                54.06905933872848
                            ],
                            [
                                -2.76580810546875,
                                54.04971418210692
                            ],
                            [
                                -2.775421142578125,
                                54.01987274461683
                            ],
                            [
                                -2.76031494140625,
                                53.96174150788831
                            ],
                            [
                                -2.742462158203125,
                                53.89220058269065
                            ],
                            [
                                -2.701263427734375,
                                53.80876065067746
                            ],
                            [
                                -2.624359130859375,
                                53.763325426869066
                            ],
                            [
                                -2.48291015625,
                                53.80389494430924
                            ],
                            [
                                -2.4005126953125,
                                53.83308071272798
                            ],
                            [
                                -2.340087890625,
                                53.91728101547621
                            ],
                            [
                                -2.204132080078125,
                                53.952853199668546
                            ],
                            [
                                -2.044830322265625,
                                53.9665888773818
                            ],
                            [
                                -2.2412109375,
                                54.00292618287952
                            ],
                            [
                                -2.297515869140625,
                                54.04245742542455
                            ],
                            [
                                -2.338714599609375,
                                54.09564422005199
                            ],
                            [
                                -2.4884033203125,
                                54.141523459050966
                            ],
                            [
                                -2.5721740722656246,
                                54.14474114796277
                            ],
                            [
                                -2.687530517578125,
                                54.08356229415844
                            ],
                            [
                                -2.74932861328125,
                                54.07228265560388
                            ],
                            [
                                -2.7685546874999996,
                                54.06905933872848
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
        'Forest of Bowland'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-2.525482177734375,
            53.98032002986215
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-2.525482177734375,
            53.98032002986215
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
