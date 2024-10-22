<?php

include "connection.php";

$aid = $_POST["aid"];
// echo($uid);

if (empty($aid)) {
    echo ("Please Enter a Animal Id");
} else {
    $rs = Database::search("SELECT * FROM `animal` WHERE `an_id` = '" . $aid . "'");
    $num = $rs->num_rows;

    if ($num == 1) {
        
            Database::iud("DELETE FROM `animal`  WHERE `an_id` = '" . $aid . "'");
            echo ("Success");
    } else {
        echo ("Invalid Animal Id");
    }
}