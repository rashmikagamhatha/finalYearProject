<?php
include "connection.php";


$mtr = $_POST["m"]; 

if (empty($mtr)) {
    echo("Please Enter a Metric");
} else if (strlen($mtr)>20) {
    echo("Metric Name should be less than 20 characters");
} else{
    $rs = Database::search("SELECT * FROM `metrics` WHERE `m_name` = '".$mtr."'");
    $num = $rs->num_rows;
    // echo($num);
    if ($num > 0) {
        echo("This Metric is Already Exists");
    } else {
        Database::iud("INSERT INTO `metrics` (`m_name`) VALUES ('".$mtr."')");
        echo("Success");
    }
}

?>