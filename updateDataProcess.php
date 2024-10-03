<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$mobile = $_POST["m"];
$pw = $_POST["p"];
$d_on = $_POST["don"];
$d_of = $_POST["dof"];
$sal = $_POST["s"];

// echo("$fname");


if (empty($fname)) {
    echo ("Please Enter Your First Name.");
} else if (strlen($fname) > 20) {
    echo ("Your First Name Should Be Less than 20 Charactors");
} else if (empty($lname)) {
    echo ("Please Enter Your Last Name.");
} else if (strlen($lname) > 20) {
    echo ("Your Last Name Should Be Less than 20 Charactors");
} else if (empty($email)) {
    echo ("Please Enter Your Email.");
} else if (strlen($email) > 100) {
    echo ("Your Email Should Be Less than 100 Charactors");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Your Email Address is Invaid");
} else if (empty($mobile)) {
    echo ("Please Enter Your Mobile Number");
} else if (strlen($mobile) != 10) {
    echo ("Your Mobile Number must contain 10 charactors");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo ("Your Mobile Number Is Invalid");
} else if (empty($pw)) {
    echo ("Please enter your password");
} else if (strlen($pw) < 5 || strlen($pw) > 45) {
    echo ("Your Password Must contain 5 - 45 characters");
} else if(empty($d_on)){
    echo("Please select duty on time");
}else if(empty($d_of)){
    echo("Please select duty off time");
}else if(empty($sal)){
    echo("Please enter your Salary");
}else if (!is_numeric($sal)) {
    echo ("Only numbers can be entered Salary");
} else if (strlen($sal) > 10) {
    echo ("Your Salary Should be less than 10 Numbers");
} else{
    // Update query

    Database::iud("UPDATE `employee` SET `fname` = '".$fname."', `lname` = '".$lname."', `mobile` = '".$mobile."', `email` = '".$email."', 
    `password` = '".$pw."', `salary` = '".$sal."'  , `duty_on` = '".$d_on."', `duty_off` = '".$d_of."' WHERE `emp_id` = '".$user["emp_id"]."'");

    $rs = Database::search("SELECT * FROM `employee` WHERE `emp_id` = '".$user["emp_id"]."'");
    $d = $rs->fetch_assoc();
    $_SESSION["u"] = $d;

    echo("Update Successfully");
}

?>