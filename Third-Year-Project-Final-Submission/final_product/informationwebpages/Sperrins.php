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
    <h1 class="infoTitle">Sperrins</h1>
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
        <h1>Sperrins</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"Lying in the heart of Northern Ireland the Sperrin AONB encompasses a largely mountainous area of great geological complexity."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/sperrin</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"Stretching from the Strule Valley in the west to the perimeter of the Lough Neagh lowlands in the east this area presents vast expanses of moorland penetrated by narrow glens and deep valleys. In its south the Burren area is noted for its lakes, sandy eskers and other glacial features. The area is rich in historic and archaeological heritage and folklore."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/sperrin</p>
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
    const comments_page_id = 45;
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
        center: [-7.11090087890625,
            54.78643362918132
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
                                -7.283935546874999,
                                54.63728692308159
                            ],
                            [
                                -7.176818847656249,
                                54.63410762690361
                            ],
                            [
                                -6.96807861328125,
                                54.656357480617494
                            ],
                            [
                                -6.86370849609375,
                                54.70558168515836
                            ],
                            [
                                -6.693420410156249,
                                54.71351548400387
                            ],
                            [
                                -6.71539306640625,
                                54.77059302750084
                            ],
                            [
                                -6.800537109375,
                                54.776930012578994
                            ],
                            [
                                -6.822509765624999,
                                54.81809622556344
                            ],
                            [
                                -6.74560546875,
                                54.84815271989618
                            ],
                            [
                                -6.70440673828125,
                                54.88766665128511
                            ],
                            [
                                -6.70989990234375,
                                54.94923107905585
                            ],
                            [
                                -6.84722900390625,
                                54.96657837889866
                            ],
                            [
                                -6.8939208984375,
                                54.92714186454645
                            ],
                            [
                                -7.0257568359375,
                                54.88608683754535
                            ],
                            [
                                -7.154846191406249,
                                54.909777539554824
                            ],
                            [
                                -7.2454833984375,
                                54.92240688263684
                            ],
                            [
                                -7.31964111328125,
                                54.881347024619686
                            ],
                            [
                                -7.358093261718749,
                                54.85131525968606
                            ],
                            [
                                -7.415771484374999,
                                54.84498993218758
                            ],
                            [
                                -7.434997558593749,
                                54.77851410375888
                            ],
                            [
                                -7.393798828125,
                                54.761085688673816
                            ],
                            [
                                -7.34710693359375,
                                54.659535037041586
                            ],
                            [
                                -7.283935546874999,
                                54.63728692308159
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
        'Sperrins'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-7.11090087890625,
            54.78643362918132
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-7.11090087890625,
            54.78643362918132
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
