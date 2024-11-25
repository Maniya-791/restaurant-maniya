<?php
include("../conn.php");
if (isset($_POST['editresbtn'])) {
    $res_id=$_POST['reservation_id'];
    $res_name=$_POST['name'];
    $res_email=$_POST['email'];
    $res_contact=$_POST['contact_number'];
    $res_date=$_POST['check_in_date'];
    $res_time=$_POST['check_in_time'];
    $res_guests=$_POST['number_of_guests'];

    $query="UPDATE `reservations` SET `name` = '{$res_name}', `email` = '{$res_email}', `contact_number` = '{$res_contact}', `check_in_date` = '{$res_date}', `check_in_time` = '{$res_time}', `number_of_guests` = '{$res_guests}' WHERE `reservations`.`reservation_id` = '{$res_id}';";
    if (mysqli_query($connection,$query)) {
        header("Location: ".$path."admin/pages/reservation.php");
    }
}else{
    echo "You are scammer";
}
?>