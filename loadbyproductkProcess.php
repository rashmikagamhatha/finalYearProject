<?php
include "connection.php";

$rs = Database::search("SELECT * FROM `by_products` INNER JOIN `animal_type` ON `by_products`.`animal_type_id` = `animal_type`.`id` 
                                                       ORDER BY `by_products`.`by_id` ASC");

$num = $rs->num_rows;

for ($i=0; $i < $num; $i++) { 
    $d = $rs->fetch_assoc();

    ?>
    
    <tr>
        <th class="bg-success-subtle" scope="row" id="s_id"><?php echo $d["by_id"] ?></th>
        <td class="bg-success-subtle"><?php echo $d["type_name"] ?></td>
        <td class="bg-success-subtle"><?php echo $d["name"] ?></td>
        <td class="bg-success-subtle"><?php echo $d["volume"] ?></td>
        <td class="bg-success-subtle"><?php echo $d["price"] ?>.00</td>

    </tr>
    
    
    <?php
}
?>