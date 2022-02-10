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
    <h1 class="infoTitle">Kent Downs</h1>
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
        <h1>Kent Downs</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Description</h2>
            <p style="font-weight: bold; font-size: 20px">"The AONB forms the eastern end of a great arc of designated landscape stretching from the East Hampshire and Surrey Hills AONBs. The Kent Downs AONB continues from the Surrey border in a widening ribbon of rolling countryside to meet the sea at the cliffs of Dover. Inland, the Downs rise to over 240m, cresting in a prominent escarpment above the Weald to the south. It is traversed by the three prominent river valleys of the Darent, Medway and Stour."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/kent-downs</p>
        </div>
        <div class="col">
            <h2>Things to do</h2>
            <p> "Other distinctive landscape elements include the fast disappearing traditional Kentish orchards and hop gardens and the rich wooded foreground of the upland ridges, together with many fine historic parklands including Knole and Winston Churchill’s Chartwell. The AONB’s ancient settlements include picturesque half-timbered Charing and Chilham on the old Pilgrims Way to Canterbury. Since prehistory, this has been the invasion gateway to England and the North Downs are noted for their archaeological remains and military legacy."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/kent-downs</p>
        </div>
        <div class="col">
            <h2>Facts</h2>
            <p>"A prosperous farming area, its highgrade land is in intense agricultural and horticultural use. The AONB, bordered by large and expanding urban areas including Ashford, Maidstone and the Medway towns, as well as the ports of Dover and Folkestone, has a large commuter population and the North Downs are a heavily used local recreational resource. The area also receives visitor traffic from London and the Kent resorts, and the AONB forms an integral part of tourist promotion of the ‘Garden of England’. The North Downs Way National Trail runs along the length of the escarpment and loops up to Canterbury."</p>
            <p style="color: grey; font-size: 12px;">Information courtesy of: https://landscapesforlife.org.uk/about-aonbs/aonbs/kent-downs</p>
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
    const comments_page_id = 17;
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
        center: [0.979156494140625,
            51.156523611533814
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
                                0.8806228637695312,
                                51.156738941345054
                            ],
                            [
                                0.9575271606445311,
                                51.11731684874898
                            ],
                            [
                                1.0526275634765625,
                                51.097485376003554
                            ],
                            [
                                1.1075592041015625,
                                51.09619172351068
                            ],
                            [
                                1.119232177734375,
                                51.13326207641957
                            ],
                            [
                                1.1254119873046873,
                                51.178266847739685
                            ],
                            [
                                1.0529708862304688,
                                51.19483648846097
                            ],
                            [
                                1.01898193359375,
                                51.203441743080994
                            ],
                            [
                                0.9770965576171875,
                                51.196987952810666
                            ],
                            [
                                0.9317779541015625,
                                51.199354447559195
                            ],
                            [
                                0.9111785888671875,
                                51.185153655598135
                            ],
                            [
                                0.9001922607421875,
                                51.16578188596652
                            ],
                            [
                                0.8874893188476562,
                                51.157815575327035
                            ],
                            [
                                0.8806228637695312,
                                51.156738941345054
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
        'Kent Downs'
    );

    var el = document.createElement('div');
    el.id = 'marker';

    // create the marker
    new mapboxgl.Marker(el)
        .setLngLat([0.979156494140625,
            51.156523611533814
        ])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);

    var marker = new mapboxgl.Marker()
        .setLngLat([0.979156494140625,
            51.156523611533814
        ])
        .addTo(map)
        .setPopup(popup);

</script>

<?php
    include_once 'footer.php';
?>
