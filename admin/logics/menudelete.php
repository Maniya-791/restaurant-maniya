<?php

include "../conn.php";

if (isset($_GET['id'])) {
    
    $menucardid=$_GET['id'];

    $sql="DELETE FROM `menu_items` WHERE item_id='{$menucardid}'";
    if (mysqli_query($connection,$sql)) {
        header("Location: ".$path."admin/pages/total_menu.php?error=delete");
    }else{
        header("Location: ".$path."admin/pages/total_menu.php?error=notdelete");
        
    }
}

?>