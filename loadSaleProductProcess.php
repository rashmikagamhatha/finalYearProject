<?php
include "connection.php";


$rs = Database::search("SELECT * FROM `product_stock` INNER JOIN `product_type` ON `product_stock`.`product_type_id` = `product_type`.`id`
                                                         INNER JOIN `production` ON `product_stock`.`production_id` = `production`.`id`
                                                         INNER JOIN `metrics` ON `product_stock`.`metrics_id` = `metrics`.`id`");
$num11 = $rs->num_rows;

if ($num11 > 0) {
    // loadproducts
    // echo("loadCart");


    for ($i = 0; $i < $num11; $i++) {
        $d = $rs->fetch_assoc();
        

?>

        <!-- card -->

        <div class="signup_box col-12 bg-success-subtle rounded-5  mb-3 d-flex justify-content-between">
            <div class="col-8">

                <div class="row d-flex mb-2 mt-3">
                    <h5 class="text-dark fw-bold col-3 ms-3"><?php echo $d["product_name"] ?></h5>
                    <span class="col-2">Available:</span>
                    <h5 class="col-2 text-dark "><?php echo $d["volume"] ?><?php echo $d["m_name"] ?></h5>
                    <h6 class="col-2 text-success ">Unit Price: <span class="text-danger"><?php echo $d["price"] ?>.00</span> </h6>
                    <h6 class="col-2 text-warning  fw-bold text-end"><?php echo $d["exp"] ?></h6>

                </div>

            </div>
            <div class="d-flex align-items-center gap-2">
                <input type="number" id="qty" class="form-control bg-light text-center" style="max-width: 150px;" value="" >
            </div>
            <div class="d-flex align align-items-center">

                <button class="btn btn-danger btn-sm" onclick="addtocart(<?php echo $d['st_id'] ?>);"><i class="bi bi-bookmark-plus"></i></button>
            </div>
        </div>
        <!-- cartbody  -->


<?php

    }
} else {
    echo ("No Product here");
}

?>