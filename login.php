<?php

session_start();

//variables initialization
$username = $_POST['username'];
$password = $_POST['password'];

//database connection
include("db_connection.php");

//fetch password from database
$query = "SELECT * FROM users WHERE username = '".$username."'";
 $result = $db->query($query);

if(!$result){
    echo "$db->error";
    echo "</br>There was an error with fetching password, please try again later";
}


//fetching hashed password
if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    }

    if(password_verify($password, $row['password'])){
            header("Location:home.php");

            $_SESSION['role'] = $row['role'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['user_id'];
             }





/*
$real_password = password_verify($password, PASSWORD_DEFAULT);

//database connection
include("db_connection.php");

//inserting data to database table
$query = "INSERT INTO users VALUES ('".$username."','".$new_password."', '".$email."')";
$result = $db->query($query);

if(!$result){
    echo "$db->error";
    echo "</br>There was an error with storing data to the database";
} else {
    header("Location:home.php");
}
*/

?>