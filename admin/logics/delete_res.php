<?php

include "../conn.php";

if (isset($_GET['id'])) {
    
    $resid=$_GET['id'];

    $sql="DELETE FROM `reservations` WHERE reservation_id='{$resid}'";
    if (mysqli_query($connection,$sql)) {
        header("Location: ".$path."admin/pages/reservation.php?error=delete");
    }else{
        header("Location: ".$path."admin/pages/reservation.php?error=notdelete");
        
    }
}

?>