<?php
include "connection.php";

$foodname = $_POST["fn"];
$foodtype = $_POST["ft"];
$foodqty = $_POST["fq"];
$fooddate = $_POST["fd"];
$foodcost = $_POST["fc"];
$smobile = $_POST["sm"];

if (empty($foodname)) {
    echo("Please Enter Food Name");
}else if (strlen($foodname) > 35) {
    echo("Food Name should be Less than 35 characters");
}else if (empty($foodtype)) {
    echo("Please Select a Food Type");
}else if (empty($foodqty)) {
    echo("Please Enter a food Qty");
} else if (strlen($foodqty) > 10) {
    echo("Qty should be Less than 10 Characters");
}  else if (empty($fooddate)) {
    echo("Please Select a Food Date");
}else if (empty($foodcost)) {
    echo("please enter a Price");
}else if (!is_numeric($foodcost)) {
    echo("Only Numbers can be entered Price");
} else if (empty($smobile)) {
    echo("Please Select a supplier Mobile");
}else {
    $rs = Database::search("SELECT * FROM `food_stock` WHERE `f_name` = '".$foodname."' AND `food_type_id` = '".$foodtype."' AND `cost` = '".$foodcost."'");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();

    if ($num > 0) {
        echo("This food is Already Exists");
    }else{
        Database::iud("INSERT INTO `food_stock` (`f_name`, `food_type_id`, `qty`, `date`, `cost`, `company_id`)
         VALUES ('".$foodname."','".$foodtype."', '".$foodqty."', '".$fooddate."', '".$foodcost."', '".$smobile."')");
         echo("Success");
    }
}

?>