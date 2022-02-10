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
    <h1 class="infoTitle">Chiltern Hills</h1>
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
        <h1>Chiltern Hills</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"The familiar beech and bluebell woods of the Chilterns sits on London’s doorstep, extending 70 km from the Thames at Goring-on-Thames northeast to Hitchin."</p>
            <p style="font-weight: bold; font-size: 20px">"The Chilterns’ rounded hills are part of the chalk ridge which crosses England from Dorset to Yorkshire. The characteristic scarp slope, indented by combes and cut by a number of gaps, looks out north over the panorama of the Vale of Aylesbury. The dip slope, dissected by steep dry valleys, curves gently down into the London Basin. The heavily wooded character of the Chilterns, based on clay-with-flint deposits, gives way in the north to the open downland of Ivinghoe Beacon and Dunstable Downs."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/chilterns</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p>"ZSL Whipsnade Zoo - Whipsnade near Dunstable
            </p>
            <p>Odds Farm Park - Wooburn Common
            </p>
            <p>Home of Rest for Horses - near Princes Risborough</p>
            <p>Beale Park - Lower Basildon, Berks</p>
            <p>Bucks Goat Centre - Stoke Mandeville</p>
            <p>Visit a country show or craft fair"</p>
            <p></p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://www.chilternsaonb.org/explore-enjoy/places-to-visit/things-to-do.html
            </p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"In addition to the 80,000 people living within the area, half a million people live within two km (two million within 10 km) of the Chilterns, one of South-East England’s major recreation resources. Leisure use is largely informal scenic drives, walking and riding and peak demand puts heavy pressure on viewpoints such as Ivinghoe Beacon. The Ridgeway, a National Trail, runs through the AONB from Ivinghoe Beacon to the River Thames and on into the North Wessex Downs AONB. The Thames Path National Trail also passes through the southern part of the AONB."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/chilterns</p>
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
    const comments_page_id = 5; 
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
        center: [-0.9060287475585939,
            51.69155367255663
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
                                -0.904397964477539,
                                51.6867648801494
                            ],
                            [
                                -0.9010505676269531,
                                51.68969142459661
                            ],
                            [
                                -0.8946990966796875,
                                51.69102160952878
                            ],
                            [
                                -0.8877468109130859,
                                51.691340848096
                            ],
                            [
                                -0.8759880065917969,
                                51.69171329024538
                            ],
                            [
                                -0.8740997314453125,
                                51.69575675061035
                            ],
                            [
                                -0.8770179748535156,
                                51.69820393271052
                            ],
                            [
                                -0.8756446838378906,
                                51.708097711016535
                            ],
                            [
                                -0.8861160278320312,
                                51.70448088167138
                            ],
                            [
                                -0.8936691284179688,
                                51.70235319992082
                            ],
                            [
                                -0.8976173400878905,
                                51.69788474255002
                            ],
                            [
                                -0.9003639221191406,
                                51.696607959393894
                            ],
                            [
                                -0.9056854248046875,
                                51.698097536240525
                            ],
                            [
                                -0.9190750122070312,
                                51.68926575716258
                            ],
                            [
                                -0.9127235412597657,
                                51.6854345701286
                            ],
                            [
                                -0.9123802185058594,
                                51.68234810033196
                            ],
                            [
                                -0.9235382080078124,
                                51.67904853787301
                            ],
                            [
                                -0.9211349487304689,
                                51.67511003567449
                            ],
                            [
                                -0.9204483032226562,
                                51.673726156288865
                            ],
                            [
                                -0.9223365783691405,
                                51.672342234618185
                            ],
                            [
                                -0.9219932556152344,
                                51.6707453493771
                            ],
                            [
                                -0.9161567687988281,
                                51.673406793502615
                            ],
                            [
                                -0.9125518798828125,
                                51.67276806117448
                            ],
                            [
                                -0.9001922607421875,
                                51.66850961545868
                            ],
                            [
                                -0.9001922607421875,
                                51.67042596557314
                            ],
                            [
                                -0.8938407897949219,
                                51.669787191209444
                            ],
                            [
                                -0.8821678161621093,
                                51.670851810144654
                            ],
                            [
                                -0.88165283203125,
                                51.672980972951336
                            ],
                            [
                                -0.9012222290039062,
                                51.67894209637122
                            ],
                            [
                                -0.9010505676269531,
                                51.673726156288865
                            ],
                            [
                                -0.9094619750976562,
                                51.67660032003192
                            ],
                            [
                                -0.9110069274902343,
                                51.67819699885323
                            ],
                            [
                                -0.9067153930664061,
                                51.682028798344
                            ],
                            [
                                -0.9074020385742188,
                                51.68330599278565
                            ],
                            [
                                -0.904397964477539,
                                51.6867648801494
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
        'Chiltern Hills.'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([-0.9060287475585939,
            51.69155367255663
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([-0.9060287475585939,
            51.69155367255663
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
