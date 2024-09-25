<?php

include "connection.php";

$rs = Database::search("SELECT * FROM `animal` INNER JOIN `animal_type` ON `animal`.`animal_type_id` = `animal_type`.`id` 
                                                  INNER JOIN `color` ON `animal`.`color_id` = `color`.`id`
                                                  INNER JOIN `breed` ON `animal`.`breed_id` = `breed`.`id` 
                                                  INNER JOIN `health_status` ON `animal`.`health_status_id` = `health_status`.`id`
                                                   WHERE `animal_type_id` = '1' ORDER BY `animal`.`an_id` ASC");
$num = $rs->num_rows;

for ($i = 0; $i < $num; $i++) {
    $d = $rs->fetch_assoc();

?>

    <tr>
        <th class="bg-dark-subtle" scope="row"><?php echo $d["an_id"] ?></th>
        <td class="bg-dark-subtle"><?php echo $d["type_name"] ?></td>
        <td class="bg-dark-subtle"><?php echo $d["color_name"] ?></td>
        <td class="bg-dark-subtle"><?php echo $d["weight"] ?></td>
        <td class="bg-dark-subtle"><?php echo $d["age"] ?></td>
        <td class="bg-dark-subtle"><?php echo $d["breed_name"] ?></td>
        <td class="bg-dark-subtle"><?php echo $d["health_name"] ?></td>

    </tr>
<?php
}

?>