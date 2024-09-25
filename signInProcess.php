<?php

session_start();

include "connection.php";

$username = $_POST["un"];
$password = $_POST["pw"];
$rememberme = $_POST["rm"];

if (empty($username)) {
    echo ("Please Enter your Username");
} else if (empty($password)) {
    echo ("Please enter your password");
} else {
    $rs = Database::search("SELECT * FROM `employee` WHERE `username` = '" . $username . "' AND `password` = '" . $password . "'");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();

    if ($num == 1) {

        if ($d["status"] == 1) {
            //active user
        
                echo ("Success");

                $_SESSION["u"] = $d;

                // $_SESSION["u"] = $d;
                

                if ($rememberme == "true") {
                    //set cookie

                    setcookie("username", $username, time() + (60 * 60 * 24 * 365));
                    setcookie("password", $password, time() + (60 * 60 * 24 * 365));
                } else {
                    //destroy cookie
                    setcookie("username", "", -1);
                    setcookie("password", "", -1);
                }
 
        } else {
            echo ("Inactive User");
        }
    } else {
        echo ("Invalid username or password");
    }
}