<?php

// Establish a database connection
$connection = mysqli_connect("localhost", "root", "", "cooking");

// Check if the form was submitted via the "signupbtn" button
if (isset($_POST["fullname"])) {

    // Sanitize and assign POST variables
    $fname = mysqli_real_escape_string($connection, $_POST["fullname"]);
    $email = mysqli_real_escape_string($connection, $_POST["useremail"]);
    $pass = md5($_POST["userpassword"]);  // Hash the password using md5 (consider using a stronger hash function in production)

    // Query to check if the email already exists in the database
    $duplicate_email_sql = "SELECT COUNT(*) AS emailsno FROM user WHERE user_ep='{$email}'";
    $desql = mysqli_query($connection, $duplicate_email_sql);
    $derow = mysqli_fetch_assoc($desql);

    // Check if email already exists
    if ($derow['emailsno'] == 0) {
        // Insert new user data into the database
        $sql = "INSERT INTO `user` (`user_id`, `user_name`, `user_ep`, `user_pass`, `user_status`, `user_date`) VALUES (NULL, '{$fname}', '{$email}', '{$pass}', '0', current_timestamp())";

        // Execute the insert query and check if successful
        if (mysqli_query($connection, $sql)) {
            // Send a JSON response indicating success
            echo json_encode(['status' => 'success', 'message' => 'Signup']);
            // header("Location: http://localhost/cooking/admin/index.php");
        } else {
            // Send a JSON response indicating a database error
            echo json_encode(['status' => 'error', 'message' => 'Database error, please try again later.']);
        }
    } else {
        // Send a JSON response indicating the email already exists
        echo json_encode(['status' => 'error', 'message' => 'Email already exists.']);
    }
}elseif (isset($_POST['loginbtn'])) {
    $username=mysqli_real_escape_string($connection,$_POST['username']);
    $pwd=md5($_POST['password']);


    $logisql="SELECT * FROM user WHERE user_ep='{$username}' AND user_pass='{$pwd}'";
    $logindata=mysqli_query($connection,$logisql);
    if (mysqli_num_rows($logindata)>0) {
        session_start();
        while ($loginrow=mysqli_fetch_assoc($logindata)) {
            
            $_SESSION["status"]=$loginrow["user_status"];
            $_SESSION["name"]=$loginrow["user_name"];

        }

        if ($_SESSION["status"]=="1") {
            
            header("Location: http://localhost/cooking/admin/d.php");
        }else{
            header("Location: http://localhost/cooking/");

        }
    }else{
        header("Location: http://localhost/cooking/admin/");
    }
    exit();
}else {
    // Send a JSON response indicating a form submission error (e.g., form fields are empty)
    echo json_encode(['status' => 'error', 'message' => 'Check Field Empty']);
}




?>
