<?php
include "connection.php";

session_start();
$a = $_SESSION["an"];

if (isset($_SESSION["an"])) {
    $rs = Database::search("SELECT * FROM `animal` INNER JOIN `animal_type` ON `animal`.`animal_type_id` = `animal_type`.`id`
                                                      INNER JOIN `color` ON `animal`.`color_id` = `color`.`id`
                                                      INNER JOIN `breed` ON `animal`.`breed_id` = `breed`.`id` 
                                                      INNER JOIN `health_status` ON `animal`.`health_status_id` = `health_status`.`id` WHERE `an_id` = '" . $a["an_id"] . "'");
    $a = $rs->fetch_assoc();

    //  echo $a["age"];

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>animal profile</title>
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="icon" href="resources/harvest_11296852.png">

    </head>

    <body class="backgroundImg">

        <div class="container mt-3">
            <a href="animalStock.php"><img src="resources/back.png" height="50" ;></a>
        </div>

        <br><br><br>

        <div class="adminBody mb-5">
            <div class="row container bg-success-subtle rounded signup_box">
                <div class=" col-8 offset-2">
                    <h2 class="text-center mt-3">Animal Profile</h2>
                    <div class="row mt-3">
                        <div class="col-4">
                            <label for="form-label">Animal Id:</label>
                            <input type="text" class="form-control text-danger fw-bold" value="<?php echo $a["an_id"] ?>" disabled>
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
                            <label for="form-label" >Weight:</label>
                            <input type="text" class="form-control" value="<?php echo $a["weight"] ?>" id="weight">
                        </div>
                        <div class="col-4">
                            <label for="form-label" >Age:</label>
                            <input type="text" class="form-control" value="<?php echo $a["age"] ?>" id="age">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <label for="form-label">Current Health Status:</label>
                            <h6 class="ms-5 mt-1 text-danger fw-bold"><?php echo $a["health_name"] ?></h6>
                        </div>
                        <div class="col-4">
                            <label for="form-label" >Update Health Status:</label>
                            <select class="form-select" id="health">
                                <option value="">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `health_status`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {

                                    $data = $rs->fetch_assoc();

                                ?>
                                    <option value="<?php echo ($data["id"]); ?>"><?php echo ($data["health_name"]); ?></option>
                                <?php
                                }

                                ?>
                            </select>
                        </div>
                    </div>


                    <div class=" d-none mb-1" id="msgDiv2">
                                <div class="alert alert-danger col-9" id="msg2"></div>
                            </div>
                    <div class="mt-3 mb-4">
                        <button class="btn btn-outline-dark col-12" onclick="updateAnData();">Update</button>
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