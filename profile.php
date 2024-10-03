<?php
include "connection.php";

session_start();
$user = $_SESSION["u"];

if (isset($_SESSION["u"])) {
    $rs = Database::search("SELECT * FROM `employee` INNER JOIN `position` ON `employee`.`position_id`=`position`.`id` WHERE `emp_id` = '" . $user["emp_id"] . "'");
    $d = $rs->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile leza</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="resources/harvest_11296852.png">

</head>

<body class="backgroundImg">

    <div class="container mt-3">
        <a href="dashboard.php"><img src="resources/back.png" height="50" ;></a>
    </div>
    <br /><br />
    <div class="adminBody">
        <div class="row container bg-info-subtle rounded signup_box">
            <div class="col-4  d-flex justify-content-center flex-column">
                <div class="d-none d-md-flex  justify-content-center">
                    <img class="signup_box rounded" src=" <?php
                                                                if (!empty($d["img_path"])) {
                                                                    echo $d["img_path"];
                                                                } else {
                                                                    echo ("resources/blankuser.png");
                                                                }

                                                                ?>" height="150px" id="i">
                </div>
                <div class="mt-3">
                    <label for="form-label" id="pimage">Profile Image:</label>
                    <input type="file" class="form-control mt-1" id="imgUploader">
                </div>
                <div class="mt-3 ">
                    <button class="btn btn-outline-dark col-12" onclick="uploadImg();" id="pupload">Upload</button>
                </div>
            </div>
            <div class="col-8">
                <h2 class="text-center mt-3" id="ptitle">Employee Details</h2>
                <div class="row mt-3">
                    <div class="col-6">
                        <label for="form-label" id="pfname">First Name:</label>
                        <input type="text" class="form-control" value="<?php echo $d["fname"] ?>" id="fname">
                    </div>
                    <div class="col-6">
                        <label for="form-label">Last Name:</label>
                        <input type="text" class="form-control" value="<?php echo $d["lname"] ?>" id="lname">
                    </div>
                </div>
                <div class=" mt-3">
                    <label for="form-label">Email:</label>
                    <input type="email" class="form-control" value="<?php echo $d["email"] ?>" id="email">
                </div>
                <div class=" mt-3">
                    <label for="form-label">Mobile:</label>
                    <input type="text" class="form-control" value="<?php echo $d["mobile"] ?>" id="mobile">
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <label for="form-label">username:</label>
                        <input type="text" class="form-control" value="<?php echo $d["username"] ?>" disabled>
                    </div>
                    <div class="col-6">
                        <label for="form-label">password:</label>
                        <input type="password" class="form-control" value="<?php echo $d["password"] ?>" id="pw">
                    </div>
                </div>

                <h5 class="mt-3">Other Information</h5>

                <div class="row mt-3">
                    <div class="col-6">
                        <label for="form-label">Duty On:</label>
                        <input type="time" class="form-control" id="d_on" value="<?php echo $d["duty_on"] ?>">
                    </div>
                    <div class="col-6">
                        <label for="form-label">Duty Off:</label>
                        <input type="time" class="form-control" id="d_off" value="<?php echo $d["duty_off"] ?>">
                    </div>
                </div>
                <div class="mt-3">
                    <label for="form-label">Salary (LKR)</label>
                    <input type="text" class="form-control" id="sal" value="<?php echo $d["salary"] ?>">
                </div>
                <div class="mt-3 mb-4">
                    <button class="btn btn-outline-warning col-12" onclick="updateData();">Update</button>
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

} else {

    header("location: login.php");
}

?>