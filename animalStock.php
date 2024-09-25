<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

if (isset($_SESSION["u"])) {

    $rs = Database::search("SELECT * FROM `employee`  WHERE `emp_id` = '" . $user["emp_id"] . "'");
    $d = $rs->fetch_assoc();

    if ($d["position_id"] == '1' || $d["position_id"] == '2') {

?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Livestock Management</title>
            <link rel="stylesheet" href="bootstrap.min.css">
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
            <link rel="icon" href="resources/harvest_11296852.png">
        </head>

        <body class="backgroundImg" onload="loadAnimal();">

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
                        <a class="text-decoration-none link-dark fs-3 fw-bold">Animal Details List</a>
                        &nbsp;&nbsp;
                        <a class="text-decoration-none link-dark fs-6">All Animals &nbsp;&rarr;</a>
                    </div>
                    <!-- category name end-->

                    <div class="col-8">
                        <div class="d-none" id="md" onclick="reload();">
                            <div class="alert alert-danger" id="m"></div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center mt-4 mb-4">
                        <a class="btn btn-info text-white fw-bold col-5" href="manageAnimals.php">Animal Management</a>
                    </div>

                    <div class="col-4 col-md-8 mb-3" id="printAr">
                        <h2 class="text-center mb-2 fw-bold">Cattle Report</h2>
                        <br>
                        <div class="row">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="bg-dark-subtle">Animal Id</th>
                                        <th class="bg-dark-subtle">Animal Type</th>
                                        <th class="bg-dark-subtle">Color</th>
                                        <th class="bg-dark-subtle">Weight(kg)</th>
                                        <th class="bg-dark-subtle">Age(years)</th>
                                        <th class="bg-dark-subtle">Breed</th>
                                        <th class="bg-dark-subtle">Health Status</th>
                                    </tr>
                                </thead>
                                <tbody id="tb1">
                                    <!-- Table Row  -->

                                    <!-- Table Row  -->

                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="container-fluid row">
                        <div class="col-4 col-md-8 mb-3 d-flex justify-content-end container mt-5 mb-5">
                            <button class="btn btn-outline-dark col-2" onclick="printDiv();">Print</button>
                        </div>
                    </div>


                    <div class="col-8">
                        <div class="d-none" id="md" onclick="reload();">
                            <div class="alert alert-danger" id="m"></div>
                        </div>
                    </div>

                    <div class="col-4 col-md-8 mb-3" id="printAr2">
                        <h2 class="text-center mb-2 fw-bold">Goat Report</h2>
                        <br>
                        <div class="row">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="bg-dark-subtle">Animal Id</th>
                                        <th class="bg-dark-subtle">Animal Type</th>
                                        <th class="bg-dark-subtle">Color</th>
                                        <th class="bg-dark-subtle">Weight(kg)</th>
                                        <th class="bg-dark-subtle">Age(years)</th>
                                        <th class="bg-dark-subtle">Breed</th>
                                        <th class="bg-dark-subtle">Health Status</th>
                                    </tr>
                                </thead>
                                <tbody id="tb2">
                                    <!-- Table Row  -->

                                    <!-- Table Row  -->

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="container-fluid row">
                        <div class="col-4 col-md-8 mb-3 d-flex justify-content-end container mt-5 mb-5">
                            <button class="btn btn-outline-dark col-2" onclick="printDiv2();">Print</button>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="d-none" id="md" onclick="reload();">
                            <div class="alert alert-danger" id="m"></div>
                        </div>
                    </div>


                    <div class="col-4 col-md-8 mb-3" id="printAr3">
                        <h2 class="text-center mb-2 fw-bold">Poultry Report</h2>
                        <br>
                        <div class="row">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="bg-dark-subtle">Animal Id</th>
                                        <th class="bg-dark-subtle">Animal Type</th>
                                        <th class="bg-dark-subtle">Color</th>
                                        <th class="bg-dark-subtle">Weight(kg)</th>
                                        <th class="bg-dark-subtle">Age(weeks)</th>
                                        <th class="bg-dark-subtle">Breed</th>
                                        <th class="bg-dark-subtle">Health Status</th>
                                    </tr>
                                </thead>
                                <tbody id="tb3">
                                    <!-- Table Row  -->

                                    <!-- Table Row  -->

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="container-fluid row">
                        <div class="col-4 col-md-8 mb-3 d-flex justify-content-end container mt-5 mb-5">
                            <button class="btn btn-outline-dark col-2" onclick="printDiv3();">Print</button>
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
        echo ("you are not farm manager or animal caretaker");
    }
} else {
    header("location: login.php");
}
?>