<?php
session_start();
include "connection.php";

$aid = $_POST["aid"];
// echo($uid);

if (empty($aid)) {
    echo ("Please Enter an Animal Id");
} else {
    $rs = Database::search("SELECT * FROM `animal` WHERE `an_id` = '" . $aid . "'");
    $num = $rs->num_rows;
    $an = $rs->fetch_assoc();

    if ($num == 1) {

        $_SESSION["an"] = $an;
        echo("Success");

            
    } else {
        echo ("Invalid Animal Id");
    }
}