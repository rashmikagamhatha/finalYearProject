<?php
include "connection.php";

$vdetails = $_POST["vdt"];
$date = $_POST["date"];
$time = $_POST["time"];

if (empty($vdetails)) {
    echo("Please enter Vaccination Details");
}else if (empty($date)) {
    echo("Please enter reminder date");
}else if (empty($time)) {
    echo("Please enter reminder time");
}else {
    Database::iud("INSERT INTO `vaccination_reminder` (`message`,`reminder_date`,`reminder_time`) VALUES ('".$vdetails."','".$date."','".$time."')");
    echo("Success");
}

?>