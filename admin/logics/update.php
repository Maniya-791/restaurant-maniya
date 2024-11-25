<?php

include "../conn.php";

if (isset($_POST['item_id'])) {
    $itemid=$_POST['item_id'];
    $itemname=$_POST['item_name'];
    $itemcate=$_POST['item_category'];
    $itemdesc=$_POST['item_description'];
    $itemprice=$_POST['item_price'];



    $sql="UPDATE `menu_items` SET `item_name` = '{$itemname}', `item_img` = '', `item_desc` = '{$itemdesc}', `item price` = '{$itemprice}', `item_category` = '{$itemcate}' WHERE `menu_items`.`item_id` = '{$itemid}';";
    if (mysqli_query($connection,$sql)) {
        header("Location: ".$path."admin/pages/total_menu.php");
    }else{
        echo "unsubmit";
    }
}


?>