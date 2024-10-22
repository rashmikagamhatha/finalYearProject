<?php
session_start();
include "connection.php";

$mobile = $_POST["m"];
$name = $_POST["n"];
$email = $_POST["e"];
$company = $_POST["c"];

if (empty($mobile)) {
    echo("Please Enter a Mobile Number");
}else if (strlen($mobile)>10) {
    echo("Mobile number should be less than 10 characters");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo("Your Mobile Number is Invalid");
}else if (empty($name)) {
    echo("Please Enter a Name");
}else if (strlen($name)>25) {
    echo("Your Name should be Less than 25 Characters");
}else if (empty($email)) {
    echo("Please Enter a email or 'NO'");
}else if (empty($company)) {
    echo("Please Enter a Company Name");
} else if (strlen($company) > 30) {
    echo("Company Name should be less than 30 characters");
} else{
    // echo("Success");
    $rs = Database::search("SELECT * FROM `customer` WHERE `mobile` = '".$mobile."'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo("Your Mobile Number Already Exists");
    }else {
        Database::iud("INSERT INTO `customer`(`name`,`mobile`,`email`, `company_name`) VALUES ('".$name."','".$mobile."','".$email."','".$company."')");
        echo("Success");
    }
}

?>