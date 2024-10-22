<?php 
include "connection.php";

$type = $_POST["t"];

// echo($type);

if (empty($type)) {
    echo("Please Enter Animal Type");
} else if (strlen($type) > 40) {
    echo("Animal type name Should be less than 20 characters");
} else {
    $rs = Database::search("SELECT * FROM `animal_type` WHERE `type_name` = '".$type."'");
    $num = $rs->num_rows;
    // echo($num);
    if ($num > 0) {
        echo("Animal Type name is Already Exists");
    } else {
        Database::iud("INSERT INTO `animal_type` (`type_name`) VALUES ('".$type."')");
        echo("Success");
    }
}


?>