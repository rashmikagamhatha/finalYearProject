<?php

include "connection.php";

$cartId = $_POST["c"];

Database::iud("DELETE FROM `cart` WHERE `cart_id` = '".$cartId."'");
echo("Item successfully remove form cart");

?>