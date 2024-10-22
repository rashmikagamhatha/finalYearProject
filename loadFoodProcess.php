<?php
include "connection.php";

$rs = Database::search("SELECT * FROM `food_stock` ");

$num = $rs->num_rows;

for ($i=0; $i < $num; $i++) { 
    $d = $rs->fetch_assoc();

    ?>
    
    <tr>
        <th class="bg-dark-subtle" scope="row"><?php echo $d["id"] ?></th>
        <td class="bg-dark-subtle"><?php echo $d["f_name"] ?></td>
        <td class="bg-dark-subtle"><?php echo $d["qty"] ?></td>
        <td class="bg-dark-subtle"><?php echo $d["date"] ?></td>
        <td class="bg-dark-subtle"><?php echo $d["cost"] ?>.00</td>
    </tr>
    
    
    <?php
}
?>