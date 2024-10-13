<?php

include "connection.php";

$rs = Database::search("SELECT * FROM `employee` INNER JOIN `position` ON `employee`.`position_id` = `position`.`id` ORDER BY `employee`.`emp_id` ASC");
$num = $rs->num_rows;

for ($i = 0; $i < $num; $i++) {
    $d = $rs->fetch_assoc();

?>

    <tr>
        <th class="bg-dark-subtle" scope="row"><?php echo $d["emp_id"] ?></th>
        <td class="bg-dark-subtle"><?php echo $d["fname"] ?></td>
        <td class="bg-dark-subtle"><?php echo $d["lname"] ?></td>
        <td class="bg-dark-subtle"><?php echo $d["position_name"] ?></td>
        <td class="bg-dark-subtle"><?php echo $d["mobile"] ?></td>
        <td class="bg-dark-subtle"><?php echo $d["email"] ?></td>
        <td class="bg-dark-subtle"><?php

            if ($d["status"] == 1) {
                echo ("Active");
            } else {
                echo ("Deactivate");
            }


            ?></td>
    </tr>
<?php
}

?>