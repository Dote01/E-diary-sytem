<?php
//connection variables
$hostname = "localhost";
$usr = "root";
$pass = "";
$database = "diary";

$db = new mysqli($hostname, $usr, $pass, $database);

if(!$db){
    echo "There was an error with the database connectoin please try again later";
}

?>