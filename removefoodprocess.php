<?php

include "connection.php";

$fid = $_POST["fid"];
// echo($uid);

if (empty($fid)) {
    echo ("Please Enter a Food Stock Id");
} else {
    $rs = Database::search("SELECT * FROM `food_stock` WHERE `id` = '" . $fid . "'");
    $num = $rs->num_rows;

    if ($num == 1) {
        
            Database::iud("DELETE FROM `food_stock`  WHERE `id` = '" . $fid . "'");
            echo ("Success");
    } else {
        echo ("Invalid Food Stock Id");
    }
}