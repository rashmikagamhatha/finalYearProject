<?php

include "connection.php";
session_start();
$cus = $_SESSION["sc"];
$payment = $_POST["n"];

if (isset($cus)) {


    $date = new DateTime();
    $date->setTimezone(new DateTimeZone("Asia/colombo"));
    $time = $date->format("Y-m-d H-i-s");

    Database::iud("INSERT INTO `order_history` (`order_date`,`amount`,`customer_id`) 
    VALUES ('" . $time . "','" . $payment . "','" . $cus["id"] . "')");

    $orderHistoryId = Database::$connection->insert_id;

    $rs = Database::search("SELECT * FROM `cart` WHERE `customer_id` = '" . $cus["id"] . "'");
    $num = $rs->num_rows;

    for ($i = 0; $i < $num; $i++) {
        $d = $rs->fetch_assoc();

        Database::iud("INSERT INTO `order_item` (`oi_qty`,`order_history_ohid`,`product_stock_st_id`,`customer_id`) 
        VALUES ('" . $d["cart_qty"] . "','" . $orderHistoryId . "','" . $d["product_stock_st_id"] . "', '".$cus["id"]."')");

        $rs2 = Database::search("SELECT * FROM `product_stock` WHERE `st_id` = '" . $d["product_stock_st_id"] . "'");
        $d2 = $rs2->fetch_assoc();

        $newQty = $d2["volume"] - $d["cart_qty"];
        Database::iud("UPDATE `product_stock` SET `volume` = '" . $newQty . "' WHERE `st_id` = '" . $d["product_stock_st_id"] . "'");
    }

    Database::iud("DELETE FROM `cart` WHERE `customer_id` = '" . $cus["id"] . "'");
    echo ("Success");

    // $order = array();
    // $order["resp"] = "Success";
    // $order["customer_id"] = $orderHistoryId;

    // echo json_encode($order);

    
}