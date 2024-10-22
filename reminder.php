<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leza Reminders</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="resources/harvest_11296852.png">
</head>

<body class="container-fluid">


    <div class="container mt-3">
        <a href="dashboard.php"><img src="resources/back.png" height="50" ;></a>
    </div>

    <br><br><br><br><br>
    <div class="col-10">
        <h1 class="text-center rounded-3 col-8 offset-3 fw-bold">Reminders </h1>
        <div class="row offset-3 mt-5">
            <div class="col-4 mt-5">
                <div>
                    <h5 class="text-start">Vaccine Reminders</h5>
                </div>
                <a href="vaccinereminder.php">
                    <h1 class="spinner-grow col-5 offset-4" role="status">. .</h1>
                </a>
            </div>
            <div class="col-4 mt-5">
                <div>
                    <h5 class="text-start ">Feeding Reminders</h5>
                </div>
                <a href="#">
                    <h1 class="spinner-grow col-5 offset-3" role="status">. .</h1>
                </a>
            </div>
            <div class="col-4 mt-5">
                <div>
                    <h5 class="text-start">Milking Reminders</h5>
                </div>
                <a href="#">
                    <h1 class="spinner-grow col-5 offset-3" role="status">. .</h1>
                </a>
            </div>
        </div>

    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
</body>

</html>