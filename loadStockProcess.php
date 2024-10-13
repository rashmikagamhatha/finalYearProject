<?php
include "connection.php";

$rs = Database::search("SELECT * FROM `product_stock` INNER JOIN `product_type` ON `product_stock`.`product_type_id` = `product_type`.`id` 
                                                         INNER JOIN `production` ON `product_stock`.`production_id` = `production`.`id`
                                                         INNER JOIN `metrics` ON `product_stock`.`metrics_id` = `metrics`.`id` ORDER BY `product_stock`.`st_id` ASC");

$num = $rs->num_rows;

for ($i=0; $i < $num; $i++) { 
    $d = $rs->fetch_assoc();

    ?>
    
    <tr>
        <th class="bg-success-subtle" scope="row" id="s_id"><?php echo $d["st_id"] ?></th>
        <td class="bg-success-subtle"><?php echo $d["type"] ?></td>
        <td class="bg-success-subtle"><?php echo $d["product_name"] ?></td>
        <td class="bg-success-subtle"><?php echo $d["volume"] ?> <?php echo $d["m_name"] ?></td>
        <td class="bg-success-subtle"><?php echo $d["price"] ?>.00</td>
        <td class="bg-success-subtle"><?php echo $d["mfd"] ?></td>
        <td class="bg-success-subtle"><?php echo $d["exp"] ?></td>

    </tr>
    
    
    <?php
}
?>