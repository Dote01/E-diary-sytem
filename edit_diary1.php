<?php
//database connection
include("db_connection.php");



    //variables declaration
    $heading = $_POST['heading'];
    $content = $_POST['content'];
    $entry_id = $_POST['entry_id'];

    //updating the details at the database
    $update = "UPDATE entry SET title = '".$heading."', content = '".$content."' WHERE entry_id = '".$entry_id."'";
    $updateResult = $db->query($update);

    if(!$updateResult){
        echo "Error: $db->error";
        echo "<br>There was an error with updating the diary details please try agian later";
    } else {
        header("Location:create_diary.php");
    }

?>