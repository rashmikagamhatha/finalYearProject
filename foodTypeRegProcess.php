<?php
include "connection.php";

$foodtype = $_POST["f"];
// echo($breed);

if (empty($foodtype)) {
    echo("Please Enter Food Type");
} else if (strlen($foodtype) > 50) {
    echo("Food Type Should be less than 20 characters");
} else {
    $rs = Database::search("SELECT * FROM `food_type` WHERE `type` = '".$foodtype."'");
    $num = $rs->num_rows;
    // echo($num);
    if ($num > 0) {
        echo("This Food Type is Already Exists");
    } else {
        Database::iud("INSERT INTO `food_type` (`type`) VALUES ('".$foodtype."')");
        echo("Success");
    }
}

?>