<?php

include "connection.php";
session_start();
$cus = $_SESSION["sc"];
$netTotal = 0;

$rs = Database::search("SELECT * FROM `cart` INNER JOIN `product_stock` ON `cart`.`product_stock_st_id` = `product_stock`.`st_id` 
                        INNER JOIN  `production` ON `product_stock`.`production_id` = `production`.`id` WHERE `cart`.`customer_id` = '" .$cus["id"] . "'");


$num = $rs->num_rows;

if ($num > 0) {
    // load cart 
    // echo ("loard cart");
?>

    <!-- cartloadhere -->
    <div class="mb-4 mt-4">
        <h3 class="text-light text-center fw-bold">Leza Customer Cart</h3>
    </div>

    <div class="col-12 mb-4">
        <hr>
    </div>

    <?php

    for ($i = 0; $i < $num; $i++) {
        $d = $rs->fetch_assoc();
        $total = $d["price"] * $d["cart_qty"];
        $netTotal += $total;

    ?>

        <div class="signup_box col-12 bg-secondary rounded-5 p-3 mb-4 d-flex justify-content-between">
            <div class="d-flex align-items-center col-5">
                <div class="ms-5">
                    <h3 class="text-light"><?php echo $d["product_name"]?></h3>
                    <p class="text text-danger-emphasis fw-bold" ><?php echo $d["exp"] ?></p>
                    <h5 class="text-info" ><?php echo $d["price"] ?>.00</h5>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                <button class="btn btn-dark btn-sm" onclick="incrementCartQty('<?php echo $d['cart_id'] ?>')">+</button>
                <input type="number" id="qty<?php echo $d['cart_id'] ?>" class="form-control text-center" style="max-width: 100px;" value="<?php echo $d["cart_qty"] ?>" disabled>
                <button class="btn btn-dark btn-sm" onclick="decrementCartQty('<?php echo $d['cart_id'] ?>')">-</button>
            </div>
            <div class="d-flex align-items-center">
                <h4 class="fw-bold">Total: <span class="text-light">Rs: <?php echo $total ?>.00</span></h4>
            </div>
            <div class="d-flex align align-items-center">
                <a href=""><img src="resources/cancelicon.png" onclick="removeCart('<?php echo $d['cart_id'] ?>');" height="30"></a>
            </div>
        </div>
        <!-- cartbody  -->



    <?php
    }
    ?>

    <div class="col-12 mt-4">
        <hr>
    </div>

    <!-- checkout -->

    <div class="d-flex flex-column align-items-end">
        <h6>Number of Items: <span class="fw-bold text-info"><?php echo $num ?></span></h6>
        <h3>Net Total: <span class="fw-bold text-warning">Rs: <?php echo ($netTotal) ?>.00</span></h3>
        <button class="btn btn-outline-light col-3 mt-3 mb-4" onclick="checkOutbuy(<?php echo ($netTotal) ?>);">CHKECKOUT</button>
    </div>

    <!-- checkout -->

<?php
} else {
?>
    <!-- emptybutton -->
    <div class="col-12 text-center mt-5">
        <h2 class="fw-bold">Cart is Empty!</h2>
        <a href="saleproduct.php" class="btn btn-outline-info">Start Selling</a>
    </div>
    <!-- emptybutton -->
<?php
}

?>