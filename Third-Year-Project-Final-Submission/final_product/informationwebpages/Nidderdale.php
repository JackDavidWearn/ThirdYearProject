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
    <h1 class="infoTitle">Nidderdale</h1>
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
        <h1>Nidderdale</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"Nidderdale is located on the eastern flanks of the Yorkshire Pennines stretching from the high moorland of Great Whernside south and east towards the edge of the Vale of York."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/nidderdale</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"Coldstones Cut – Yorkshire’s biggest and highest public artwork on a monumental scale with viewpoints and a platform overlooking the working quarry.<br>Druid’s Temple – an atmospheric folly set in pine woodland on the Swinton Estate, near Masham. Perfect for families to explore.<br>Fountains Abbey & Studley Royal – a stunning World Heritage Site with a ruined Cistercian Abbey, Water Garden, Deer Park and more"</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://nidderdaleaonb.org.uk/visiting/things-to-do-and-see/attractions/</p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"The area is crossed by deep pastoral, often wooded dales of the Washburn, Laver, Burn and the long majestic dale of the Nidd itself. Reservoirs add a further dimension to the beauty of the dale. Rich, rolling and wooded pastoral scenery, with stone settlements like Lofthouse and Kirkby Malzeard, contrast with bleak heather moorland which is broken by craggy gritstone outcrops, including the curious shapes of Brimham Rocks. To the east, in the wooded pasture lands of the Skell Valley, stands the internationally renowned and much visited Studley Royal, with the picturesque ruins of Fountains Abbey."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/nidderdale
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
    const comments_page_id = 21;
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
        center: [-1.778411865234375,
            54.10570980429925
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
                                -1.82647705078125,
                                54.30210180910987
                            ],
                            [
                                -2.0379638671875,
                                54.29729354239265
                            ],
                            [
                                -2.2206115722656246,
                                54.31171665801094
                            ],
                            [
                                -2.471923828125,
                                54.155196910253814
                            ],
                            [
                                -2.2906494140625,
                                54.05777575896167
                            ],
                            [
                                -2.042083740234375,
                                53.97305115985005
                            ],
                            [
                                -1.8882751464843748,
                                53.97870483500941
                            ],
                            [
                                -1.594390869140625,
                                54.00938282974412
                            ],
                            [
                                -1.5106201171875,
                                54.131868892085414
                            ],
                            [
                                -1.5449523925781248,
                                54.16404203127826
                            ],
                            [
                                -1.7083740234375,
                                54.247575231805506
                            ],
                            [
                                -1.82647705078125,
                                54.30210180910987
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
        'Nidderdale'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-1.778411865234375,
            54.10570980429925
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-1.778411865234375,
            54.10570980429925
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
