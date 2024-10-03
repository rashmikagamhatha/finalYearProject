<?php
include "connection.php";

$rs = Database::search("SELECT * FROM `supplier` INNER JOIN `company` ON `supplier`.`company_id` = `company`.`id`");

$num = $rs->num_rows;

for ($i=0; $i < $num; $i++) { 
    $d = $rs->fetch_assoc();

    ?>
    
    <tr>
        <th class="bg-dark-subtle" scope="row"><?php echo $d["mobile"] ?></th>
        <td class="bg-dark-subtle"><?php echo $d["name"] ?></td>
        <td class="bg-dark-subtle"><?php echo $d["email"] ?></td>
        <td class="bg-dark-subtle"><?php echo $d["c_name"] ?></td>

    </tr>
    
    
    <?php
}
?>