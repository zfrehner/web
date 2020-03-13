<?php

/*Define functions for validating contact form*/
//validating the name for first and last
/*function validContact() {
    return validName($_POST['ffname']) && validName($_POST['flname']) && validEmail($_POST['']) && validPhone($_POST['']);
}*/

function validName($name) {
    return !empty($name);
}

function validEmail($email) {
    if(empty($email)) {
        return true;
    }
    else {
        return (!preg_match(
            "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email))
            ? FALSE : TRUE;
    }
}

function validMeet($meet) {
    if($meet == "none") {
        return false;
    }
    else {
        return $meet != "school" || $meet != "work"
            || $meet != "party" || $meet != "meetup" || $meet != "jobFair" || $meet != "other";
    }
}

function validTextBox($hear) {

    if(empty($hear)) {
        return true;
    }
    else {
        echo mysqli_real_escape_string(null,$hear);
        return true;
    }
}

