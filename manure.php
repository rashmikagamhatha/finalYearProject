<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

if (isset($_SESSION["u"])) {

    $rs = Database::search("SELECT * FROM `employee`  WHERE `emp_id` = '" . $user["emp_id"] . "'");
    $d = $rs->fetch_assoc();

    if ($d["position_id"] == '1' || $d["position_id"] == '5') {

?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Manure Management</title>
            <link rel="stylesheet" href="bootstrap.min.css">
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
            <link rel="icon" href="resources/harvest_11296852.png">
        </head>

        <body class="backgroundImg">


            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="container mt-3">
                        <a href="production.php"><img src="resources/back.png" height="50" ;></a>
                    </div>
                    <!-- category name -->
                    <div class="col-12 mt-5 mb-3">
                        <a class="text-decoration-none link-dark fs-3 fw-bold">Manure Management</a>
                        &nbsp;&nbsp;
                    </div>
                    <!-- category name end-->

                    <div class="col-12 mt-5 mb-3 d-flex justify-content-center">
                        <a class="text-decoration-none text-success-emphasis fs-3 fw-bold">By-Products Register</a>
                    </div>

                    <!-- signupbox  -->
                    <div class="col-12 col-md-8 offset-0  rounded border-0  bg-secondary mb-5">
                        <div class="row signup_box rounded ">
                            <!-- image -->
                            <div class="col-12  p-5">
                                <div class="row">
                                    <!-- topic -->

                                    <div class="col-12 mt-2">
                                        <div class="row">
                                            
                                            <div class="col-3">
                                                <label class="form-label text-light text-center fw-bold">Animal Type</label>
                                                <select class="form-select" id="antype">
                                                    <option value="">Select</option>
                                                    <?php
                                                    $rs = Database::search("SELECT * FROM `Animal_type`");
                                                    $num = $rs->num_rows;

                                                    for ($x = 0; $x < $num; $x++) {

                                                        $data = $rs->fetch_assoc();

                                                    ?>
                                                        <option value="<?php echo ($data["id"]); ?>"><?php echo ($data["type_name"]); ?></option>
                                                    <?php
                                                    }

                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-3">
                                                <label class="form-label text-light text-center fw-bold">Product Name</label>
                                                <input class="form-control" type="text" id="pname" />
                                            </div>

                                            <div class="col-3">
                                                <label class="form-label text-light fw-bold">Kg</label>
                                                <input class="form-control" type="text" id="volume" />
                                            </div>

                                            <div class="col-3">
                                                <label class="form-label text-light fw-bold">Price per Kg</label>
                                                <input class="form-control" type="text" id="uprice" />
                                            </div>
                                            </div>


                                        </div>
                                        
                                        <div class="d-none" id="msgDivz">
                                            <div class="alert alert-secondary mt-3" id="msgz"></div>
                                        </div>
                                        <div class="col-12">
                                            <div class=" row">
                                                <div class="col-12 d-grid mt-4">
                                                    <button class="btn btn-outline-light" onclick="byproReg();">Register</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- signupbox  -->

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