<?php
// All code based off the free tutorial from Panique which can be found at:
// https://github.com/panique/php-login-minimal

// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("libraries/password_compatibility_library.php");
}

// include the configs / constants for the database connection
require_once("config/db.php");

// load the registration class
require_once("classes/Registration.php");

// Create a new registration object
$registration = new Registration();

// Show the signup page
include("signup.php");