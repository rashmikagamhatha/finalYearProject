<?php
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="resources/harvest_11296852.png">
</head>

<body class="backgroundImg" onload="loadCus();">

    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="container mt-3">
                <a href="saleproduct.php"><img src="resources/back.png" height="50" ;></a>
            </div>

            <div class="col-12 mt-5 mb-3 d-flex justify-content-center">
                <a class="text-decoration-none text-success-emphasis fs-3 fw-bold">Customer Register</a>
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
                                        <label class="form-label text-success-emphasis fw-bold">Customer Mobile</label>
                                        <input class="form-control" type="text" id="mobile" />
                                    </div>
                                    <div class="col-4 ">
                                        <label class="form-label text-success-emphasis fw-bold">Customer Name</label>
                                        <input class="form-control" type="text" id="name" />
                                    </div>
                                    <div class="col-4 ">
                                        <label class="form-label text-success-emphasis fw-bold">Customer Email</label>
                                        <input class="form-control" type="text" id="email" />
                                    </div>

                                </div>

                                <div class="d-none" id="msgDivan">
                                    <div class="alert alert-secondary mt-3" id="msgan"></div>
                                </div>
                                <div class="col-12">
                                    <div class=" row">
                                        <div class="col-12 d-grid mt-2">
                                            <button class="btn btn-outline-dark" onclick="cusReg();">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- signupbox  -->

            </div>


            <div class="col-4 col-md-8 mb-3" id="printAr">
                                        <h2 class="text-center mb-2 fw-bold">Customer List</h2>
                                        <br>
                                        <div class="row">
                                            <table class="table signup_box">
                                                <thead>
                                                    <tr>
                                                        <th class="bg-dark-subtle">id</th>
                                                        <th class="bg-dark-subtle">Mobile</th>
                                                        <th class="bg-dark-subtle">Name</th>
                                                        <th class="bg-dark-subtle">Email</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbc">
                                                    <!-- Table Row  -->

                                                    <!-- Table Row  -->

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

        </div>



        <script src="bootstrap.bundle.min.js"></script>
        <script src="script.js"></script>
</body>

</html>