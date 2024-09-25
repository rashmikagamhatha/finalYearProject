<?php

include "connection.php";

$uid = $_POST["u"];
// echo($uid);

if (empty($uid)) {
    echo ("Please Enter Your Use Id");
} else {
    $rs = Database::search("SELECT * FROM `employee` WHERE `emp_id` = '" . $uid . "' AND `user_type_id` = '2'");
    $num = $rs->num_rows;

    if ($num == 1) {
        $d = $rs->fetch_assoc();

        if ($d["status"] == 1) {
            Database::iud("UPDATE `employee` SET `status` = '0' WHERE `emp_id` = '" . $uid . "'");
            echo ("Deactive");
        }

        if ($d["status"] == 0) {
            Database::iud("UPDATE `employee` SET `status` = '1' WHERE `emp_id` = '" . $uid . "'");
            echo ("Active");
        }
    } else {
        echo ("Invalid User Id");
    }
}