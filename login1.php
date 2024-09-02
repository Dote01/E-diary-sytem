<?php
//database connection
include("db_connection.php");

//session
session_start();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System|Login</title>
    <style>
        body {
  font-family: Arial, sans-serif;
  text-align: center;
}

form {
  border: 1px solid #ccc;
  padding: 20px;
  width: 300px;
  margin: 0 auto;
}

h1 {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  border:1px solid #ccc;
  border-radius: 3px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 3px;
  cursor: pointer;  

}

a {
  text-decoration:none;
  color:#333;
}
    </style>

</head>
<body>
    <h1>System|Login</h1>
    <form action="login.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username">
    <br><br>
    <label for="password">Password</label>
    <input type="password" name="password">
    <br><br>
    <input type="submit" value="Login">
    <br>
    <p>Not a Member <a href="register.html">Sign Up</a></p> 
</form>
</body>
</html>