<?php

include "connection.php";

$byid = $_POST["byid"];
// echo($uid);

if (empty($byid)) {
    echo ("Please Enter a By_product Id");
} else {
    $rs = Database::search("SELECT * FROM `by_products` WHERE `by_id` = '" . $byid . "'");
    $num = $rs->num_rows;

    if ($num == 1) {
        
            Database::iud("DELETE FROM `by_products`  WHERE `by_id` = '" . $byid . "'");
            echo ("Success");
    } else {
        echo ("Invalid User Id");
    }
}