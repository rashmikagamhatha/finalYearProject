<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

if (isset($_SESSION["u"])) {

    $rs = Database::search("SELECT * FROM `employee`  WHERE `emp_id` = '" . $user["emp_id"] . "'");
    $d = $rs->fetch_assoc();

    if ($d["position_id"] == '1' || $d["position_id"] == '3') {

?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Foodstock Management</title>
            <link rel="stylesheet" href="bootstrap.min.css">
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
            <link rel="icon" href="resources/harvest_11296852.png">
        </head>

        <body class="backgroundImg5" onload="loadfood();">

            <!-- navbar  -->
            <?php include "adminNavbar.php"; ?>
            <!-- navbar  -->

            <div class="container-fluid">
                <br><br><br>
                <div class="row d-flex justify-content-center">
                    <div class="container mt-3">
                        <a href="dashboard.php"><img src="resources/back.png" height="50" ;></a>
                    </div>


                    <!-- category name -->
                    <div class="col-12 mt-2 mb-3">
                        <a class="text-decoration-none link-light fs-3 fw-bold">Foodstock</a>
                        &nbsp;&nbsp;
                    </div>
                    <!-- category name end-->


                    <div class="row d-flex justify-content-center mt-4 mb-4">
                        <a class="btn btn-outline-light fw-bold col-2 me-1" href="supplier.php">Manage Suppliers</a>
                        <a class="btn btn-outline-light fw-bold col-2 ms-1" href="manageFoods.php">Manage Foods</a>
                    </div>

                    <div class="col-8">
                        <div class="d-none" id="md" onclick="reload();">
                            <div class="alert alert-danger" id="m"></div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-end mt-4 mb-4 me-5">
                            <div class="col-2">
                                <input type="text" class="form-control bg-dark-subtle " placeholder="food Id" id="fid" />
                            </div>
                            <i class="col-1 me-2 btn btn-danger bi bi-trash fw-bold" onclick="removefood();"></i>
                        </div>
                    

                    <div class="col-4 col-md-8 mb-3" id="printAr">
                        <h2 class="text-center text-light mb-2 fw-bold">Foods Report</h2>
                        <br>
                        <div class="row">
                            <table class="table signup_box">
                                <thead>
                                    <tr>
                                        <th class="bg-dark-subtle">Food Id</th>
                                        <th class="bg-dark-subtle">Food Name</th>
                                        <th class="bg-dark-subtle">QTY(kg)</th>
                                        <th class="bg-dark-subtle">Date</th>
                                        <th class="bg-dark-subtle">Cost</th>
                                    </tr>
                                </thead>
                                <tbody id="tbf">
                                    <!-- Table Row  -->

                                    <!-- Table Row  -->

                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="container-fluid row">
                        <div class="col-4 col-md-8 mb-3 d-flex justify-content-end container mt-5 mb-5">
                        <i class="btn btn-light fw-bold col-1 bi bi-printer" onclick="printDiv();"></i>
                            <!-- <button class="btn btn-outline-dark col-2" onclick="printDiv();">Print</button> -->
                        </div>
                    </div>


                    

                </div>
            </div>



            <script src="bootstrap.bundle.min.js"></script>
            <script src="script.js"></script>
        </body>

        </html>

<?php
    } else {
        header("location: dashboard.php");
    }
} else {
    header("location: login.php");
}
?>