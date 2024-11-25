<?php

include "../conn.php";

if (isset($_POST["add_menu_btn"])) {
    $itemname=mysqli_real_escape_string($connection,$_POST['item_name']);
    $itemndesc=mysqli_real_escape_string($connection,$_POST['item_description']);
    $itemcat=mysqli_real_escape_string($connection,$_POST['item_category']);
    $itemprice=mysqli_real_escape_string($connection,$_POST['item_price']);

    $sql="INSERT INTO `menu_items` (`item_id`, `item_name`, `item_img`, `item_desc`, `item price`, `item_category`, `item_date`) VALUES (NULL, '{$itemname}', ' ', '{$itemndesc}', '{$itemprice}', '{$itemcat}', current_timestamp());";
    if (mysqli_query($connection,$sql)) {
       header("Location: ".$path."/admin/pages/add_menu_item.php?status=sub");
    }else{
        header("Location: ".$path."/admin/pages/add_menu_item.php?status=notsub");

    }
}else{
    echo "You are wrong";
}





?>