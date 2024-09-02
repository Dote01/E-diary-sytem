<?php
//variables initialization
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];


$new_password = password_hash($password, PASSWORD_DEFAULT);

//database connection
include("db_connection.php");

//inserting data to database table
$query = "INSERT INTO users(username, password, email, role) VALUES ('".$username."','".$new_password."', '".$email."', 'Student')";
$result = $db->query($query);

if(!$result){
    echo "$db->error";
    echo "There was an error with storing data to the database please try again letter";
} else {
    header("Location:home.php");
}


?>