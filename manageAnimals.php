<?php
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Management</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="resources/harvest_11296852.png">
</head>

<body class="backgroundImg1">

    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="container mt-3">
                <a href="animalStock.php"><img src="resources/back.png" height="50" ;></a>
            </div>

            <div class="col-12 mt-2 mb-3 d-flex justify-content-center">
                <a class="text-decoration-none text-light fs-3 fw-bold">Manage Animals</a>
                &nbsp;&nbsp;
            </div>

            <div class="signup_box rounded-4 col-8  bg-success-subtle">
                <div class="row">
                    <div class="col-6 col-md-12 mt-5 mb-5">

                        <div class="row ">
                            <div class="col-12 col-md-3 offset-2 ">
                                <label for="form-label " class="fw-bold text-dark text-success-emphasis">Animal Type Register:</label>
                                <input type="text" class="form-control mb-3" id="antype">

                                <div class="d-none" id="msgDiv1" onclick="reload()">
                                    <div class="alert alert-danger" id="msg1"></div>
                                </div>

                                <div class="mt-3">
                                    <button class="btn btn-outline-dark col-12" onclick="typeReg();">Animal Type Register</button>
                                </div>
                            </div>

                            <div class="col-12  col-md-3 offset-2">
                                <label for="form-label" class="fw-bold text-dark text-success-emphasis">Color Register:</label>
                                <input type="text" class="form-control mb-3" id="color">

                                <div class="d-none" id="msgDiv2">
                                    <div class="alert alert-danger" id="msg2"></div>
                                </div>

                                <div class="mt-3">
                                    <button class="btn btn-outline-dark col-12" onclick="colorReg();">Color Register</button>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-12  col-md-3 offset-2 ">
                                <label for="form-label" class="fw-bold text-dark text-success-emphasis">Breed Register:</label>
                                <input type="text" class="form-control mb-3" id="breed">

                                <div class="d-none" id="msgDiv3">
                                    <div class="alert alert-danger" id="msg3"></div>
                                </div>

                                <div class="mt-3">
                                    <button class="btn btn-outline-dark col-12" onclick="breedReg();">Breed Register</button>
                                </div>
                            </div>

                            <div class="col-12 col-md-3 offset-2 ">
                                <label for="form-label" class="fw-bold text-dark text-success-emphasis">Health Status:</label>
                                <input type="text" class="form-control mb-3" id="health">

                                <div class="d-none" id="msgDiv4">
                                    <div class="alert alert-danger" id="msg4"></div>
                                </div>

                                <div class="mt-3">
                                    <button class="btn btn-outline-dark col-12" onclick="healthReg();">Health Status Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-5 mb-3 d-flex justify-content-center">
                <a class="text-decoration-none text-light fs-3 fw-bold">Register Animal</a>
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
                                        <label class="form-label text-success-emphasis fw-bold">Animal Id</label>
                                        <input class="form-control" type="text" id="id" />
                                    </div>

                                    <div class="col-4">
                                        <label class="form-label text-success-emphasis fw-bold">Animal Type</label>
                                        <select class="form-select" id="selectType">
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
                                        <label class="form-label text-success-emphasis fw-bold">Animal Color</label>
                                        <select class="form-select" id="selectColor">
                                        <option value="">Select</option>
                                            <?php
                                            $rs = Database::search("SELECT * FROM `color`");
                                            $num = $rs->num_rows;

                                            for ($x = 0; $x < $num; $x++) {

                                                $data = $rs->fetch_assoc();

                                            ?>
                                                <option value="<?php echo ($data["id"]); ?>"><?php echo ($data["color_name"]); ?></option>
                                            <?php
                                            }

                                            ?>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="row">
                                    <div class="col-4">
                                        <label class="form-label text-success-emphasis fw-bold">Weight(Kg)</label>
                                        <input class="form-control" type="text" id="weight" />

                                    </div>
                                    <div class="col-4">
                                        <label class="form-label text-success-emphasis fw-bold">Age(Weeks/years)</label>
                                        <input class="form-control" type="text" id="age" />
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label text-success-emphasis fw-bold">Breed</label>
                                        <select class="form-select" id="selectBreed">
                                        <option value="">Select</option>
                                            <?php
                                            $rs = Database::search("SELECT * FROM `breed`");
                                            $num = $rs->num_rows;

                                            for ($x = 0; $x < $num; $x++) {

                                                $data = $rs->fetch_assoc();

                                            ?>
                                                <option value="<?php echo ($data["id"]); ?>"><?php echo ($data["breed_name"]); ?></option>
                                            <?php
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4  mt-2">
                                <label class="form-label text-success-emphasis fw-bold">Health Status</label>
                                <select class="form-select" id="selectHealth">
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

                            <div class="d-none" id="msgDivan">
                                <div class="alert alert-secondary mt-3" id="msgan"></div>
                            </div>
                            <div class="col-12">
                                <div class=" row">
                                    <div class="col-12 d-grid mt-2">
                                        <button class="btn btn-outline-dark" onclick="anReg();">Register</button>
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