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
    <h1 class="infoTitle">Blackdown Hills</h1>
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
        <h1>Blackdown Hills</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"The Blackdown Hills are a little-known group of hills lying on the border of Devon and Somerset. Broadly, the area extends from Wellington in the north to Honiton in the south and from Cullompton in the west to Chard in the east."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/blackdown-hills</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"Adcombe Wood - Adcombe Wood, managed by the Woodland Trust, is a species-rich, ancient woodland with vast small-leaved lime trees, veteran oaks, rare wild service trees, and an understory of once coppiced hazel."</p>
            <p>"Bishopswood Meadows - Bishopswood Meadows is a Somerset Wildlife Trust nature reserve on the site of a 19th-century lime quarry. Lime-rich grassland, marshy meadows and the River Yarty mean that this site attracts an interesting range of species."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://blackdownhillsaonb.org.uk/visit/places-to-see/</p>
        </div>
        <div class="col">
            <h2>Key Attraction Points</h2>
            <p>T"he Blackdown Hills are best known for the dramatic, steep, wooded scarp face they present to the north. To the south the land dips away gently as a plateau, deeply dissected by valleys. On top of the plateau there are wide open windswept spaces; in the valleys nestle villages and hamlets surrounded by ancient and intricate patterns of small enclosed fields and a maze of winding high-hedged lanes."</p>
            <p>"The geology of the Blackdown Hills is unique in Britain. Not only giving rise to the area’s distinctive topography, the underlying non-calcareous rock has created a notably diverse pattern of plant communities."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/blackdown-hills</p>
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
    const comments_page_id = 2;
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
        center: [-3.1544494628906246,
          50.8826763249596],
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
                                -3.203201293945312,
                                50.80419899467614
                            ],
                            [
                                -3.1784820556640625,
                                50.806368649716646
                            ],
                            [
                                -3.1585693359375,
                                50.822420965626726
                            ],
                            [
                                -3.1221771240234375,
                                50.85710981721644
                            ],
                            [
                                -3.0933380126953125,
                                50.878777255570405
                            ],
                            [
                                -3.0686187744140625,
                                50.89393847048056
                            ],
                            [
                                -3.05419921875,
                                50.90346585160204
                            ],
                            [
                                -2.995147705078125,
                                50.92078336884323
                            ],
                            [
                                -2.945709228515625,
                                50.933767278488375
                            ],
                            [
                                -2.9724884033203125,
                                50.95280379090146
                            ],
                            [
                                -3.021926879882812,
                                50.988692357790164
                            ],
                            [
                                -3.0562591552734375,
                                51.01505061478908
                            ],
                            [
                                -3.116683959960937,
                                50.98091164990174
                            ],
                            [
                                -3.1915283203125,
                                50.9709677364145
                            ],
                            [
                                -3.25469970703125,
                                50.951938663980826
                            ],
                            [
                                -3.327484130859375,
                                50.93117078647935
                            ],
                            [
                                -3.3638763427734375,
                                50.90996067566236
                            ],
                            [
                                -3.3762359619140625,
                                50.878777255570405
                            ],
                            [
                                -3.3789825439453125,
                                50.86187751776882
                            ],
                            [
                                -3.3144378662109375,
                                50.85580945064428
                            ],
                            [
                                -3.3116912841796875,
                                50.84410451978964
                            ],
                            [
                                -3.283538818359375,
                                50.834564997026824
                            ],
                            [
                                -3.24920654296875,
                                50.82285473543414
                            ],
                            [
                                -3.218307495117187,
                                50.80767039437801
                            ],
                            [
                                -3.203201293945312,
                                50.80419899467614
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
        'Blackdown Hills.'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-3.1544494628906246,
          50.8826763249596])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-3.1544494628906246,
          50.8826763249596
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
