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
            <title>Product Management</title>
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

                    <div class="col-12 mt-2 mb-3 d-flex justify-content-center">
                        <a class="text-decoration-none text-success-emphasis fs-3 fw-bold">Register Product Type</a>
                        &nbsp;&nbsp;
                    </div>

                    <div class="signup_box rounded-4 col-6 col-md-4  bg-success-subtle me-2">
                        <div class="row">
                            <div class="col-12 mt-5 mb-5">

                                <div class="row ">
                                    <div class="col-8 offset-2 ">
                                        <label for="form-label " class="fw-bold text-dark text-success-emphasis mb-2">Product Type Register:</label>
                                        <input type="text" class="form-control mb-3" id="ptr">

                                        <div class="d-none" id="msgDiv1" onclick="reload()">
                                            <div class="alert alert-danger" id="msg1"></div>
                                        </div>

                                        <div class="mt-3">
                                            <button class="btn btn-outline-dark col-12" onclick="producttypereg();">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="signup_box rounded-4 col-6 col-md-4  bg-success-subtle ms-2">
                        <div class="row">
                            <div class="col-12 mt-5 mb-5">

                                <div class="row ">
                                    <div class="col-8 offset-2 ">
                                        <label for="form-label " class="fw-bold text-dark text-success-emphasis mb-2">Metric Register: (Kg,L,Qty)</label>
                                        <input type="text" class="form-control mb-3" id="mtr">

                                        <div class="d-none" id="msgDiv2" onclick="reload()">
                                            <div class="alert alert-danger" id="msg2"></div>
                                        </div>

                                        <div class="mt-3">
                                            <button class="btn btn-outline-dark col-12" onclick="metricreg();">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 mt-5 mb-3 d-flex justify-content-center">
                        <a class="text-decoration-none text-success-emphasis fs-3 fw-bold">Product Register</a>
                    </div>

                    <!-- productbox  -->
                    <div class="col-12 col-md-8 offset-0  rounded border-0  bg-success-subtle mb-2">
                        <div class="row signup_box rounded ">
                            <!-- image -->
                            <div class="col-12  p-5">
                                <div class="row">
                                    <!-- topic -->

                                    <div class="col-12 mt-2">
                                        <div class="row">
                                            <div class="col-4 ">
                                                <label class="form-label text-success-emphasis fw-bold">Product Name</label>
                                                <input class="form-control" type="text" id="pname" />
                                            </div>
                                            <div class="col-4">
                                                <label class="form-label text-success-emphasis text-center fw-bold">Product Type</label>
                                                <select class="form-select" id="ptype">
                                                    <option value="">Select</option>
                                                    <?php
                                                    $rs = Database::search("SELECT * FROM `product_type`");
                                                    $num = $rs->num_rows;

                                                    for ($x = 0; $x < $num; $x++) {

                                                        $data = $rs->fetch_assoc();

                                                    ?>
                                                        <option value="<?php echo ($data["id"]); ?>"><?php echo ($data["type"]); ?></option>
                                                    <?php
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-4 ">
                                                <br>
                                                <button class="btn btn-outline-dark col-12 mt-2" onclick="productReg();">Register</button>
                                            </div>


                                        </div>

                                        <div class="d-none" id="msgDivpreg">
                                            <div class="alert alert-secondary mt-3" id="msgpreg"></div>
                                        </div>
                                        <div class="col-12">
                                            <div class=" row">
                                                <div class="col-12 d-grid mt-4">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- productbox  -->
                    </div>

                    <div class="col-12 mt-5 mb-3 d-flex justify-content-center">
                        <a class="text-decoration-none text-success-emphasis fs-3 fw-bold">Production Stock Register</a>
                    </div>

                    <!-- signupbox  -->
                    <div class="col-12 col-md-8 offset-0  rounded border-0  bg-success-subtle mb-5">
                        <div class="row signup_box rounded ">
                            <!-- image -->
                            <div class="col-12  p-5">
                                <div class="row">
                                    <!-- topic -->

                                    <div class="col-12 mt-2">
                                        <div class="row">
                                            
                                            <div class="col-3">
                                                <label class="form-label text-success-emphasis text-center fw-bold">Product Type</label>
                                                <select class="form-select" id="prtype">
                                                    <option value="">Select</option>
                                                    <?php
                                                    $rs = Database::search("SELECT * FROM `product_type`");
                                                    $num = $rs->num_rows;

                                                    for ($x = 0; $x < $num; $x++) {

                                                        $data = $rs->fetch_assoc();

                                                    ?>
                                                        <option value="<?php echo ($data["id"]); ?>"><?php echo ($data["type"]); ?></option>
                                                    <?php
                                                    }

                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-3">
                                                <label class="form-label text-success-emphasis text-center fw-bold">Product Name</label>
                                                <select class="form-select" id="prname">
                                                    <option value="">Select</option>
                                                    <?php
                                                    $rs = Database::search("SELECT * FROM `production`");
                                                    $num = $rs->num_rows;

                                                    for ($x = 0; $x < $num; $x++) {

                                                        $data = $rs->fetch_assoc();

                                                    ?>
                                                        <option value="<?php echo ($data["id"]); ?>"><?php echo ($data["product_name"]); ?></option>
                                                    <?php
                                                    }

                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-3">
                                                <label class="form-label text-success-emphasis fw-bold">Volume(Kg,L,Qty)</label>
                                                <input class="form-control" type="text" id="volume" />
                                            </div>

                                             <div class="col-3 ">
                                                <label class="form-label text-success-emphasis fw-bold">Metric</label>
                                                <select class="form-select" id="mtype">
                                                    <option value="">Select</option>
                                                    <?php
                                                    $rs = Database::search("SELECT * FROM `metrics`");
                                                    $num = $rs->num_rows;

                                                    for ($x = 0; $x < $num; $x++) {

                                                        $data = $rs->fetch_assoc();

                                                    ?>
                                                        <option value="<?php echo ($data["id"]); ?>"><?php echo ($data["m_name"]); ?></option>
                                                    <?php
                                                    }

                                                    ?>
                                                </select>
                                            </div>


                                        </div>
                                        <div class="row mt-3">
                                           
                                            <div class="col-4">
                                                <label class="form-label text-success-emphasis fw-bold">Unit Price</label>
                                                <input class="form-control" type="text" id="uprice" />
                                            </div>
                                            <div class="col-4">
                                                <label class="form-label text-success-emphasis text-center fw-bold">Manufacture Date</label>
                                                <input class="form-control" type="date" id="mfd" />
                                            </div>
                                            <div class="col-4">
                                                <label class="form-label text-success-emphasis text-center fw-bold">Expire Date</label>
                                                <input class="form-control" type="date" id="exp" />
                                            </div>
                                        </div>

                                        <div class="d-none" id="msgDivz">
                                            <div class="alert alert-secondary mt-3" id="msgz"></div>
                                        </div>
                                        <div class="col-12">
                                            <div class=" row">
                                                <div class="col-12 d-grid mt-4">
                                                    <button class="btn btn-outline-dark" onclick="stockReg();">Register</button>
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