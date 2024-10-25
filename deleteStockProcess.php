<?php

include "connection.php";

$sid = $_POST["sid"];
// echo($uid);

if (empty($sid)) {
    echo ("Please Enter the Stock Id");
} else {
    $rs = Database::search("SELECT * FROM `product_stock` WHERE `st_id` = '" . $sid . "'");
    $num = $rs->num_rows;

    if ($num == 1) {
        
            Database::iud("DELETE FROM `product_stock`  WHERE `st_id` = '" . $sid . "'");
            echo ("Success");
    } else {
        echo ("Invalid Stock Id");
    }
}