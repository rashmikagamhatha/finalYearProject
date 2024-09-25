<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];


if (isset($_SESSION["u"])) {

  $rs = Database::search("SELECT * FROM `employee` WHERE `emp_id` = '" . $user["emp_id"] . "'");
  $d = $rs->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Leza farming Dashboard</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="resources/harvest_11296852.png">
</head>

<body class="backgroundImg">

    <!-- navbar -->
    <!-- navbar -->

    <nav class="navbar navbar-expand-lg  navbar-link-light bg-success-subtle fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"><img
                    src="resources/filter-right.svg" style="width: 30px; height: 30px;" alt=""></a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" aria-current="page" data-bs-toggle="offcanvas"
                            href="#offcanvasExample" role="button">
                            <h5>Lezafarming</h5>
                        </a>
                    </li>
                </ul>
            </div>





            <form class="d-flex me-2">
                <a href="#"><img class="me-2" src="resources/blankuser.png" style="width: 40px; height: 40px;"
                        alt=""></a>
                <div class="text-center me-3 mt-1 ">
                    <span class="text-lg-start text-success fw-bolder"><?php echo $d["fname"] ?>
                        <?php echo $d["lname"] ?></span>
                </div>

                <div class="dropdown me-3">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        My Options
                    </button>
                    <ul class="dropdown-menu dropdown-menu-light">
                        <li><a class="dropdown-item" href="login.php">Sign In</a></li>
                        <li><a class="dropdown-item" href="#" onclick="signOut()">Sign Out</a></li>
                        <hr class="table-group-divider">
                        <li><a class="dropdown-item text-danger" href="#">about us</a></li>
                    </ul>
                </div>


                <a href="#"><img src="resources/bell-fill.svg" style="width: 25px; height: 25px;" alt="" srcset=""></a>
            </form>

        </div>
    </nav>

    <!-- navbar -->
    <!-- navbar -->

    <!-- canvastart -->

    <div class="offcanvas offcanvas-start bg-success-subtle" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Leza Farming Management</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>

            </div>

            <!-- profile -->
            <div class="d-none d-md-flex  justify-content-center">
                <img class="rounded" src="resources/blankuser.png" height="130px" id="i">
            </div>
            <div class="mt-1 text-center">
                <label for="form-label">
                    <label type="text"><?php echo $d["fname"] ?></label>
                    <label type="text"><?php echo $d["lname"] ?></label>
                </label>
            </div>
            <div class="mt-1 text-center">
                <label for="form-label">
                    <span><?php echo $d["mobile"] ?></span>
                </label>
            </div>
            <div class="mt-1 text-center">
                <label for="form-label">
                    <span> <?php
                    if ($d["position_id"] == '1') {
                      echo ("Farm Manager");
                    } else if ($d["position_id"] == '2') {
                      echo ("Animal Caretaker");
                    } else if ($d["position_id"] == '3') {
                      echo ("Feed Supervisor");
                    } else if ($d["position_id"] == '4') {
                      echo ("Health Assistant");
                    } else {
                      echo ("General Worker");
                    }
                    ?> </span>
                </label>
            </div>

            <!-- profile -->

            <ul class="navbar-nav ">
                <li class="my-1">
                    <hr class="table-group-divider">
                </li>
                <li>
                    <a href="#" class="nav-link px-3 active">
                        <span class="me-2">
                            <i class="bi bi-speedometer"></i>
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="animalStock.php" class="nav-link active">
                        <span class="btn btn-outline-secondary col-11">LiveStock details</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link active"></a>
                    <span class="btn btn-outline-secondary col-11">Food Stock</span>
                </li>
                <li>
                    <a href="#" class="nav-link active"></a>
                    <span class="btn btn-outline-secondary col-11">Production</span>
                </li>
                <li>
                    <a href="#" class="nav-link active"></a>
                    <span class="btn btn-outline-secondary col-11">Health Monitoring</span>
                </li>
                <li>
                    <a href="employeeManagement.php" class="nav-link active">
                        <span class="btn btn-outline-secondary col-11">Employee Management</span>
                    </a>
                </li>
                <li class="my-1">
                    <hr class="table-group-divider">
                </li>
                <li>
                    <a href="#" class="nav-link px-3 active">
                        <span class="me-2">
                            <i class="bi bi-file-earmark-bar-graph"></i>
                        </span>
                        <span>Report related live stock</span>
                    </a>
                </li>
                <li class="my-1">
                    <hr class="table-group-divider">
                </li>
                <li>
                    <a href="#" class="nav-link px-3 active">
                        <span class="me-2">
                            <i class="bi bi-puzzle-fill"></i>
                        </span>
                        <span>Manage feeding schedules and inventory</span>
                    </a>
                </li>
                <li class="my-1">
                    <hr class="table-group-divider">
                </li>
                <a href="#" class="nav-link px-3 active">
                    <span class="me-2">
                        <i class="bi bi-bell"></i>
                    </span>
                    <span>Notification and Alerts</span>
                </a>
                <li class="my-1">
                    <hr class="table-group-divider">
                </li>
                <a href="farmManager.php" class="nav-link px-3 active">
                    <span class="me-2">
                        <i class="bi bi-people-fill"></i>
                    </span>
                    <span>Employees</span>
                </a>

        </div>
        </ul>
    </div>




    <!-- canvastart -->

    <div class="container-fluid">
        <br><br><br><br>
        <div class="row">
            <div class="col-5 container mb-5" style="width: 600px;">
                <h2 class="text-center text-white fw-bold">All Animals</h2>
                <canvas id="animalchart1"></canvas>
            </div>
        </div>

        <div class="mt-5 row">
            <div class="col-5 container mb-5" style="width: 600px;">
                <h2 class="text-center">All Animals</h2>
                <canvas id="polarArea"></canvas>
            </div>
        </div>


        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="row border-primary">
                            <div class="col-12 ">
                                <div class="row justify-content-center gap-4 ">
                                    <div class="card bg-dark-subtle" style="width: 30rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">LiveStock Overview</h5>

                                            <h6 class="card-subtitle mb-2 text-body-secondary mt-3">Upcomming Tasks</h6>
                                            <p class="card-text mt-4">-> Vaccination Cows (Due:July 31)</p>
                                            <p class="card-text">-> Inspect barn Cows (Due:August 31)</p>

                                            <hr class="table-group-divider">

                                            <p href="#" class="card-footer">Reminders</p>
                                            <p href="#" class="card-body">-> Tractor maintanance (Due: August 2)</p>
                                        </div>
                                    </div>
                                    <div class="card bg-danger-subtle" style="width: 30rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">Resource Management</h5>
                                            <h6 class="card-subtitle mb-2 text-body-secondary mt-3">Inventory Summary
                                            </h6>
                                            <p class="card-text mt-4">-> Feed: 200Kg</p>
                                            <p class="card-text">-> Medicine: 50 doses</p>

                                            <hr class="table-group-divider">

                                            <p href="#" class="card-footer">Equipment Status</p>
                                            <p href="#" class="card-body">-> Tractors 3 (1 needs maintanance)</p>
                                        </div>
                                    </div>
                                    <div class="card bg-warning-subtle" style="width: 50rem;">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Live Stock Overview</h5>
                                            <h6 class="card-subtitle mb-2 text-body-secondary mt-3">Total LiveStock: 200
                                            </h6>
                                            <p class="card-text">-> Cows 100 (10 need health check)</p>
                                            <p class="card-text">-> Sheep 50 (All healthy)</p>
                                            <p class="card-text">-> Pigs 50 (5 underweight)</p>
                                        </div>
                                    </div>
                                    <div class="card bg-info-subtle" style="width: 50rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">Farm Activity Timeline</h5>
                                            <h6 class="card-subtitle mb-2 text-body-secondary mt-3">Recent Activities
                                            </h6>
                                            <p class="card-text text-center">-> Completed task: Vaccinated goats</p>
                                            <p class="card-text text-center">-> Updated feed inventory: 500 Kg of corn
                                                added</p>

                                            <hr class="table-group-divider">

                                            <p href="#" class="card-footer">Daily/Weekly reports</p>
                                            <p class="card-text text-center">-> Milk Production: 500 liters/day</p>
                                            <p class="card-text text-center">-> Average weight gain: 0.5Kg/day</p>
                                        </div>
                                    </div>

                                    <div class="card bg-body-secondary" style="width: 30rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">Daily logs</h5>
                                            <h6 class="card-subtitle mb-2 text-body-secondary">Feeding logs</h6>
                                            <p class="card-text">July 29: sheep fed with grain mix</p>
                                            <p class="card-text text-center">-> July 29: Sheep fed with grain mix</p>
                                            <p class="card-text text-center">-> July 28: Cows fed with silage</p>

                                            <hr class="table-group-divider">

                                            <p class="card-text text-center">-> July 30: Cow #123 health check</p>
                                            <p class="card-text text-center">-> July 29: 15 goats Vaccinated</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <script src="bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="chart1.js"></script>
    <script src="chart2.js"></script>

</body>

</html>

<?php

} else {

  header("location: login.php");
}

?>