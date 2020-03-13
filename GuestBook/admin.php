<?php
/**
 *  File name & path 305/students.php
 *  Author Zach Frehner
 *  Date 02/11/2020
 *
 */

//Turn on error reporting -- this is critical!
/*ini_set('display_errors', 1);
error_reporting(E_ALL);*/ 

//connect to the Database
require("database.php");
require("Login/checkLogin.php");
?>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="guestBook.css">
    <title>GuestBook</title>

    <link rel="icon" type="image/png" href="images/gb.jpg">

</head>
<body>

    <a href="https://zfrehner.greenriverdev.com/305/GuestBook/index.html" ><button class="btn btn-warning" type="submit" >Home</button></a>

    <div class="container">

        <h1>Member Summary</h1>

        <table id="guestbook-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Job Title</th>
                <th>Company</th>
                <th>Linked-in Profile</th>
                <th>Email</th>
                <th>How we met</th>
                <th>Mailing List</th>
                <th>Date/Time</th>
            </tr>
            </thead>
            <?php

        //define a query
        $sql = "SELECT * FROM guestbook";

        //send query to database
        $result = mysqli_query($cnxn, $sql);
        //var_dump($result);

        //process the result
        foreach($result as $row) {
            //var_dump($row);
            $sid = $row['id'];
            $first = $row['first_name'];
            $last = $row['last_name'];
            $job = $row['job_title'];
            $company = $row['comp_name'];
            $linkedIn = $row['linked_in'];
            $email = $row['email_address'];
            $meet = $row['meet'];
            $mailingList = $row['mailing_list'];
            $dateTime = $row['date_time'];

            echo "<tr>
            <td>$sid</td>
            <td>$first $last</td>
            <td>$job</td>
            <td>$company</td>
            <td>$linkedIn</td>
            <td>$email</td>
            <td>$meet</td>
            <td>$mailingList</td>
            <td>$dateTime</td>
            </tr>";
            }
            ?>
        </table>

    </div>

    <script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $('#guestbook-table').DataTable();
    </script>
</body>
</html>

<!--
//CREATING THE GUESTBOOK TABLE

CREATE TABLE `guestbook` (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
first_name VARCHAR(50),
last_name VARCHAR(50),
job_title VARCHAR(50),
comp_name VARCHAR(50),
linked_in VARCHAR(50),
email_address VARCHAR(50),
meet VARCHAR(50),
mailing_list VARCHAR(5),
date_time VARCHAR(20));-->
