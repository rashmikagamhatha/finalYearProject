<?php
include "connection.php";


$ptype = $_POST["pt"]; 
$pname = $_POST["pn"]; 
$volume = $_POST["vol"]; 
$metric = $_POST["m"]; 
$uprice = $_POST["up"]; 
$mfd = $_POST["mfd"]; 
$exp = $_POST["exp"]; 

if (empty($ptype)) {
    echo("Please Select a Product Type");
} else if (empty($pname)) {
    echo("Please Select Product Name");
} else if (empty($volume)) {
    echo("Please Enter Volume or Qty of production");
} else if (empty($metric)) {
    echo("Select Metric");
} else if (empty($uprice)) {
    echo("Please enter a unit price");
} else if (!is_numeric($uprice)) {
    echo("Only Numbers can be entered Price");
} else if (empty($mfd)) {
    echo("Enter Manufacture Date");
} else if (empty($exp)) {
    echo("Enter Expire Date");
} else{
    $rs = Database::search("SELECT * FROM `product_stock` WHERE `product_type_id` = '".$ptype."' AND `production_id` = '".$pname."' AND `price` = '".$uprice."' AND `mfd` = '".$mfd."'");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();
    // echo($num);
    if ($num == 1) {
        // update stock 
        $newvolume = $d["volume"] + $volume;
        Database::iud("UPDATE `product_stock` SET `volume` = '" . $newvolume . "' WHERE `st_id` = '" . $d["st_id"] . "'");
        echo("Stock Updated Successfully");
    } else {
        Database::iud("INSERT INTO `product_stock` (`product_type_id`, `production_id`, `volume`, `metrics_id`, `price`, `status`, `mfd`, `exp`) 
        VALUES ('".$ptype."', '".$pname."', '".$volume."', '".$metric."', '".$uprice."', '1', '".$mfd."', '".$exp."')");
        echo("New Stock Added Successfully");
    }


}

?>