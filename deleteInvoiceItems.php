<?php

include "connection.php";
session_start();
$cus = $_SESSION["sc"];

    
        
            Database::iud("DELETE FROM `order_item`  WHERE `customer_id` = '" . $cus["id"] . "'");
            Database::iud("DELETE FROM `order_history` WHERE `customer_id` = '".$cus["id"]."'");
 