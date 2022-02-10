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
    <h1 class="infoTitle">North Wessex Downs</h1>
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
        <h1>North Wessex Downs</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"The evocative, albeit made-up, name for the AONB was created to give a protective coherence to one of the largest tracts of chalk downland in southern England and perhaps one of the least affected by development. It includes the bright, bare uplands of the Marlborough, Berkshire and North Hampshire Downs and sweeps on its western edge to a crest above the White Horse Vale."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/north-wessex-downs</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"The importance of the surviving downland habitat and ancient woodland is matched in this AONB by its huge archaeological significance. Settled since 3000 BC, the downs are dotted with barrows and other prehistoric features. The Wansdyke earthwork, Roman roads and ancient tracks such as the Ridgeway add to a striking sense of antiquity. In places, distinctive white horses have been cut into the chalk, the most famous being the White Horse of Uffington. The neolithic stone circle at Avebury and surrounding monuments are included in a World Heritage Site."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/north-wessex-downs</p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"Tourism in the AONB has to date been focused on localised sites such as Avebury. However, the AONB is of growing recreational importance both to visitors and to an expanding regional population. A number of initiatives, including the Ridgeway National Trail, and Kennet and Avon Canal Projects have developed to meet this need."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/north-wessex-downs
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
    const comments_page_id = 26;
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
        center: [-1.4931106567382812,
            51.41623104850411
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
                                -1.363677978515625,
                                51.40691605170516
                            ],
                            [
                                -1.31561279296875,
                                51.45315114582281
                            ],
                            [
                                -1.49688720703125,
                                51.45999681055089
                            ],
                            [
                                -1.5902709960937498,
                                51.492499698989036
                            ],
                            [
                                -1.723480224609375,
                                51.524124996893335
                            ],
                            [
                                -1.73309326171875,
                                51.44716034698012
                            ],
                            [
                                -1.724853515625,
                                51.41890742069287
                            ],
                            [
                                -1.676788330078125,
                                51.33833359386697
                            ],
                            [
                                -1.64794921875,
                                51.29455864325789
                            ],
                            [
                                -1.65618896484375,
                                51.26535213392538
                            ],
                            [
                                -1.669921875,
                                51.19569708625667
                            ],
                            [
                                -1.517486572265625,
                                51.212045390353026
                            ],
                            [
                                -1.40625,
                                51.29627609493991
                            ],
                            [
                                -1.366424560546875,
                                51.36149165915505
                            ],
                            [
                                -1.363677978515625,
                                51.40691605170516
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
        'North Wessex Downs'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-1.4931106567382812,
            51.41623104850411
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-1.4931106567382812,
            51.41623104850411
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
