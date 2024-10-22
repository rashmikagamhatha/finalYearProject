<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];


if (isset($_SESSION["u"])) {

  $rs = Database::search("SELECT * FROM `employee` INNER JOIN `position` ON `employee`.`position_id`=`position`.`id` WHERE `emp_id` = '" . $user["emp_id"] . "'");
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

<body class="backgroundImg3" onload="loadcharts();">

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
                            <h5 id="nav1">Lezafarming</h5>
                        </a>
                    </li>
                </ul>
            </div>





            <form class="d-flex me-2">
                <a href="profile.php"><img class="me-2" src="<?php
                                                        if (!empty($d["img_path"])) {
                                                          echo $d["img_path"];
                                                        } else {
                                                          echo ("resources/blankuser.png");
                                                        }

                                                        ?>" style="width: 40px; height: 40px;" alt=""></a>
                <div class="text-center me-3 mt-1 ">
                    <span class="text-lg-start text-success fw-bolder"><?php echo $d["fname"] ?>
                        <?php echo $d["lname"] ?></span>
                </div>

                <div class="dropdown me-3">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false" id="navop">
                        My Options
                    </button>
                    <ul class="dropdown-menu dropdown-menu-light">
                        <li><a class="dropdown-item" href="login.php" id="s_in">Sign In</a></li>
                        <li><a class="dropdown-item" href="#" onclick="signOut()" id="s_ot">Sign Out</a></li>
                    </ul>
                </div>


                <a href="reminder.php"><img src="resources/bell-fill.svg" style="width: 25px; height: 25px;" alt=""
                        srcset=""></a>
                </span>
            </form>

        </div>
    </nav>

    <br>
    <div class="row container-fluid mt-5">
        <div class="d-flex col-12 fw-bold justify-content-end">
            <span id="text1" class="me-3 mt-1">Select Language</span>
            <div class="col-1">
                <select class="form-select " name="" id="languageSelect" onchange="changeLanguage()">
                    <option value="en">ENGLISH</option>
                    <option value="si">සිංහල</option>
                </select>
            </div>
        </div>
    </div>
    </div>

    <div class="row container-fluid ">

        <div class="row d-flex ">
            <div class="card_box  bg-white ms-5 col-8 col-md-2 ">
                <h6 class="card-subtitle mb-1 text-body-secondary text-center mt-2" id="card1">Total Number of Animals
                </h6>

                <?php
          $rs = Database::search("SELECT * FROM `animal`");
          $num = $rs->num_rows;
          ?>

                <h5 class="card-title text-center fw-bold mb-2">
                    <?php
            if ($num > 0) {
              echo ($num);
            } else {
            ?>
                    0
                    <?php
            }
            ?>
                </h5>
            </div>
            <div class="card_box   bg-white ms-5 col-8 col-md-2 mt-2 mt-md-0">
                <h6 class="card-subtitle mb-1 text-body-secondary text-center mt-2" id="card2">Needs Attention</h6>

                <?php
          $rs1 = Database::search("SELECT * FROM `animal` INNER JOIN `health_status` ON `animal`.`health_status_id`= `health_status`.`id` WHERE `health_name` != 'Healthy'");
          $num1 = $rs1->num_rows;
          ?>


                <h5 class="card-title text-center fw-bold mb-2">
                    <?php
            if ($num1 > 0) {
              echo ($num1);
            } else {
            ?>
                    0
                    <?php
            }
            ?>
                </h5>
            </div>
            <div class="card_box   bg-white ms-5 col-8 col-md-2 mt-2 mt-md-0">
                <h6 class="card-subtitle mb-1 text-body-secondary text-center mt-2" id="card3">Pregnant</h6>

                <?php
          $rs2 = Database::search("SELECT * FROM `animal` INNER JOIN `health_status` ON `animal`.`health_status_id`= `health_status`.`id` WHERE `health_name` = 'Pregnant'");
          $num2 = $rs2->num_rows;
          ?>

                <h5 class="card-title text-center fw-bold mb-2">
                    <?php
            if ($num2 > 0) {
              echo ($num2);
            } else {
            ?>
                    0
                    <?php
            }
            ?>
                </h5>
            </div>
            <div class="card_box   bg-white ms-5 col-8 col-md-2 mt-2 mt-md-0">
                <h6 class="card-subtitle mb-1 text-body-secondary text-center mt-2" id="card4">Healthy</h6>

                <?php
          $rs3 = Database::search("SELECT * FROM `animal` INNER JOIN `health_status` ON `animal`.`health_status_id`= `health_status`.`id` WHERE `health_name` = 'Healthy'");
          $num3 = $rs3->num_rows;
          ?>

                <h5 class="card-title text-center fw-bold mb-2">

                    <?php
            if ($num3 > 0) {
              echo ($num3);
            } else {
            ?>
                    0
                    <?php
            }
            ?>

                </h5>
            </div>
        </div>

        <!-- navbar -->
        <!-- navbar -->

        <!-- canvastart -->

        <div class="offcanvas offcanvas-start bg-success-subtle" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="cantitle">Leza Farming Management</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div>

                </div>

                <!-- profile -->
                <div class="d-none d-md-flex  justify-content-center">
                    <img class="rounded" src="<?php
                                      if (!empty($d["img_path"])) {
                                        echo $d["img_path"];
                                      } else {
                                        echo ("resources/blankuser.png");
                                      }

                                      ?>" height="130px" id="i">
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
                    <?php
            ?>
                    <label for="form-label">
                        <span> <?php
                      echo $d["position_name"];
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
                            <span id="dashtitle">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="animalStock.php" class="nav-link active">
                            <span class="btn btn-outline-secondary col-11" id="can1">LiveStock details</span>
                        </a>
                    </li>
                    <li>
                        <a href="foodStock.php" class="nav-link active">
                            <span class="btn btn-outline-secondary col-11" id="can2">Food Stock</span>

                        </a>
                    </li>
                    <li>
                        <a href="production.php" class="nav-link active">
                            <span class="btn btn-outline-secondary col-11" id="can3">Production</span>
                        </a>
                    </li>
                    <li>
                        <a href="healthMonitoring.php" class="nav-link active">

                            <span class="btn btn-outline-secondary col-11" id="can6">Animal Health Monitoring</span>
                        </a>
                    </li>
                    <li>
                        <a href="employeeManagement.php" class="nav-link active">
                            <span class="btn btn-outline-secondary col-11" id="can5">Employee Management</span>
                        </a>
                    </li>
                    <li class="my-1">
                        <hr class="table-group-divider">
                    </li>
                    <li>
                        <a href="saleproduct.php" class="nav-link px-3 active">
                            <span class="me-2">
                                <i class="bi bi-bandaid"></i>
                                <span id="can4">Customer & Selling</span>
                            </span>

                        </a>
                    </li>
                    <li class="my-1">
                        <hr class="table-group-divider">
                    </li>
                    <li>
                        <a href="manageFeeding.php" class="nav-link px-3 active">
                            <span class="me-2">
                                <i class="bi bi-puzzle-fill"></i>
                            </span>
                            <span id="can7">feeding schedules</span>
                        </a>
                    </li>
                    <li class="my-1">
                        <hr class="table-group-divider">
                    </li>
                    <a href="#" class="nav-link px-3 active">
                        <span class="me-2">
                            <i class="bi bi-bell"></i>
                        </span>
                        <span id="can8">Notification and Alerts</span>
                    </a>
                    <li class="my-1">
                        <hr class="table-group-divider">
                    </li>

            </div>
            </ul>
        </div>






        <!-- canvastart -->




        <div class="col-11 offset-1 ms-5 ">

            <div class="row ms-5">
                <div class="justify-content-start mt-5 col-12 col-md-4 ">
                    <h4 class="text-center mt-5 mb-5 fw-bold " id="chartname1">Distribution of Animal Population by Type
                    </h4>
                    <canvas id="animalchart1"></canvas>
                    <h5 class="text-center mt-1 text-dark fst-italic">Figure 1</h5>
                </div>
                <div class="justify-content-end col-11 col-md-8 ">
                    <!-- todoolist -->


                    <div class="py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-md-12 col-xl-10">

                                <div class="card mask-custom bg-info-subtle">
                                    <div class="card-body p-4 text-white">

                                        <div class="text-center  pb-2">
                                            <h3 class="my-4 text-dark fw-bold" id="tasklist1">TO-DO List</h3>
                                        </div>

                                        <table class="table text-white mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-secondary" scope="col" id="tlb1">Employee</th>
                                                    <th class="text-secondary" scope="col" id="tlb2">Task</th>
                                                    <th class="text-secondary" scope="col" id="tlb3">Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="fw-normal">
                                                    <th>
                                                        <span class="ms-2" id="r11">Feed Supervisor</span>
                                                    </th>
                                                    <td class="align-middle">
                                                        <span id="r12">Feeding Cattles</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <span id="tm1">6.00AM/ 1.00PM/ 3.00PM </span>
                                                    </td>
                                                </tr>
                                                <tr class="fw-normal">
                                                    <th>
                                                        <span class="ms-2"></span>
                                                    </th>
                                                    <td class="align-middle">
                                                        <span id="r13">Feeding Poultry</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <span id="tm2">6.00AM/ 11.00AM/ 5.00PM</span>
                                                    </td>
                                                </tr>
                                                <tr class="fw-normal">
                                                    <th>
                                                        <span class="ms-2"></span>
                                                    </th>
                                                    <td class="align-middle">
                                                        <span id="r14">Feeding Goats</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <span id="tm3">7.00AM/ 1.30PM/ 5.30PM</span>
                                                    </td>
                                                </tr>
                                                <tr class="fw-normal">
                                                    <th>
                                                        <span class="ms-2" id="r21">Health Assistant</span>
                                                    </th>
                                                    <td class="align-middle" id="r15">Cattle/Poultry Health Check</td>
                                                    <td class="align-middle">
                                                        <span id="tm4">6.00AM / 6.00PM</span>
                                                    </td>
                                                </tr>
                                                <tr class="fw-normal">
                                                    <th>
                                                        <span class="ms-2"></span>
                                                    </th>
                                                    <td class="align-middle" id="r16">Goats Health Check</td>
                                                    <td class="align-middle">
                                                        <span id="tm5">12.00PM / 7.30PM</span>
                                                    </td>
                                                </tr>
                                                <tr class="fw-normal">
                                                    <th>
                                                        <span class="ms-2" id="r31">Animal Caretaker</span>
                                                    </th>
                                                    <td class="align-middle" id="r17">Cattle & Goat Milking</td>
                                                    <td class="align-middle">
                                                        <span id="tm6">7.00AM & 7.30AM</span>
                                                    </td>
                                                </tr>
                                                <tr class="fw-normal">
                                                    <th>
                                                        <span class="ms-2"></span>
                                                    </th>
                                                    <td class="align-middle" id="r18">Eggs Collecting</td>
                                                    <td class="align-middle">
                                                        <span id="tm7">8.00AM</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <!-- todoolist -->
                </div>


            </div>


        </div>




        <div class="container-fluid mt-5 mb-4">

            <div class="row d-flex justify-content-center">

                <div class="me-2 mt-sm-5 mt-0" style="width: 300px;">
                    <div class="row  ">
                        <div class="card bg-primary-subtle" style="width: 25rem;">
                            <div class="card-body">

                                <?php
                  $rs4 = Database::search("SELECT * FROM `animal` INNER JOIN `animal_type` ON `animal`.`animal_type_id`= `animal_type`.`id` WHERE `type_name` = 'Cattle'");
                  $num4 = $rs4->num_rows;

                  $data1 = array();
                  $json["data"] = $data1;

                  $rs5 = Database::search("SELECT * FROM `animal` INNER JOIN `animal_type` ON `animal`.`animal_type_id`= `animal_type`.`id` WHERE `type_name` = 'Goat'");
                  $num5 = $rs5->num_rows;

                  $rs6 = Database::search("SELECT * FROM `animal` INNER JOIN `animal_type` ON `animal`.`animal_type_id`= `animal_type`.`id` WHERE `type_name` = 'Poultry'");
                  $num6 = $rs6->num_rows;
                  ?>

                                <h5 class="card-title">Number of Animals</h5>

                                <h6 class="card-subtitle mb-1 text-body-secondary mt-1">Cattles: <?php
                                                                                    if ($num4 > 0) {
                                                                                      echo ($num4);
                                                                                    } else {
                                                                                    ?>
                                    0
                                    <?php
                                                                                    }
                    ?></h6>
                                <h6 class="card-subtitle mb-1 text-body-secondary mt-1">Goats: <?php
                                                                                  if ($num5 > 0) {
                                                                                    echo ($num5);
                                                                                  } else {
                                                                                  ?>
                                    0
                                    <?php
                                                                                  }
                    ?></h6>
                                <h6 class="card-subtitle mb-1 text-body-secondary mt-1">Poultry: <?php
                                                                                    if ($num6 > 0) {
                                                                                      echo ($num6);
                                                                                    } else {
                                                                                    ?>
                                    0
                                    <?php
                                                                                    }
                    ?></h6>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="me-2 mt-sm-5 mt-0" style="width: 300px;">
                    <div class="row  ">
                        <div class="card bg-info-subtle" style="width: 25rem;">
                            <div class="card-body">
                                <h5 class="card-title">Daily/Weekly reports</h5>

                                <h6 class="card-subtitle mb-1 text-body-secondary mt-1">Milk Production: 500 liters/day
                                </h6>
                                <h6 class="card-subtitle mb-1 text-body-secondary mt-1">Average weight gain: 0.5Kg/day
                                </h6>
                                <h6 class="card-subtitle mb-1 text-body-secondary mt-1">Average weight gain: 1Kg/day
                                </h6>
                                <!-- <h6 class="card-subtitle mb-1 text-body-secondary mt-1">Poultry:</h6> -->

                            </div>
                        </div>
                    </div>
                </div>

                <div class=" mt-sm-5 mt-0" style="width: 300px;">
                    <div class="row">
                        <div class="card bg-primary-subtle" style="width: 25rem;">
                            <div class="card-body">
                                <h5 class="card-title">Feeding logs</h5>

                                <h6 class="card-subtitle mb-1 text-body-secondary mt-1">July 29: Goat fed with Grains
                                    mix</h6>
                                <span>-> july 29: Goats fed</span>
                                <span>-> July 28: Cows fed</span>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="ms-2 mt-sm-5 mt-0" style="width: 300px;">
                    <div class="row">
                        <div class="card bg-info-subtle" style="width: 25rem;">
                            <div class="card-body">
                                <h5 class="card-title">Helath Overview</h5>

                                <h6 class="card-subtitle mb-1 text-body-secondary mt-1">Upcomming Tasks</h6>
                                <span>-> Vaccination Cows (Due:July 31)</span>
                                <span>-> Inspect barn Cows</span>


                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>



        <!-- carousel -->
        <div class="d-none d-md-block mt-5">
            <div class="col-10 offset-1 mt-3 ">
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <img src="carousel/41.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-light">Poultry</h5>
                                <p class="text-white">
                                    "Poultry refers to domesticated birds that are raised for their meat, eggs, and
                                    feathers.
                                    The most common types of poultry include chickens, turkeys, ducks, geese, and guinea
                                    fowl.
                                    These birds have been a crucial part of human agriculture for thousands of years due
                                    to their
                                    versatility, fast reproduction, and relatively small space requirements compared to
                                    larger livestock like cattle or sheep."
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="10000">
                            <img src="carousel/51.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-light">Goats</h5>
                                <p class="text-white">
                                    "Goats (Capra aegagrus hircus) are domesticated mammals that belong to the family
                                    Bovidae, closely related to sheep and cattle.
                                    They have been raised by humans for thousands of years for their meat, milk, fiber,
                                    and hides. Known for their hardy nature,
                                    goats are highly adaptable and can thrive in a variety of environments, from arid
                                    deserts to high-altitude mountains."
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="10000">
                            <img src="carousel/91.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-light">Cattles</h5>
                                <p class="text-white">
                                    "Cattle are large domesticated ungulates (hoofed animals) that have been raised by
                                    humans for thousands of years primarily for their meat,
                                    milk, leather, and as draft animals. They belong to the species Bos taurus in most
                                    parts of the world, though Bos indicus (zebu) is
                                    more common in tropical regions due to its resistance to heat and disease."
                                </p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- carousel end -->


    </div>
    <br><br><br><br>

    <?php include "footer.php"; ?>

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