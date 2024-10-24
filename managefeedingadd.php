<?php
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feeding Register Management</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="resources/harvest_11296852.png">
</head>

<body class="backgroundImg">

    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="container mt-3">
                <a href="manageFeeding.php"><img src="resources/back.png" height="50" ;></a>
            </div>

            <div class="col-12 mt-5 mb-3 d-flex justify-content-center">
                <a class="text-decoration-none text-success-emphasis fs-3 fw-bold">New Feeding Schedule Add</a>
                &nbsp;&nbsp;
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
                                    <div class="col-4 ">
                                        <label class="form-label text-success-emphasis text-center fw-bold">Animal Type</label>
                                        <select class="form-select" id="atype">
                                            <option value="">Select</option>
                                            <?php
                                            $rs = Database::search("SELECT * FROM `animal_type`");
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
                                    <div class="col-4">
                                        <label class="form-label text-success-emphasis text-center fw-bold">Food Type</label>
                                        <select class="form-select" id="fotype">
                                            <option value="">Select</option>
                                            <?php
                                            $rs = Database::search("SELECT * FROM `food_type`");
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
                                        <label class="form-label text-success-emphasis fw-bold">Food Name</label>
                                        <input class="form-control" type="text" id="foname" />
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-4 ">
                                        <label class="form-label text-success-emphasis fw-bold">Time 1</label>
                                        <input class="form-control" type="time" id="t1" />
                                    </div>
                                    <div class="col-4 ">
                                        <label class="form-label text-success-emphasis fw-bold">Time 2</label>
                                        <input class="form-control" type="time" id="t2" />
                                    </div>
                                </div>

                                <div class="d-none" id="msgDivan">
                                    <div class="alert alert-secondary mt-3" id="msgan"></div>
                                </div>
                                <div class="col-12">
                                    <div class=" row">
                                        <div class="col-12 d-grid mt-4">
                                            <button class="btn btn-outline-dark" onclick="feedschedreg();">Register</button>
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
    </div>



    <script src="bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>