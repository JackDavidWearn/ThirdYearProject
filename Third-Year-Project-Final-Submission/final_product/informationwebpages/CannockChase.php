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
    <h1 class="infoTitle">Cannock Chase</h1>
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
        <h1>Cannock Chase</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"Cannock Chase AONB was designated in 1958 under the National Parks and Access to Countryside Act 1949. It is the smallest AONB at 26 square miles and is designated as an AONB because of its beautiful landscape, its history and its wildlife."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/cannock-chase</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"Cannock Chase War Cemetery - Although military cemeteries are common on the continent, Cannock Chase War Cemetery is one of the few dedicated military cemeteries in the United Kingdom."
            </p>
            <p>"Built and cared for by the Commonwealth War Graves Commission (CWGC), the cemetery was established during the First World War, when a large military camp at Cannock Chase became the base for the New Zealand Rifle Brigade. There was also a prisoner-of-war hospital with 1,000 beds, and both camp and hospital used the burial ground."
            </p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://www.cannockchasedc.gov.uk/visitors/what-do/group-travel
            </p>
        </div>
        <div class="col">
            <h2>Visitor Attraction</h2>
            <p>"Go Ape
                Chase Trekking Centre - Cannock Chase Trekking Centre is a relaxed and friendly environment, where Lisa and her team can provide a memorable trek through the spectacular countryside of Cannock Chase. No previous horse riding experience is needed. The centre has an extensive selection of horses and ponies for riders of all age ranges and abilities."
            </p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://www.cannockchasedc.gov.uk/visitors/what-do/group-travel</p>
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
    const comments_page_id = 3;
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
        center: [-2.0019149780273438,
            52.74834683007907
        ],
        zoom: 11,
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
                                -1.9644927978515623,
                                52.71092333526229
                            ],
                            [
                                -1.9565963745117188,
                                52.71383520359016
                            ],
                            [
                                -1.9370269775390623,
                                52.70988333518838
                            ],
                            [
                                -1.932220458984375,
                                52.712379293719536
                            ],
                            [
                                -1.9215774536132812,
                                52.70738723386853
                            ],
                            [
                                -1.9150543212890623,
                                52.710507338207485
                            ],
                            [
                                -1.9205474853515625,
                                52.721737866558406
                            ],
                            [
                                -1.9116210937499998,
                                52.72236170002617
                            ],
                            [
                                -1.9346237182617188,
                                52.74751554581336
                            ],
                            [
                                -1.950416564941406,
                                52.74751554581336
                            ],
                            [
                                -1.9589996337890625,
                                52.75416537587994
                            ],
                            [
                                -1.950416564941406,
                                52.76164522152328
                            ],
                            [
                                -1.9603729248046873,
                                52.76870834078517
                            ],
                            [
                                -1.9675827026367188,
                                52.769746938167515
                            ],
                            [
                                -1.9675827026367188,
                                52.777847147478944
                            ],
                            [
                                -1.9785690307617188,
                                52.78158519726513
                            ],
                            [
                                -2.0074081420898438,
                                52.78802219709245
                            ],
                            [
                                -2.0170211791992188,
                                52.78968320376505
                            ],
                            [
                                -2.0286941528320312,
                                52.7923822043612
                            ],
                            [
                                -2.0417404174804688,
                                52.79113653258534
                            ],
                            [
                                -2.0427703857421875,
                                52.78469999350529
                            ],
                            [
                                -2.042083740234375,
                                52.778677852955006
                            ],
                            [
                                -2.0472335815429688,
                                52.772447175413554
                            ],
                            [
                                -2.0486068725585933,
                                52.7666310716934
                            ],
                            [
                                -2.0499801635742188,
                                52.75561989091085
                            ],
                            [
                                -2.0496368408203125,
                                52.74335888658737
                            ],
                            [
                                -2.044830322265625,
                                52.72963909783717
                            ],
                            [
                                -2.0341873168945312,
                                52.722153756528385
                            ],
                            [
                                -2.0232009887695312,
                                52.72548073351766
                            ],
                            [
                                -2.014617919921875,
                                52.72631243810711
                            ],
                            [
                                -2.0043182373046875,
                                52.72152992008622
                            ],
                            [
                                -1.9947052001953123,
                                52.718826525722605
                            ],
                            [
                                -1.9871520996093748,
                                52.712379293719536
                            ],
                            [
                                -1.9789123535156248,
                                52.704890989756585
                            ],
                            [
                                -1.9703292846679685,
                                52.70676318622746
                            ],
                            [
                                -1.9644927978515623,
                                52.71092333526229
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
        'Cannock Chase.'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-2.0019149780273438,
            52.74834683007907
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-2.0019149780273438,
            52.74834683007907
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
