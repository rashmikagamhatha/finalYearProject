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
            <title>Feeding Management</title>
            <link rel="stylesheet" href="bootstrap.min.css">
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
            <link rel="icon" href="resources/harvest_11296852.png">
        </head>

        <body class="backgroundImg" onload="loadfeeding();">

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
                        <a class="text-decoration-none link-dark fs-3 fw-bold">Feeding Management</a>
                        &nbsp;&nbsp;
                    </div>
                    <!-- category name end-->

                    <div class="row d-flex justify-content-center mt-4 mb-4">
                        <a class="btn btn-outline-info fw-bold col-2 ms-1" href="managefeedingadd.php">Manage Feeding</a>
                    </div>

                    <div class="col-8">
                        <div class="d-none" id="md" onclick="reload();">
                            <div class="alert alert-danger" id="m"></div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-end mt-4 mb-4 me-5">
                        <div class="col-2">
                        <select class="form-select" id="fid">
                                        <option value="">Select</option>
                                        <?php
                                        $rs = Database::search("SELECT * FROM `feeding_manage`");
                                        $num = $rs->num_rows;

                                        for ($x = 0; $x < $num; $x++) {

                                            $data = $rs->fetch_assoc();

                                        ?>
                                            <option value="<?php echo ($data["f_id"]); ?>"><?php echo ($data["f_id"]); ?></option>
                                        <?php
                                        }

                                        ?>
                                    </select>
                        </div>
                        <i class="col-1 me-2 btn btn-outline-danger bi bi-trash fw-bold" onclick="removefeedings();"></i>
                    </div>


                    <div class="col-4 col-md-8 mb-3" id="printAr">
                        <h2 class="text-center mb-2 fw-bold">Feeding Table</h2>
                        <br>
                        <div class="row">
                            <table class="table signup_box">
                                <thead>
                                    <tr>
                                        <th class="bg-dark-subtle">Feeding Id</th>
                                        <th class="bg-dark-subtle">Animal Type</th>
                                        <th class="bg-dark-subtle">Food Type</th>
                                        <th class="bg-dark-subtle">Food Names</th>
                                        <th class="bg-dark-subtle">Time 1</th>
                                        <th class="bg-dark-subtle">Time 2</th>
                                    </tr>
                                </thead>
                                <tbody id="tbmf">
                                    <!-- Table Row  -->

                                    <!-- Table Row  -->

                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="container-fluid row">
                        <div class="col-4 col-md-8 mb-3 d-flex justify-content-end container mt-5 mb-5">
                            <i class="btn btn-outline-danger fw-bold col-1 bi bi-printer" onclick="printDiv();"></i>
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