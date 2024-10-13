<?php
include "connection.php";

$company = $_POST["c"];
// echo($breed);

if (empty($company)) {
    echo("Please Enter Company Name");
} else if (strlen($company) > 20) {
    echo("Company name Should be less than 20 characters");
} else {
    $rs = Database::search("SELECT * FROM `company` WHERE `c_name` = '".$company."'");
    $num = $rs->num_rows;
    // echo($num);
    if ($num > 0) {
        echo("This Company is Already Exists");
    } else {
        Database::iud("INSERT INTO `company` (`c_name`) VALUES ('".$company."')");
        echo("Success");
    }
}

?>