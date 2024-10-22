<?php
include "connection.php";

session_start();
$an = $_SESSION["anh"];

$mdetails = $_POST["md"];
$vdetails = $_POST["vd"];
$wmonitor = $_POST["wd"];
$tdetails = $_POST["td"];

if (empty($mdetails)) {
    echo ("Please enter Medical Records . if no any Medical Records Enter 'No'");
} else if (empty($vdetails)) {
    echo ("Please enter Vaccination Details. if no any Vaccination details Enter 'No'");
} else if (empty($wmonitor)) {
    echo ("Pleas Enter Weight Monitoring Notes. if no any Weight Monitoring Notes Enter 'No'");
} else if (empty($tdetails)) {
    echo ("Pleas Enter Treatment Notes. if no any Treatment Notes Enter 'No'");
} else {
    // Update query

    Database::iud("UPDATE `animal_health` SET `medical_records` = '" . $mdetails . "', `vaccination_details` = '" . $vdetails . "', `weight_monitor` = '" . $wmonitor . "', `treatment_details` = '" . $tdetails . "'  
                    WHERE `animal_an_id` = '" . $an["animal_an_id"] . "'");



    echo ("Update Successfully");
}
