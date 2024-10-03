<?php
include "connection.php";

$rs = Database::search("SELECT * FROM `food_stock` INNER JOIN `food_type` ON `food_stock`.`food_type_id` = `food_type`.`id` INNER JOIN `supplier` ON `food_stock`.`supplier_mobile` = `supplier`.`mobile`");

$num = $rs->num_rows;

for ($i=0; $i < $num; $i++) { 
    $d = $rs->fetch_assoc();

    ?>

<tr>
    <th class="bg-dark-subtle" scope="row"><?php echo $d["id"] ?></th>
    <td class="bg-dark-subtle"><?php echo $d["f_name"] ?></td>
    <td class="bg-dark-subtle"><?php echo $d["type"] ?></td>
    <td class="bg-dark-subtle"><?php echo $d["qty"] ?></td>
    <td class="bg-dark-subtle"><?php echo $d["date"] ?></td>
    <td class="bg-dark-subtle"><?php echo $d["cost"] ?>.00</td>
    <td class="bg-dark-subtle"><?php echo $d["mobile"] ?></td>

</tr>


<?php
}
?>