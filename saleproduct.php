<?php
session_start();
include "connection.php";
$user = $_SESSION["u"];

if (isset($_SESSION["u"])) {

    $rs = Database::search("SELECT * FROM `employee`  WHERE `emp_id` = '" . $user["emp_id"] . "'");
    $d = $rs->fetch_assoc();

    if ($d["position_id"] == '1' || $d["position_id"] == '6') {

?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Sale Products</title>
            <link rel="stylesheet" href="bootstrap.min.css">
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
            <link rel="icon" href="resources/harvest_11296852.png">
        </head>

        <body class="backgroundImg4 container-fluid" onload="loadProducta();">


            <!-- navbar  -->
            <?php include "adminNavbar.php"; ?>
            <!-- navbar  -->

            <br><br><br>

            <div class="container mt-3">
                <a href="dashboard.php"><img src="resources/back.png" height="50" ;></a>
            </div>

            <br><br><br>
            <div class="row container-fluid">
                <div class="offset-3 col-4 text-center">
                    <label class="form-label text-light text-center fw-bold">Select A Customer</label>
                    <select class="form-select" id="selectCustomer">
                        <option value="">Select</option>
                        <?php
                        $rs = Database::search("SELECT * FROM `customer`");
                        $num = $rs->num_rows;

                        for ($x = 0; $x < $num; $x++) {

                            $data = $rs->fetch_assoc();

                        ?>
                            <option value="<?php echo ($data["id"]); ?>"><?php echo ($data["name"]); ?></option>
                        <?php
                        }

                        ?>
                    </select>
                </div>


            </div>
            <div class="d-flex justify-content-end me-5">
                <a class="btn btn-outline-info fw-bold col-2 me-1 " href="customer.php">Add Customers</a>
            </div>

            <div class="container mt-5">
                <div class="row" id="aas">

                </div>
            </div>

            <div class="d-flex flex-column align-items-end">
                <a class="btn btn-outline-light col-2 me-5 mt-3 mb-4" onclick="checkOut();">CHKECKOUT</a>
            </div>

            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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