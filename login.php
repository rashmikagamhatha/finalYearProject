<?php
include "connection.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Farm Shop</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="resources/harvest_11296852.png">
</head>

<body class="bg-info-subtle">

    <div class="container-fluid vh-100 d-flex justify-content-center">

        <div class=" row align-items-center">
            <!-- signinbox -->
            <div class="col-12 col-md-8 offset-0 offset-md-2  rounded border-0 bg-success-subtle" id="s_in">

                <div class="row signup_box rounded ">
                    <!-- image -->
                    <div class="bg-img col-6 d-none d-md-block d-lg-block "></div>

                    <div class="col-12 col-md-6 col-lg-6 p-5">

                        <div class="row">

                            <?php

                            $username = "";
                            $password = "";

                            if (isset($_COOKIE["username"])) {
                                $username = $_COOKIE["username"];
                            }
                            if (isset($_COOKIE["password"])) {
                                $password = $_COOKIE["password"];
                            }

                            ?>

                            <!-- topic -->
                            <div class="col-12 mt-2">
                                <h3 class="text-success-emphasis fw-bold">Employee account Sign</h3>
                            </div>

                            <div class="col-9 mt-2">
                                <label class="form-label text-success-emphasis fw-bold">Username:</label>
                                <input class="form-control" type="email" id="un" value="<?php echo $username ?>" />
                            </div>
                            <div class="col-9 mt-2">
                                <label class="form-label text-success-emphasis fw-bold">Password:</label>
                                <input class="form-control" type="password" id="pw" value="<?php echo $password ?>" />
                            </div>
                            <div class="col-9 mt-2 mb-2">
                                <input type="checkbox" class="form-check-input" id="rm">
                                <label class="form-check-label text-success-emphasis" for="exampleCheck1">Remember
                                    me:</label>
                            </div>
                            <div class=" d-none" id="msgDiv2">
                                <div class="alert alert-warning col-9" id="msg2"></div>
                            </div>

                            <div class="col-9">

                                <div class=" row">

                                    <div class="col-6 d-grid mt-2">
                                        <button class="btn btn-success" onclick="empSignin();">Signin</button>
                                    </div>
                                    <div class="col-6 d-grid mt-2">
                                        <a href="forgetPassword.php" class="btn btn-link text-success-emphasis">forget
                                            password?</a>
                                    </div>
                                    <div class="mt-2">
                                        <h5 class="text-center text-success-emphasis">or,</h5>
                                    </div>
                                    <div class="col-12 d-grid mt-2">
                                        <button class="btn btn-outline-success" onclick="changeView();">join with using
                                            new account</button>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
            <!-- signinbox -->

            <!-- signupbox  -->
            <div class="col-12 col-md-8 offset-0 offset-md-2 offset-lg-2 rounded border-0  bg-success-subtle d-none"
                id="s_up">
                <div class="row signup_box rounded ">
                    <!-- image -->
                    <div class="bg-img col-6 d-none d-md-block d-lg-block"></div>
                    <div class="col-12 col-md-6 col-lg-6 p-5">
                        <div class="row">
                            <!-- topic -->
                            <div class="col-12 text-success-emphasis mt-2">
                                <h3 class="text-success-emphasis fw-bold">Employee Registration.</h3>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="row">
                                    <div class="col-6 ">
                                        <label class="form-label text-success-emphasis fw-bold">First Name</label>
                                        <input class="form-control" type="text" id="fname" />
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label text-success-emphasis fw-bold">Last Name</label>
                                        <input class="form-control" type="text" id="lname" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label text-success-emphasis fw-bold">Position</label>
                                        <select class="form-select" id="selectPosition">
                                            <option value="">Select</option>
                                            <?php

                                            $rs = Database::search("SELECT * FROM `position`");
                                            $num = $rs->num_rows;

                                            for ($x = 0; $x < $num; $x++) {

                                                $data = $rs->fetch_assoc();

                                            ?>
                                            <option value="<?php echo ($data["id"]); ?>">
                                                <?php echo ($data["position_name"]); ?></option>
                                            <?php
                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label text-success-emphasis fw-bold">Mobile</label>
                                        <input class="form-control" type="text" id="mobile" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <label class="form-label text-success-emphasis fw-bold">email</label>
                                <input class="form-control" type="text" id="email" />
                            </div>
                            <div class="col-12 mt-2">
                                <label class="form-label text-success-emphasis fw-bold">username</label>
                                <input class="form-control" type="text" id="username" />
                            </div>
                            <div class="col-12 mt-2 mb-2">
                                <label class="form-label text-success-emphasis fw-bold">password</label>
                                <input class="form-control" type="password" id="password">
                            </div>

                            <div class="d-none " id="msgDiv1">
                                <div class="alert alert-secondary" id="msg1"></div>
                            </div>
                            <div class="col-12">
                                <div class=" row">
                                    <div class="col-12 d-grid mt-2">
                                        <button class="btn btn-success" onclick="empSignup();">Signup</button>
                                    </div>
                                    <div class="mt-2">
                                        <h5 class="text-center text-success-emphasis">or,</h5>
                                    </div>
                                    <div class="col-12 d-grid mt-2">
                                        <button type="button" class="btn btn-outline-success"
                                            onclick="changeView();">Already have an account? Signin</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- signupbox  -->

            <div class="fixed-bottom col-12 d-lg-block ">
                <p class="text-center text-black fw-bold">&copy; Lezafarming. Sri Lanka</p>
            </div>


        </div>

    </div>

    <script src="bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>