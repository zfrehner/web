
<?php
$username = "zfrehner_grcuser";
$database = "zfrehner_grc";
$password = "Zfrehner89!!";
$hostname = "localhost";

$cnxn = @mysqli_connect($hostname, $username, $password, $database) //takes 4 parameters
or die("Error connecting to database: ". mysqli_connect_error());

//echo "connected!";
