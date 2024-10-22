<?php
session_start();
include "connection.php";

$stockId = $_POST["s"];
$qty = $_POST["q"];
$customer = $_POST["sc"];

// echo($stockId);
// echo($qty);

$rs = Database::search("SELECT * FROM `product_stock` WHERE `st_id` = '" . $stockId . "'");
$num = $rs->num_rows;

if (empty($customer)) {
    echo("please select a Customer");
}else if ($num > 0) {
    // echo("Success");
    $d = $rs->fetch_assoc();
    $stokQty = $d["volume"];

    $rs2 = Database::search("SELECT * FROM `cart` WHERE `customer_id` = '" . $customer . "' AND `product_stock_st_id` = '" . $stockId . "'");
    $num2 = $rs2->num_rows;


    if ($num2 > 0) {
        // echo("Update");
        $d2 = $rs2->fetch_assoc();
        $newQty = $qty + $d2["cart_qty"];

        if ($stokQty >= $newQty) {
            // update query 
            Database::iud("UPDATE `cart` SET `cart_qty` = '" . $newQty . "' WHERE `cart_id` = '" . $d2["cart_id"] . "'");
            echo ("New stock added successfully");
        } else {
            echo ("Stock Quantity has been exeeded!");
        } 
    } else {
        // echo("Insert");
        if ($stokQty >= $qty) {
            // insertquery
            Database::iud("INSERT INTO `cart` (`cart_qty`, `product_stock_st_id`, `customer_id`) VALUES ('" . $qty . "', '" . $stockId . "', '" . $customer . "')");
            echo ("Cart item added successfully");
        } else {
            echo ("Stock Quantity has been exeeded!");
        }
    }

} else {
    echo ("Your Stock is Not Found");
}
