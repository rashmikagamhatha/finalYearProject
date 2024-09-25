<?php 
include "connection.php";

$fname = $_POST["fn"];
$lname = $_POST["ln"];
$selectPosition = $_POST["sp"];
$mobile = $_POST["mb"];
$email = $_POST["em"];
$username = $_POST["un"];
$password = $_POST["pw"];


if (empty($fname)) {
    echo("Please enter your first name");
} else if (strlen($fname)>20) {
    echo("Your first name should be less than 20 characters");
} else if (empty($lname)) {
    echo("Please enter your last name");
} else if (strlen($lname)>20) {
    echo("Your last name should be less than 20 characters");
} else if (empty($selectPosition)) {
    echo("Please select a job position");
} else if (empty($mobile)) {
    echo("Please enter your mobile number");
} else if (strlen($mobile)!=10) {
    echo("Your mobile number must contain 10 characters ");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo("Your mobile number is invalid");
} else if (empty($email)) {
    echo("Please enter your email");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Your Email Address is Invaid.");
} else if (empty($username)) {
    echo("Please enter a username");
} else if (strlen($username)>20) {
    echo("Username should be less than 20 chracters");
} else if (empty($password)) {
    echo("Please enter your password");
} else if (strlen($password) < 5 || strlen($password) > 45) {
    echo ("Your Password Must contain 5 - 45 characters");
} else {
    $rs = Database::search("SELECT * FROM `employee` WHERE `mobile` = '".$mobile."' OR `username` = '".$username."' OR `email` = '" . $email . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo("Your Mobile or Password already exists");
    } else {
        // Insert

        Database::iud("INSERT INTO `employee` (`fname`,`lname`,`position_id`,`mobile`,`email`,`username`,`password`,`user_type_id`) 
        VALUES ('".$fname."', '".$lname."','".$selectPosition."','".$mobile."','".$email."','".$username."', '".$password."','2')");

        echo("Success");
    }
}

?>