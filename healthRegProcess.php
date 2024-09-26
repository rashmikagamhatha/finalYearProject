<?php
include "connection.php";

$health = $_POST["h"];
// echo($breed);

if (empty($health)) {
    echo("Please Enter Animal health");
} else if (strlen($health) > 15) {
    echo("Animal health name Should be less than 15 characters");
} else {
    $rs = Database::search("SELECT * FROM `health_status` WHERE `health_name` = '".$health."'");
    $num = $rs->num_rows;
    // echo($num);
    if ($num > 0) {
        echo("This health is Already Exists");
    } else {
        Database::iud("INSERT INTO `health_status` (`health_name`) VALUES ('".$health."')");
        echo("Success");
    }
}

?>