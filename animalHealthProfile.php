<?php
include "connection.php";

session_start();
$a = $_SESSION["anh"];

if (isset($_SESSION["anh"])) {
    $rs = Database::search("SELECT * FROM `animal_health` INNER JOIN `animal` ON `animal_health`.`animal_an_id` = `animal`.`an_id`
                                                             INNER JOIN `animal_type` ON `animal`.`animal_type_id` = `animal_type`.`id`
                                                             INNER JOIN `color` ON `animal`.`color_id` = `color`.`id`
                                                             INNER JOIN `breed` ON `animal`.`breed_id` = `breed`.`id` 
                                                             INNER JOIN `health_status` ON `animal`.`health_status_id` = `health_status`.`id`  WHERE `animal_an_id` = '" . $a["animal_an_id"] . "'");
    $a = $rs->fetch_assoc();

    //  echo $a["age"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>animal health profile</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="resources/harvest_11296852.png">

</head>

<body class="backgroundImg">

    <div class="container mt-3">
        <a href="healthMonitoring.php"><img src="resources/back.png" height="50" ;></a>
    </div>

    <br><br><br><br><br><br>

    <div class="adminBody mb-5">
        <div class="row container bg-danger-subtle rounded signup_box">
            <div class=" col-8 offset-2">
                <h2 class="text-center mt-3">Animal Health Profile</h2>
                <div class="row mt-3">
                    <div class="col-4">
                        <label for="form-label">Animal Id:</label>
                        <input type="text" class="form-control text-danger fw-bold"
                            value="<?php echo $a["animal_an_id"] ?>" disabled>
                    </div>
                    <div class="col-4">
                        <label for="form-label">Animal Type:</label>
                        <input type="text" class="form-control" value="<?php echo $a["type_name"] ?>" disabled>
                    </div>
                    <div class="col-4">
                        <label for="form-label">Animal Color:</label>
                        <input type="text" class="form-control" value="<?php echo $a["color_name"] ?>" disabled>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <label for="form-label">Breed:</label>
                        <input type="text" class="form-control" value="<?php echo $a["breed_name"] ?>" disabled>
                    </div>
                    <div class="col-4">
                        <label for="form-label">Current Health Status:</label>
                        <h6 class="ms-5 mt-1 text-danger fw-bold"><?php echo $a["health_name"] ?></h6>
                    </div>
                </div>

                <h5 class="mt-3">Health Information</h5>

                <div class="mt-3">
                    <label for="form-label">Medical Records:</label>
                    <textarea class="form-control" id="mdetails" rows="3"><?php echo $a["medical_records"]?></textarea>
                </div>
                <div class="mt-3">
                    <label for="form-label">Vaccination Details:</label>
                    <textarea class="form-control" id="vdetails"
                        rows="3"><?php echo $a["vaccination_details"] ?></textarea>
                </div>

                <div class="mt-3 mb-2">
                    <label for="form-label">Weight Monitoring Notes:</label>
                    <textarea class="form-control" id="wdetails" rows="3"><?php echo $a["weight_monitor"] ?></textarea>
                </div>
                <div class="mt-3 mb-2">
                    <label for="form-label">Treatment Notes:</label>
                    <textarea class="form-control" id="tdetails"
                        rows="3"><?php echo $a["treatment_details"] ?></textarea>
                </div>
                <div class=" d-none mb-1" id="msgDiv2">
                    <div class="alert alert-danger col-9" id="msg2"></div>
                </div>
                <div class="mt-3 mb-4">
                    <button class="btn btn-outline-dark col-12" onclick="updateAnHealth();">Update</button>
                </div>

            </div>
        </div>
    </div>


    <script src="chart2.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
}

?>