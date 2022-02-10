<!-- All of the "top of document" elements needed for a full HTML webpage -->
<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Title of the website which appears in the tab -->
    <title>AONB Locator</title>
    <!-- Link to stylesheets and scripting files -->
    <link rel="stylesheet" href="./styles/styles.css" /> 
    <link rel="stylesheet" href="./styles/loginStyles.css" />
    <!-- Links to Bootstrap 4 library -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Link to a Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Oswald&display=swap" rel="stylesheet">
    <!-- Link to FontAwesome kit code -->
    <script src="https://kit.fontawesome.com/5c7bfbcc6d.js" crossorigin="anonymous"></script>
    <!-- Links to Leaflet JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
</head>

<body>
<div>
        <!-- Responsive navbar at the top of the web page -->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="./index.php"><i class="fab fa-pagelines">AONB Locator</i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-row-reverse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php#findAONB"><i class="fa fa-search"> Find</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./signup.php"><i class="fas fa-user-plus"> Sign Up</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./login.php"><i class="fas fa-user"> Login</i></a>
                    </li>
                </ul>
            </div>
        </nav>