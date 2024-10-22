<?php
session_start();
include "connection.php";

$aid = $_POST["aid"];
// echo($uid);

if (empty($aid)) {
    echo ("Please Enter a Animal Id");
} else {
    $rs = Database::search("SELECT * FROM `animal_health` WHERE `animal_an_id` = '" . $aid . "'");
    $num = $rs->num_rows;
    $an = $rs->fetch_assoc();

    if ($num == 1) {

        $_SESSION["anh"] = $an;
        echo("Success");

            
    } else {
        echo("Animal Id invalid or deleted");
    }
}