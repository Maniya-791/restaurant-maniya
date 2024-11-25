<?php

include "../conn.php";

if (isset($_POST["rbtn"])) {
    $rname=mysqli_real_escape_string($connection,$_POST['rname']);
    $remail=mysqli_real_escape_string($connection,$_POST['remail']);
    $rphone=mysqli_real_escape_string($connection,$_POST['rphone']);
    $rcheck=$_POST['rcheckin'];
    $rtime=mysqli_real_escape_string($connection,$_POST['rtime']);
    $rguest=mysqli_real_escape_string($connection,$_POST['rguest']);

    $sql="INSERT INTO `reservations` (`reservation_id`, `name`, `email`, `contact_number`, `check_in_date`, `check_in_time`, `number_of_guests`, `created_at`) VALUES (NULL, '{$rname}', '{$remail}', '{$rphone}', '{$rcheck}', '{$rtime}', '{$rguest}', current_timestamp());";
    if (mysqli_query($connection,$sql)) {
        header("Location: ".$path."index.php?resalert=submit");
    }else{
        header("Location: ".$path."index.php?resalert=notsubmit");

    }
}


?>