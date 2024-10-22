<?php

include "connection.php";
session_start();
$cus = $_SESSION["sc"];

$rs = Database::search("SELECT * FROM `order_history` WHERE `customer_id` = '" . $cus["id"] . "'");
$num = $rs->num_rows;

if ($num > 0) {
    // echo("succ");

    $d = $rs->fetch_assoc();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>invoice</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.min.css" />
    </head>

    <body class="bg-secondary ">

        <br><br><br>

        <div class="container mt-3">
            <button onclick="finish();" class="btn "><a href="saleproduct.php"><img src="resources/back.png" height="50" ></a></button>
            
        </div>

        <br><br>
        <div class="container mt-2 mb-4 ">
            <div class="border border-3 border-black bg-white p-4 rounded-4 align-items-center col-12" id="printAr">
                <div class="row">
                    <div class="col-6">
                        <h3>Order Id #<?php echo $d["customer_id"] ?></h3>
                        <h5><?php echo $d["order_date"] ?></h5>
                    </div>
                    <div class="col-6 text-end">
                        <h1 class="fw-bold ">INVOICE REPORT</h1>
                        <h4 class="text-decoration-underline">LezaFarming</h4>
                        <h5>Kandy</h5>
                        <h5>Silanka</h5>
                        <h5>Tel: 0763221113</h5>
                    </div>

                </div>
                <div>
                    <h4><?php echo $cus["name"] ?></h4>
                    <h5><?php echo $cus["mobile"] ?></h5>
                    <h5><?php echo $cus["company_name"] ?></h5>
                </div>

                <div class="ps-5 pe-5 mt-5 col-sm-4 col-6 col-md-12">
                    <table class="table table-hover border border-1 border-black">
                        <thead>
                            <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $rs2 = Database::search("SELECT * FROM `order_item` INNER JOIN `product_stock` ON `order_item`.`product_stock_st_id` = `product_stock`.`st_id`
                                                                                    INNER JOIN `production` ON `product_stock`.`production_id` = `production`.`id`
                                                                                    INNER JOIN `product_type` ON `production`.`product_type_id` = `product_type`.`id`
                                                                                     WHERE `order_item`.customer_id = '" . $cus["id"] . "'");

                            $num2 = $rs2->num_rows;

                            for ($i = 0; $i < $num2; $i++) {
                                $d2 = $rs2->fetch_assoc();
                            ?>
                                <tr>
                                    <td><?php echo $d2["product_name"] ?></td>
                                    <td><?php echo $d2["type"] ?></td>
                                    <td><?php echo $d2["oi_qty"] ?></td>
                                    <td>Rs.<?php echo ($d2["price"] * $d2["oi_qty"]) ?></td>
                                </tr>
                            <?php
                            }

                            ?>

                        </tbody>

                    </table>

                </div>
                <div class="text-end mt-5 pe-5">
                    <h6>Number Of Items: <span class="text-muted"><?php echo $num2 ?></span></h6>
                    <h6>Net Total: <span class="text-muted"><?php echo $d["amount"] ?></span></h6>
                </div>

            </div>
            <div class="d-flex justify-content-end container mt-5 mb-5">
                <button class="btn btn-outline-warning col-2 me-1" onclick="printDiv();">Print</button>
            </div>

        </div>




        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="script.js"></script>
    </body>

    </html>
<?php

} else {
    header("location: dashboard.php");
}


?>