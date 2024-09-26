<?php
include "connection.php";

$breed = $_POST["b"];
// echo($breed);

if (empty($breed)) {
    echo("Please Enter Animal breed");
} else if (strlen($breed) > 25) {
    echo("Animal breed name Should be less than 25 characters");
} else {
    $rs = Database::search("SELECT * FROM `breed` WHERE `breed_name` = '".$breed."'");
    $num = $rs->num_rows;
    // echo($num);
    if ($num > 0) {
        echo("This breed is Already Exists");
    } else {
        Database::iud("INSERT INTO `breed` (`breed_name`) VALUES ('".$breed."')");
        echo("Success");
    }
}

?>