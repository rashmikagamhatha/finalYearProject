<?php
include "connection.php";

session_start();
$a = $_SESSION["an"];

$weight = $_POST["w"];
$age = $_POST["a"];
$health = $_POST["h"];

if (empty($weight)) {
    echo("Please Enter Age");
}else if (!is_numeric($weight)) {
    echo("Only numbers can be entered Weight");
}else if (empty($age)) {
    echo("Please Enter a Age");
}else if (!is_numeric($age)) {
    echo("Only numbers can be entered Age");
}else if (empty($health)) {
    echo("Please select a Health Status");
}else {
    // Update query

    Database::iud("UPDATE `animal` SET `weight` = '".$weight."', `age` = '".$age."', `health_status_id` = '".$health."'  WHERE `an_id` = '".$a["an_id"]."'");

    $rs = Database::search("SELECT * FROM `animal` WHERE `an_id` = '".$a["an_id"]."'");
    $d = $rs->fetch_assoc();
    $_SESSION["an"] = $d;

    echo("Update Successfully");
}
?>