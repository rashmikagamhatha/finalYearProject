<?php
include "connection.php";

$rs = Database::search("SELECT * FROM `feeding_manage` INNER JOIN `animal_type` ON `feeding_manage`.`animal_type_id` = `animal_type`.`id` 
                                                            INNER JOIN `food_type` ON `feeding_manage`.`food_type_id` = `food_type`.`id`
                                                            ORDER BY `feeding_manage`.`f_id` ASC");

$num = $rs->num_rows;

for ($i=0; $i < $num; $i++) { 
    $d = $rs->fetch_assoc();

    ?>
    
    <tr>
        <th class="bg-success-subtle" scope="row" id="f_id"><?php echo $d["f_id"] ?></th>
        <td class="bg-success-subtle"><?php echo $d["type_name"] ?></td>
        <td class="bg-success-subtle"><?php echo $d["type"] ?></td>
        <td class="bg-success-subtle"><?php echo $d["food_names"] ?></td>
        <td class="bg-success-subtle"><?php echo $d["time1"] ?></td>
        <td class="bg-success-subtle"><?php echo $d["time2"] ?></td>

    </tr>
    
    
    <?php
}
?>