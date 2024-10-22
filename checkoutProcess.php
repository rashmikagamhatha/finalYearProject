<?php
session_start();
include "connection.php";

$customer = $_POST["sc"];

// echo($customer);


    
    $rs = Database::search("SELECT * FROM `customer` WHERE `id` = '".$customer."'");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();

    if ($num == 1) {

        $_SESSION["sc"] = $d;
        echo("Success");
    }else {
        echo("select Customer");
    }

