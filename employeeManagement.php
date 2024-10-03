<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

if (isset($_SESSION["u"])) {

  $rs = Database::search("SELECT * FROM `employee`  WHERE `emp_id` = '" . $user["emp_id"] . "'");
  $d = $rs->fetch_assoc();

  if ($d["position_id"] == '1') {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Employee Management</title>
      <link rel="stylesheet" href="bootstrap.min.css">
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
      <link rel="icon" href="resources/harvest_11296852.png">
    </head>

    <body class="backgroundImg" onload="loadUser();">

      <!-- navbar  -->
      <?php include "adminNavbar.php"; ?>
      <!-- navbar  -->

      <div class="container-fluid">
        <br><br><br>
        <div class=" row d-flex justify-content-center ">

          <div class="container mt-3">
            <a href="dashboard.php"><img src="resources/back.png" height="50" ;></a>
          </div>

          <!-- category name -->
          <div class="col-12 mt-2 mb-3">
            <a class="text-decoration-none link-dark fs-3 fw-bold">Employee Details List</a>
            &nbsp;&nbsp;
            <a class="text-decoration-none link-dark fs-6">All Employees &nbsp;&rarr;</a>
          </div>
          <!-- category name end-->
          <div class="col-8">
            <div class="d-none" id="md" onclick="reload();">
              <div class="alert alert-danger" id="m"></div>
            </div>
          </div>

          <div class="row d-flex justify-content-end mt-4 mb-4">



            <div class="col-2">
              <input type="text" class="form-control bg-dark-subtle " placeholder="User Id" id="uid" />
            </div>

            <!-- <button class="btn btn-outline-secondary col-1 me-2" onclick="updateUserStatus();"><i class="bi bi-pencil-square"></i></button> -->
            <i class="col-1 me-2 btn btn-outline-danger bi bi-pencil-square fw-bold" onclick="updateUserStatus();"> Status</i>
            <!-- <button class="btn btn-outline-secondary col-1 " onclick="deleteUser();">Delete User</button>
              -->
              <i class="col-1 me-2 btn btn-outline-danger bi bi-trash fw-bold" onclick="deleteUser();"></i>
          </div>

          <div class="col-4 col-md-8 mb-3" id="printAr">
            <h2 class="text-center mb-2 fw-bold">Employee Report</h2>
            <br>
            <div class="row">
              <table class="table">
                <thead>
                  <tr>
                    <th class="bg-dark-subtle">Employee Id</th>
                    <th class="bg-dark-subtle">First Name</th>
                    <th class="bg-dark-subtle">Last Name</th>
                    <th class="bg-dark-subtle">Position</th>
                    <th class="bg-dark-subtle">Mobile</th>
                    <th class="bg-dark-subtle">Email</th>
                    <th class="bg-dark-subtle">Status</th>
                  </tr>
                </thead>
                <tbody id="tb">
                  <!-- Table Row  -->

                  <!-- Table Row  -->

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-end container mt-5 mb-5">
      <i class="btn btn-outline-danger fw-bold col-1 bi bi-printer" onclick="printDiv();"></i>
        <!-- <button class="btn btn-outline-dark col-2" onclick="printDiv();">print</button> -->
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