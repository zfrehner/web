<?php
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

//see if user is logged in
session_start();

if (!isset($_SESSION['un'])) {

    //store current location and store it into "page"
    $_SESSION['page'] = $_SERVER['SCRIPT_URI']; //script_uri is the url

    //Redirect to login page
    header("location: login.php");
}