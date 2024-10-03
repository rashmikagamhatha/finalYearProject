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

<body class="backgroundImg">

    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="container mt-3">
                <a href="supplier.php"><img src="resources/back.png" height="50" ;></a>
            </div>

            <div class="col-12 mt-2 mb-3 d-flex justify-content-center">
                <a class="text-decoration-none text-success-emphasis fs-3 fw-bold">Register Company</a>
                &nbsp;&nbsp;
            </div>

            <div class="signup_box rounded-4 col-12 col-md-4  bg-success-subtle">
                <div class="row">
                    <div class="col-12 mt-5 mb-5">

                        <div class="row ">
                            <div class="col-8 offset-2 ">
                                <label for="form-label " class="fw-bold text-dark text-success-emphasis">Company Register:</label>
                                <input type="text" class="form-control mb-3" id="com">

                                <div class="d-none" id="msgDiv1" onclick="reload()">
                                    <div class="alert alert-danger" id="msg1"></div>
                                </div>

                                <div class="mt-3">
                                    <button class="btn btn-outline-dark col-12" onclick="comreg();">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-5 mb-3 d-flex justify-content-center">
                <a class="text-decoration-none text-success-emphasis fs-3 fw-bold">Supplier Register</a>
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
                                        <label class="form-label text-success-emphasis fw-bold">Supplier Mobile</label>
                                        <input class="form-control" type="text" id="mobile" />
                                    </div>
                                    <div class="col-4 ">
                                        <label class="form-label text-success-emphasis fw-bold">Supplier Name</label>
                                        <input class="form-control" type="text" id="name" />
                                    </div>
                                    <div class="col-4 ">
                                        <label class="form-label text-success-emphasis fw-bold">Supplier Email</label>
                                        <input class="form-control" type="text" id="email" />
                                    </div>

                                </div>
                                <div class="row">
                                <div class="col-4">
                                    <label class="form-label text-success-emphasis text-center fw-bold">Company Name</label>
                                    <select class="form-select" id="selectCompany">
                                        <option value="">Select</option>
                                        <?php
                                        $rs = Database::search("SELECT * FROM `company`");
                                        $num = $rs->num_rows;

                                        for ($x = 0; $x < $num; $x++) {

                                            $data = $rs->fetch_assoc();

                                        ?>
                                            <option value="<?php echo ($data["id"]); ?>"><?php echo ($data["c_name"]); ?></option>
                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>
                                </div>

                                <div class="d-none" id="msgDivan">
                                    <div class="alert alert-secondary mt-3" id="msgan"></div>
                                </div>
                                <div class="col-12">
                                    <div class=" row">
                                        <div class="col-12 d-grid mt-2">
                                            <button class="btn btn-outline-dark" onclick="supReg();">Register</button>
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