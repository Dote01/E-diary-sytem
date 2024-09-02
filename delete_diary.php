<?php
//database connection
include("db_connection.php");

//get id
$entry_id = $_GET['entry_id'];

//deleting query
$delete = "DELETE FROM entry WHERE entry_id = '".$entry_id."' ";
$result = $db->query($delete);

if(!$result){
    echo "Error: $db->error";
    echo "<br>There was an error with deleting the diary";

} else {
    header("Location:create_diary.php");
}

?>