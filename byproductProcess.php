<?php
include "connection.php";


$a = $_POST["a"]; 
$n = $_POST["n"]; 
$v = $_POST["v"]; 
$up = $_POST["up"];

if (empty($a)) {
    echo("Please Select a Animal Type");
} else if (empty($n)) {
    echo("Please Enter Product Name");
} else if (strlen($n) > 20) {
    echo("Product name should be less than 20 characters");
} else if (empty($v)) {
    echo("Enter a Volume");
} else if (!is_numeric($v)) {
    echo("Only Numbers can be entered volume (Kg)");
} else if (empty($up)) {
    echo("enter a unit price");
} else if (!is_numeric($up)) {
    echo("Only Numbers can be entered price");
} else{
    $rs = Database::search("SELECT * FROM `by_products` WHERE `animal_type_id` = '".$a."' AND `name` = '".$n."' AND `price` = '".$up."'");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();
    // echo($num);
    if ($num == 1) {
        // update stock 
        $newvolume = $d["volume"] + $v;
        Database::iud("UPDATE `by_products` SET `volume` = '" . $newvolume . "' WHERE `by_id` = '" . $d["by_id"] . "'");
        echo("Stock Updated Successfully");
    } else {
        Database::iud("INSERT INTO `by_products` (`animal_type_id`, `name`, `volume`, `price`) 
        VALUES ('".$a."', '".$n."', '".$v."', '".$up."')");
        echo("New Stock Added Successfully");
    }


}

?>