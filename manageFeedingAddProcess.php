<?php
include "connection.php";

$antype = $_POST["at"];
$foodtype = $_POST["fot"];
$foodname = $_POST["fon"];
$t1 = $_POST["t1"];
$t2 = $_POST["t2"];

if (empty($antype)) {
    echo("Please Select A Animal Type");
}else if (empty($foodtype)) {
    echo("Please Select A Food Type");
}else if (empty($foodname)) {
    echo("Please Enter A food Name");
}else if (empty($t1)) {
    echo("Please Enter 1st Feeding Time");
}else if (empty($t2)) {
    echo("Please Enter 2nd Feeding Time");
}else {
    Database::iud("INSERT INTO `feeding_manage` (`animal_type_id`,`food_type_id`,`food_names`,`time1`,`time2`)
     VALUES ('".$antype."', '".$foodtype."','".$foodname."','".$t1."','".$t2."')");
     echo("Success");
}


?>