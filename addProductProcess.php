<?php
include "connection.php";


$pname = $_POST["pn"]; 
$ptype = $_POST["pt"]; 

if (empty($pname)) {
    echo("Please Enter a Product Name");
} else if (strlen($pname)>30) {
    echo("Product Name should be less than 30 characters");
} else if (empty($ptype)) {
    echo("Please select product type");
} else{
    $rs = Database::search("SELECT * FROM `production` WHERE `product_name` = '".$pname."'");
    $num = $rs->num_rows;
    // echo($num);
    if ($num > 0) {
        echo("This Product is Already Exists");
    } else {
        Database::iud("INSERT INTO `production` (`product_name`,`product_type_id`) VALUES ('".$pname."', '".$ptype."')");
        echo("Success");
    }
}

?>