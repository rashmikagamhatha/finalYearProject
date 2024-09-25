<?php  

include "connection.php";

$vcode = $_POST["vcode"];
$np = $_POST["np"];
$np2 = $_POST["np2"];

if ($np == $np2) {
    // echo("Match Password");

    $rs = Database::search("SELECT * FROM `employee` WHERE `v_code` = '".$vcode."'");
    $num = $rs->num_rows;

    if ($num > 0) {
        $d = $rs->fetch_assoc();

        Database::iud("UPDATE `employee` SET `password` = '".$np."', `v_code` = NULL WHERE `emp_id` = '".$d["emp_id"]."'");
        echo("Success");
    } else {
        echo("user not found");
    }
    

} else {
    echo("Password dosen't match");
}

?>