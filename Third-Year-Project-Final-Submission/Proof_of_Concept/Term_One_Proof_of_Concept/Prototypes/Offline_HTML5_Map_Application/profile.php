<html>

    <head>

        <title><?php echo $_GET["uname"]; ?>'s Profile</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- Using a Hosted Version of Leaflet: Links below enables subresource integrity -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
            integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
            crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="/styles/styles.css" />
        <script src="https://kit.fontawesome.com/5c7bfbcc6d.js" crossorigin="anonymous"></script>
    
    </head>

    <body>
        
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <ul class="navbar-nav mr-auto">
                <a class="navbar-brand" href="#">Logo</a>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_GET["uname"]; ?></a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item"><i class="fas fa-user"> My Profile</i></a>
                        <a href="#" class="dropdown-item"><i class="fas fa-heart"> Saved Destinations</i></a>
                        <a href="#" class="dropdown-item"><i class="fas fa-history"> Previous Destinations</i></a>
                    </div>
                </li>
            </ul>
        </nav>

    </body>

</html>