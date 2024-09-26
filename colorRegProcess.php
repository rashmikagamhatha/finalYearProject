<?php
include "connection.php";

$color = $_POST["c"];
// echo($color);

if (empty($color)) {
    echo("Please insert a color");
} else if (strlen($color) > 15) {
    echo("Animal color should be less than 15 characters");
} else {
    $rs = Database::search("SELECT * FROM `color` WHERE `color_name` = '".$color."'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo("Color is already Exists");
    } else {
        Database::iud("INSERT INTO `color` (`color_name`) VALUES ('".$color."')");
        echo("Success");
    }
}

?>