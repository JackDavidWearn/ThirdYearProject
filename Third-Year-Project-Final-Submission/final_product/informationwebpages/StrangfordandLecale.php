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
    <h1 class="infoTitle">Strangford and Lecale</h1>
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
        <h1>Strangford and Lecale</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"Strangford Lough is an almost landlocked inlet of the sea set within a diverse lowland topography. Within the lough, tips of drowned drumlin hills create a spectacular myriad of islands, while, on shore, the hills form a pleasant rolling landscape."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/strangford-lough</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"At the northern end of the lough, Scrabo Hill and tower form a prominent landscape feature which can be seen from miles around. The lough is of international importance for wintering wildfowl, while the shores, woodland, meadows, streams and marshes, together with the well tended farmland provide landscape diversity and great nature conservation interest."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/strangford-lough</p>
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
    const comments_page_id = 46;
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
        center: [-5.6085205078125,
            54.401346982784176
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
                                -5.689544677734375,
                                54.39015388401023
                            ],
                            [
                                -5.73486328125,
                                54.37575826945392
                            ],
                            [
                                -5.789794921875,
                                54.3325411265145
                            ],
                            [
                                -5.774688720703125,
                                54.28446875235516
                            ],
                            [
                                -5.65521240234375,
                                54.31091550638434
                            ],
                            [
                                -5.570068359375,
                                54.33093961856858
                            ],
                            [
                                -5.55633544921875,
                                54.30931315634242
                            ],
                            [
                                -5.614013671875,
                                54.271639968447985
                            ],
                            [
                                -5.667572021484375,
                                54.27885665086437
                            ],
                            [
                                -5.718383789062499,
                                54.27244188446146
                            ],
                            [
                                -5.75958251953125,
                                54.25800500877966
                            ],
                            [
                                -5.796661376953125,
                                54.265224078605684
                            ],
                            [
                                -5.833740234375,
                                54.25319159330393
                            ],
                            [
                                -5.8062744140625,
                                54.231524270392875
                            ],
                            [
                                -5.712890625,
                                54.2379454042067
                            ],
                            [
                                -5.681304931640624,
                                54.22189069636329
                            ],
                            [
                                -5.629119873046875,
                                54.22510213749345
                            ],
                            [
                                -5.483551025390625,
                                54.32853723970533
                            ],
                            [
                                -5.475311279296875,
                                54.37015861132772
                            ],
                            [
                                -5.4437255859375,
                                54.38375645641211
                            ],
                            [
                                -5.450592041015625,
                                54.42132706440438
                            ],
                            [
                                -5.476684570312499,
                                54.42132706440438
                            ],
                            [
                                -5.467071533203125,
                                54.403745106657865
                            ],
                            [
                                -5.51788330078125,
                                54.402146372988085
                            ],
                            [
                                -5.500030517578124,
                                54.422126065167866
                            ],
                            [
                                -5.51239013671875,
                                54.44608884604365
                            ],
                            [
                                -5.4931640625,
                                54.44848435328882
                            ],
                            [
                                -5.511016845703125,
                                54.49157952414198
                            ],
                            [
                                -5.530242919921874,
                                54.541799868588676
                            ],
                            [
                                -5.5645751953125,
                                54.56887726177128
                            ],
                            [
                                -5.65521240234375,
                                54.59195848180958
                            ],
                            [
                                -5.70465087890625,
                                54.5808174561958
                            ],
                            [
                                -5.755462646484375,
                                54.58797989384959
                            ],
                            [
                                -5.725250244140625,
                                54.554544410585585
                            ],
                            [
                                -5.7513427734375,
                                54.52825442998894
                            ],
                            [
                                -5.69915771484375,
                                54.45167814495863
                            ],
                            [
                                -5.689544677734375,
                                54.39015388401023
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
        'Strangford and Lecale'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-5.6085205078125,
            54.401346982784176
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-5.6085205078125,
            54.401346982784176
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
