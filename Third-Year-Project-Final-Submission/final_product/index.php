<!-- 
     Opening PHP tag to display the "top" aspects of the HTML file. 
     This includes the <header> tags which will link to the different styling files and scripting files
     and also the parts of the website which will not change, so in this case is the navigation bar. 
-->
<?php

    if (isset($_SESSION['user_login_status']) == 1) {
        include_once 'headerloggedin.php';
    } else {
        include_once 'header.php';
    }

?>

<!-- Where the map will be displayed -->
<div class="container-fluid">
    <div class="row">
        <div id="AONBMap" style="width: 100%; height: 725px"></div>
    </div>
</div>

<!-- This is used for displaying the nav-tabs to allow for the choosing of the different AONB info pages -->
<div class="container-fluid" id="findAONB">
    <div class="row">
        <div class="col">
            <h1 class="findTitle">Areas of Outstanding Natural Beauty Locations</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active rightnavtabs" id="england-tab" role="tab" data-toggle="tab" aria-controls="england" aria-selected="true" href="#england">England
                            AONB</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rightnavtabs" id="wales-tab" data-toggle="tab" href="#wales" role="tab" aria-controls="wales" aria-selected="false">Wales AONB</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rightnavtabs" id="northernireland-tab" data-toggle="tab" href="#northernireland" role="tab" aria-controls="northernireland" aria-selected="false">NI AONB</a>
                    </li>
                </ul>
                <!-- The contents of the England AONB tab -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="england" role="tabpanel" aria-labelledby="england-tab">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <ul class="aonblocationslist">
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/ArnsideandSilverdale.php">>
                                                Arnside
                                                and
                                                Silverdale</a></li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/BlackdownHills.php">>
                                                Blackdown Hills</a>
                                        </li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/CannockChase.php">>
                                                Cannock Chase</a></li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/ChichesterHarbour.php">>
                                                Chichester Harbour</a>
                                        </li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/ChilternHills.php">>
                                                Chiltern Hills</a></li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/Cornwall.php">>
                                                Cornwall</a></li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/Cotswolds.php">>
                                                Cotswolds</a></li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/CranborneChaseandtheWestWiltshireDowns.php">>
                                                Cranborne Chase and the
                                                West Wiltshire
                                                Downs</a></li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/DedhamVale.php">>
                                                Dedham Vale</a></li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/Dorset.php">>
                                                Dorset</a></li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/EastDevon.php">>
                                                East
                                                Devon</a></li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/ForestofBowland.php">>
                                                Forest of Bowland</a>
                                        </li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/HighWeald.php">> High
                                                Weald</a></li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/HowardianHills.php">> Howardian Hills</a>
                                        </li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/IsleofWight.php">>
                                                Isle
                                                of Wight</a></li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/IslesofScilly.php">>
                                                Isles of Scilly</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul class="aonblocationslist">
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/KentDowns.php">>
                                                Kent
                                                Downs</a></li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/LincolnshireWolds.php">>
                                                Lincolnshire Wolds</a>
                                        </li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/MalvernHills.php">>
                                                Malvern Hills</a></li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/MendipHills.php">>
                                                Mendip Hills</a></li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/Nidderdale.php">>
                                                Nidderdale</a></li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/NorfolkCoast.php">>
                                                Norfolk Coast</a></li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/NorthDevonCoast.php">>
                                                North Devon Coast</a>
                                        </li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/NorthPennines.php">>
                                                North Pennines</a></li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/NorthumberlandCoast.php">>
                                                Northumberland
                                                Coast</a></li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/NorthWessexDowns.php">>
                                                North Wessex Downs</a>
                                        </li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/QuantockHills.php">>
                                                Quantock Hills</a></li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/ShropshireHills.php">>
                                                Shropshire Hills</a>
                                        </li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/SolwayCoast.php">>
                                                Solway Coast</a></li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/SouthDevon.php">>
                                                South Devon</a></li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/SuffolkCoastandHeaths.php">>
                                                Suffolk Coast and
                                                Heaths</a></li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/SurreyHills.php">>
                                                Surrey Hills</a></li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/TamarValley.php">>
                                                Tamar Valley</a></li>
                                        <li class="locationlist"><a class="rightLinks" href="./informationwebpages/WyeValley.php">>
                                                Wye
                                                Valley</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- The contents of the Wales AONB navtab -->
                    <div class="tab-pane fade" id="wales" role="tabpanel" aria-labelledby="wales-tab">
                        <ul class="aonblocationslist">
                            <li class="locationlist"><a class="rightLinks" href="./informationwebpages/Anglesey.php">> Anglesey</a>
                            </li>
                            <li class="locationlist"><a class="rightLinks" href="./informationwebpages/ClwydianRangeandDeeValley.php">> Clwydian Range
                                    &
                                    Dee Valley</a>
                            </li>
                            <li class="locationlist"><a class="rightLinks" href="./informationwebpages/Gower.php">> Gower</a></li>
                            <li class="locationlist"><a class="rightLinks" href="./informationwebpages/Llyn.php">> Llŷn</a></li>
                            <li class="locationlist"><a class="rightLinks" href="./informationwebpages/WyeValley.php">> Wye Valley
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- The contents of the Northern Ireland AONB navtabs -->
                    <div class="tab-pane fade" id="northernireland" role="tabpanel" aria-labelledby="northernireland-tab">
                        <ul class="aonblocationslist">
                            <li class="locationlist"><a class="rightLinks" href="./informationwebpages/AntrimCoastandGlens.php">> Antrim Coast
                                    and
                                    Glens</a></li>
                            <li class="locationlist"><a class="rightLinks" href="./informationwebpages/Binevenagh.php">> Binevenagh</a>
                            </li>
                            <li class="locationlist"><a class="rightLinks" href="./informationwebpages/CausewayCoast.php">> Causeway
                                    Coast</a></li>
                            <li class="locationlist"><a class="rightLinks" href="./informationwebpages/LaganValley.php">> Lagan
                                    Valley</a>
                            </li>
                            <li class="locationlist"><a class="rightLinks" href="./informationwebpages/MourneMountains.php">> Mourne
                                    Mountains</a></li>
                            <li class="locationlist"><a class="rightLinks" href="./informationwebpages/RingOfGullion.php">> Ring of
                                    Gullion</a></li>
                            <li class="locationlist"><a class="rightLinks" href="./informationwebpages/Sperrins.php">> Sperrins</a>
                            </li>
                            <li class="locationlist"><a class="rightLinks" href="./informationwebpages/StrangfordandLecale.php">> Strangford and
                                    Lecale</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Link to the Javascript file for the mapping aspects -->
<script src="./scripts/mapScript.js"></script>

<!-- 
     Final PHP tags to display the footer ("end") elements, which in this case is the closing of the HTML tags and the footer
     Which will be displayed on every page. 
-->
<?php
    include_once 'footer.php';
?>
