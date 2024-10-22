<?php
include "connection.php";
session_start();
$user = $_SESSION["u"];

if (isset($_SESSION["u"])) {
    $rs = Database::search("SELECT * FROM `employee`  WHERE `emp_id` = '" . $user["emp_id"] . "'");
    $d = $rs->fetch_assoc();

    if ($d["position_id"] == '1' || $d["position_id"] == '3') {
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Feeding Reminder</title>
            <script src="script.js" defer></script>
            <link rel="stylesheet" href="bootstrap.min.css">
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
            <link rel="icon" href="resources/harvest_11296852.png">
        </head>

        <body class="backgroundImg">

            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="container mt-3">
                        <a href="reminder.php"><img src="resources/back.png" height="50" ;></a>
                    </div>

                    <div class="col-12 mt-5 mb-3 d-flex justify-content-center">
                        <a class="text-decoration-none text-success-emphasis fs-3 fw-bold">Add Feeding Reminder</a>
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
                                        <form id="reminderForm1">
                                            <input class="col-3" type="text" id="message" placeholder="Message" required>
                                            <input class="col-3" type="date" id="reminderDate" required>
                                            <input class="col-3" type="time" id="reminderTime" required>
                                            <button class="col-2" type="submit">Add New Reminder</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- signupbox  -->

                    </div>

                    <h2>Your Reminders</h2>

                    <div class="text-bg-danger text-dark fw-bold" id="remindersList"></div>
                </div>



                <div class="d-none" id="msgDiva">
                    <div id="msga"></div>
                </div>

            </div>



            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script src="bootstrap.bundle.min.js"></script>
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