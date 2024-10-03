<?php
include "connection.php";

session_start();
$user = $_SESSION["u"];

if (empty($_FILES["i"])) {
    echo("empty");
} else {
    // upload image 
    $rs = Database::search("SELECT * FROM `employee` WHERE `emp_id` = '".$user["emp_id"]."'");
    $d = $rs->fetch_assoc();

    if (!empty($d["img_path"])) {
        unlink($d["img_path"]); //delete from the project
    }

    $path = "prodileImg/" . uniqid() . "png";
    move_uploaded_file($_FILES["i"]["tmp_name"], $path);

    Database::iud("UPDATE `employee` SET `img_path` = '".$path."' WHERE `emp_id` = '".$user["emp_id"]."'");
    echo($path);

}

?>