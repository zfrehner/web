
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <?php

//turn on error reporting
/*ini_set('display_errors', 1);
error_reporting(E_ALL);*/

    require("database.php");

require('validateFunctions.php'); //requires the validation file to be used

$isValid = true; // setting up a new variable and initializing it to true

//gets the first name info from the variable and checks if there is a value
//if yes, set the first name to $fname
//if no, print the required sentence and set $isValid to false
if(validName(trim($_POST['firstName']))) {
    $fname = trim($_POST['firstName']);
}
else {
    echo "<p>First name is required.</p>";
    $isValid = false;
    }

    if(validName(trim($_POST['lastName']))) {
    $lname = trim($_POST['lastName']);
    }
    else {
    echo "<p>Last name is required.</p>";
    $isValid = false;
    }

    if(!validEmail(($_POST['email']))) {
    echo "<p>Invalid email address.</p>";
    $isValid = false;
    }
    else {
    $email = trim($_POST['email']);
    }


    if(validMeet($_POST['meet']) == false) {
        echo "<p>Please select how we met.</p>";
        $isValid = false;
    }
    else {
        $meet = $_POST['meet'];
        $isValid = true;
    }

    $mailingList = $_POST['list'];
    if(isset($mailingList) == "yes" and empty($email) == true) {
    echo "<p>Please enter your email since you want to be on the mailing list</p>";
    $isValid = false;
    }
    else {
    $mailingList = "no";
    }


    $url = trim($_POST['linked-in']);
    if(empty($url) == true || (filter_var($url, FILTER_VALIDATE_URL) == true)) {
        $isValid = true;
    }
    else {
        echo("$url is not a valid URL");
        $isValid = false;
    }


    if($isValid == true) {

    echo "<h1>Thank you for signing up!</h1>
          <h2>You will receive and email confirmation soon.</h2>";

    }
    else {
        echo "<h1>Please Enter Valid Information</h1>";
    }


    //Adding to the Database------------------------------------------------------------------------------------------------
    if(!$isValid) {
        die("Please click back and try again");
    }

    $first = mysqli_real_escape_string($cnxn, $_POST['firstName']);
    $last = mysqli_real_escape_string($cnxn, $_POST['lastName']);
    $job = mysqli_real_escape_string($cnxn, $_POST['jobTitle']);
    $company = mysqli_real_escape_string($cnxn, $_POST['companyName']);
    $linkedIn = mysqli_real_escape_string($cnxn, $_POST['linked-in']);
    $email = mysqli_real_escape_string($cnxn, $_POST['email']);
    $meet = mysqli_real_escape_string($cnxn, $_POST['meet']);
    $mailingList = mysqli_real_escape_string($cnxn, $_POST['list']);
    $dateTime = mysqli_real_escape_string($cnxn, date("Y-m-d h:i:sa"));



    //Write an SQL statement
    $sql = "INSERT INTO `guestbook` 
        (`id`, `first_name`, `last_name`, `job_title`, `comp_name`, `linked_in`, `email_address`, `meet`, `mailing_list`, `date_time`) 
        VALUES(NULL, '$first', '$last', '$job', '$company', '$linkedIn', '$email', '$meet', '$mailingList', '$dateTime');";

    //Send the query to the database
    $result = mysqli_query($cnxn, $sql);
    //Print a confirmation
    /*if ($result) {
        echo "TESTING: DATA SUCCESSFULLY ADDED!";
    }*/

    /*var_dump($_POST);*/


    ?>

</body>
</html>
