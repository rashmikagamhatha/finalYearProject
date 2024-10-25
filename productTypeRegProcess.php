<?php
include "connection.php";


$ptr = $_POST["p"]; 

if (empty($ptr)) {
    echo("Please Enter a Product Type");
} else if (strlen($ptr)>30) {
    echo("Product Type should be less than 30 characters");
} else{
    $rs = Database::search("SELECT * FROM `product_type` WHERE `type` = '".$ptr."'");
    $num = $rs->num_rows;
    // echo($num);
    if ($num > 0) {
        echo("This Product Type is Already Exists");
    } else {
        Database::iud("INSERT INTO `product_type` (`type`) VALUES ('".$ptr."')");
        echo("Success");
    }
}

?>