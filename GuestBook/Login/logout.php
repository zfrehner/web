<?php

session_start();
session_destroy(); //this line and the next one do the same thing
$_SESSION = array();
header('loaction: login.php');
