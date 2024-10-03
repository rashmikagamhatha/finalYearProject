<?php

include "connection.php";

$uid = $_POST["u"];
// echo($uid);

if (empty($uid)) {
    echo ("Please Enter Your User Id");
} else {
    $rs = Database::search("SELECT * FROM `employee` WHERE `emp_id` = '" . $uid . "' AND `user_type_id` = '2'");
    $num = $rs->num_rows;

    if ($num == 1) {
        $d = $rs->fetch_assoc();

        if ($d["status"] == 1) {
            echo ("Please Deactivate employee Before Delete");
        }

        if ($d["status"] == 0) {
            Database::iud("DELETE FROM `employee`  WHERE `emp_id` = '" . $uid . "'");
            echo ("Success");
        }
    } else {
        echo ("Invalid User Id");
    }
}