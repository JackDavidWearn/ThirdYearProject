<?php

// Performs a check of the verison of PHP being used
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    // Error message is will not work on older versions
    exit("Sorry, Login System does not run on a PHP version older than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("libraries/password_compatibility_library.php");
}

// include the configs / constants for the database connection
require_once("config/db.php");

// load the login class
require_once("classes/Login.php");

// Creating a new login object
$login = new Login();

// If the user is able to be logged in, it will disply the home page, otherwise it will show the login page again
if ($login->isUserLoggedIn() == true) {
    include("index.php");
} else {
    include("login.php");
}