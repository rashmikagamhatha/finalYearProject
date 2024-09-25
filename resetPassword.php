<!DOCTYPE html>
<html>

<head>
    <title>ResetPassword</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="resources/harvest_11296852.png">
    
</head>

<body class="bg-info-subtle">

    <div class="container-fluid vh-100 d-flex justify-content-center">

        <div class="col-8 row align-items-center">
            <!-- forgetpasswordbox -->
            <div class="col-12 col-md-8 offset-0 offset-md-2  rounded border-0 bg-success-subtle" >

                <div class="row signup_box rounded ">
                    <!-- image -->
                    <div class="bg-img col-6 d-none d-md-block d-lg-block "></div>

                    <div class="col-6 p-5">

                        <div class="row">

                            <!-- topic -->
                            <div class="col-12 mt-2">
                                <h3 class="text-dark fw-bold">Reset password.</h3>
                            </div>

                            <div class="d-none">
                                <input type="hidden" id="vcode" value="<?php echo ($_GET["vcode"])?>">
                            </div>

                            <div class="col-12 mt-2">
                                <label class="form-label fw-bold" >Password:</label>
                                <input class="form-control" type="password" id="np" />
                            </div>
                            <div class="col-12 ">
                                <label class="form-label fw-bold" >Re-enter Password:</label>
                                <input class="form-control" type="password" id="np2" />
                            </div>
                            <div class=" d-none" id="msgDivr">
                                <div class="alert alert-danger col-9" id="msgr"></div>
                            </div>
                            <div class="col-12">

                                <div class=" row">

                                    <div class="col-6 d-grid mt-2 offset-6">
                                        <button class="btn btn-dark" onclick="resetPassword();">Update</button>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
            <!-- forgetpasswordbox -->

            

        </div>

    </div>

    
    <script src="script.js"></script>
</body>

</html>