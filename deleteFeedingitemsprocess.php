<?php

include "connection.php";

$fid = $_POST["fid"];
// echo($uid);

if (empty($fid)) {
    echo ("Please Enter a Feed Schedule Id");
} else {
    $rs = Database::search("SELECT * FROM `feeding_manage` WHERE `f_id` = '" . $fid . "'");
    $num = $rs->num_rows;

    if ($num == 1) {
        
            Database::iud("DELETE FROM `feeding_manage`  WHERE `f_id` = '" . $fid . "'");
            echo ("Success");
    } else {
        echo ("Invalid Feed Schedule Id");
    }
}