<?php

include "connection.php";
$cartId = $_POST["c"];
$newQty = $_POST["q"];

// echo($newQty);

$rs = Database::search("SELECT * FROM `cart` INNER JOIN `product_stock` ON `cart`.`product_stock_st_id` = `product_stock`.`st_id`
                         WHERE `cart`.`cart_id` = '".$cartId."'");
$num = $rs->num_rows;

if ($num > 0) {
    // cart item found 
    $d = $rs->fetch_assoc();

    if ($d["volume"] >= $newQty) {
        // update query 
        Database::iud(("UPDATE `cart` SET `cart_qty` = '".$newQty."' WHERE `cart_id` = '".$cartId."'"));
        echo("Success");
    } else {
        echo ("your product quantity exeeded ");
    }
    
} else {
    // cart item not found
    echo ("Cart Item Not Found");
}


?>