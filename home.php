<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//database connection
include("db_connection.php");

//start session
session_start();



if($_SESSION['role'] !== 'Student'){
    header("Location:login1.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Diary|Home Page</title>
<style>
    *{
        padding: 0;
        margin: 0;
    }
    h1{
        text-align: center;
    }
#logout-button{
    position: absolute;
    bottom: 0;
    text-decoration: none;
    background: blue;
    color: white;
    padding: 10px;
    border-radius: 25px;
    

}
.logout-button{
    background-color: blue;
}

nav li{
    display: inline-block;
    background: black;
    padding: 10px;



}

nav li a{
    text-decoration: none;
    color: whitesmoke;

}

nav li:hover{
    background: white;
}

nav li a:hover{
    background: white;
    color: black;
}
 
.nav-container{
    width: 100%;
}
body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        nav {
            width: 100%;
            background-color: #333;
            overflow: hidden;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }
        nav li {
            display: inline;
        }
        nav li a {
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        nav li a:hover {
            background-color: #575757;
        }
        h1 {
            margin-top: 20px;
            font-size: 2.5em;
            text-align: center;
        }
        .welcome {
            margin-top: 20px;
            font-size: 1.2em;
            text-align: center;
        }
        #logout-button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1em;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        #logout-button:hover {
            background-color: #0056b3;
        }
</style>
</head>
<body>
    <div class="nav-container">
    <nav>
        <ul>
    <li><a href="home.php">Home</a></li>
    <li><a href="create_diary.php">Create Diary</a></li>
    <li><a href="profile_management.php?username=<?php echo $_SESSION['username'] ?>">Profile</a></li>
    <li><a href="logout.php">Logout</a></li>
    </ul>
    </nav>
    </div>
    <h1>Diary|Home Page</h1>
</body>
</html>


<html>
    <h3>Welcome <?php
echo $_SESSION['username'];
    ?>
    </h3>
    <center><a href="logout.php" id="logout-button">Logout</a></center>
</html>