<?php
include "connection.php";

$id = $_POST["id"];
$type = $_POST["type"];
$color = $_POST["color"];
$w = $_POST["w"];
$age = $_POST["age"];
$breed = $_POST["breed"];
$health = $_POST["health"];


// echo($id);
// echo($type);
// echo($color);
// echo($w);
// echo($age);
// echo($breed);
// echo($health);

if (empty($id)) {
    echo("please enter animal id");
} else if (strlen($id) > 10) {
    echo("Animal id should be less than 10 characters");
} else if (empty($type)) {
    echo("Please select a animal type");
} else if (empty($color)) {
    echo("Please select a color");
} else if (empty($w)) {
    echo("Please enter a weight");
} else if (!preg_match('/^(0|[1-9][0-9]*)(\.[0-9]+)?$/', $w)) {
    echo ("Invalid weight. Please enter a positive number.");
} else if (empty($age)) {
    echo("please enter age");
} else if (!preg_match('/^(\d{1,2}(\.\d+)?|1[01]\d(\.\d+)?)$/', $age)) {
    echo("Invalid age. Please enter a valid age (0-120).");
} else if (empty($breed)) {
    echo("Please select a breed");
} else if (empty($health)) {
    echo("please select a health");
} else {
    $rs = Database::search("SELECT * FROM `animal` WHERE `an_id` = '".$id."'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo("Animal Id Already Exists");
    } else {
        // insert
        Database::iud("INSERT INTO `animal` (`an_id`,`animal_type_id`,`color_id`,`weight`,`age`,`breed_id`,`health_status_id`)
        VALUES ('".$id."', '".$type."', '".$color."', '".$w."', '".$age."', '".$breed."', '".$health."')");

        echo("Success");
    }
}

?>