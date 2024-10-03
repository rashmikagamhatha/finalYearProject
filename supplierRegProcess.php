<?php
include "connection.php";

$mobile = $_POST["m"];
$name = $_POST["n"];
$email = $_POST["e"];
$company = $_POST["com"];

if (empty($mobile)) {
    echo("Please Enter a Mobile Number");
}else if (strlen($mobile)>10) {
    echo("Mobile numbe should be less than 10 characters");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo("Your Mobile Number is Invalid");
}else if (empty($name)) {
    echo("Please Enter a Name");
}else if (strlen($name)>25) {
    echo("Your Name should be Less than 25 Characters");
}else if (empty($email)) {
    echo("Please Enter a email");
}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo("Your Email Address is Invalid");
}else if (empty($company)) {
    echo("Please Select a Company");
} else{
    // echo("Success");
    $rs = Database::search("SELECT * FROM `supplier` WHERE `mobile` = '".$mobile."'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo("Your Mobile Number Already Exists");
    }else {
        Database::iud("INSERT INTO `supplier`(`mobile`,`name`,`email`,`company_id`) VALUES ('".$mobile."','".$name."','".$email."','".$company."')");
        echo("Success");
    }
}

?>