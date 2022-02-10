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
    <h1 class="infoTitle">Chichester Harbour</h1>
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
        <h1>Chichester Harbour</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"Chichester harbour is one the few remaining undeveloped coastal areas in Southern England. Bright wide expanses and intricate creeks are at the same time a major wildlife haven and among some of Britain’s most popular boating waters."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/chichester-harbour</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"Guided walks and activities - Chichester Harbour Conservancy runs a year round programme of events and activities designed to help you get the most out of our Area of Outstanding Natural Beauty. Events range from guided walks to crabbing competitions and are aimed at adults and children alike.
            </p>
            <p>Boat trips - Do you want to get out on the water but you don't have a boat?
            </p>
            <p>Days out - There are plenty of great days out to be enjoyed in the area."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://www.conservancy.co.uk/page/things-to-do
            </p>
        </div>
        <div class="col">
            <h2>Visitor Attraction</h2>
            <p>"Visitors can see the harbour from the water by joining one of the organised boat trips, these include the solar-powered catamaran Solar Heritage or vintage oyster boat Terror. In addition the Conservancy arranges a year-round programme of guided walks and activities with events for all ages and abilities."
            </p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/chichester-harbour</p>
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
    const comments_page_id = 4; 
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
        center: [-0.8668899536132812,
            50.80729072259863
        ],
        zoom: 12,
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
                                -0.8685207366943359,
                                50.80539231741706
                            ],
                            [
                                -0.8662033081054688,
                                50.80544655863565
                            ],
                            [
                                -0.8622550964355468,
                                50.80994836025661
                            ],
                            [
                                -0.8681774139404297,
                                50.81260584672163
                            ],
                            [
                                -0.8739280700683594,
                                50.81238891471834
                            ],
                            [
                                -0.8771038055419922,
                                50.81119577069075
                            ],
                            [
                                -0.8827686309814453,
                                50.81238891471834
                            ],
                            [
                                -0.8937549591064453,
                                50.81813727239658
                            ],
                            [
                                -0.8918666839599609,
                                50.82383070276704
                            ],
                            [
                                -0.8963298797607422,
                                50.82654161609698
                            ],
                            [
                                -0.8965873718261719,
                                50.83174612844614
                            ],
                            [
                                -0.8933258056640625,
                                50.83423975164831
                            ],
                            [
                                -0.8950424194335938,
                                50.83803414003555
                            ],
                            [
                                -0.9008789062499999,
                                50.83673324162753
                            ],
                            [
                                -0.9080886840820311,
                                50.83770891883328
                            ],
                            [
                                -0.9113502502441405,
                                50.83955180901146
                            ],
                            [
                                -0.9140968322753906,
                                50.83857617033599
                            ],
                            [
                                -0.91461181640625,
                                50.836191189921195
                            ],
                            [
                                -0.9120368957519531,
                                50.83196297053503
                            ],
                            [
                                -0.9127235412597657,
                                50.82946922569239
                            ],
                            [
                                -0.907745361328125,
                                50.822746293360076
                            ],
                            [
                                -0.9086036682128906,
                                50.82090273956621
                            ],
                            [
                                -0.9063720703124999,
                                50.817215413611876
                            ],
                            [
                                -0.9099769592285156,
                                50.80582624540247
                            ],
                            [
                                -0.9098052978515626,
                                50.80159527562757
                            ],
                            [
                                -0.9068870544433595,
                                50.80300564145612
                            ],
                            [
                                -0.9062004089355469,
                                50.801052815896554
                            ],
                            [
                                -0.9017372131347655,
                                50.79942539891854
                            ],
                            [
                                -0.8936691284179688,
                                50.799099908721615
                            ],
                            [
                                -0.8897209167480468,
                                50.801269800544645
                            ],
                            [
                                -0.8854293823242188,
                                50.80398202363047
                            ],
                            [
                                -0.8821678161621093,
                                50.80484990176777
                            ],
                            [
                                -0.8771896362304688,
                                50.80799582487587
                            ],
                            [
                                -0.8722114562988281,
                                50.80875515388817
                            ],
                            [
                                -0.8685207366943359,
                                50.80539231741706
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
        'Chichester Harbour.'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-0.8668899536132812,
            50.80729072259863
        ])
        .setPopup(popup)
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-0.8668899536132812,
            50.80729072259863
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
