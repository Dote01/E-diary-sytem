<?php
//session control 
session_start();


//database connectin
include("db_connection.php");

    $username = $_SESSION['username'];

    $email = $_GET['email'];
    $password = $_GET['password'];

 //password hashing
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    //updation query 
    $update_details = "UPDATE users SET email = '".$email."', password = '".$password_hash."' WHERE username = '".$username."'";
    $update_result = $db->query($update_details);

    if(!$update_result){
        echo "Error: $db->error";
        echo "<br> There was an error with updating the profile details please try again later";
    } else {
        header("Location: home.php");
    }

?>


?>