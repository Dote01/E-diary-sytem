<?php
include("db_connection.php");

//start session
session_start();

$user_name = $_SESSION['username'];
$entry_id = $_GET['entry_id'];

//reading the contents from the database
$read = "SELECT * FROM entry WHERE username = '".$user_name."' AND entry_id = '".$entry_id."' ";
$result = $db->query($read);

if(!$result){
    echo "Error: $db->error";
    echo "<br> There was an error during data retrieval at the diary";
}

$fetchedData = array();
while ($row = $result->fetch_assoc()){
    $fetchedData[] = $row;
}

//posting the details
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['heading'];
    $content = $_POST['content'];
}
echo $username;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Diary</title>
    <style>
        label{
            font-size: x-large;
            font-weight: bolder;
        }
        h1{
            text-align: center;
        }

        table{
            border-collapse: collapse;

        }
        #input{
            border: none;
        }
        textarea{
            border: none;
            outline: none;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>View Diary</h1>


    <table border="1px solid black">
        <?php foreach($fetchedData as $row): ?>
<thead>
    <td>
<?php echo $row['title'] ?>
    </td>
    <td>
        <?php echo $row['date_created']; ?>
    </td>
</thead>
<tr>
<td rowspan="2">

</td>   
<td>
    <?php echo $row['content'] ?>
    </td>
</tr>
<tr>

<td>
<a href="edit_diary.php?entry_id=<?php echo $row['entry_id'] ?>">Edit | </a>
<a href="delete_diary.php?entry_id=<?php echo $row['entry_id'] ?>">Delete</a>
</td>
</tr>
<?php endforeach ?>
    </table>
<br><br>
    <button onclick="history.back()">Back</button>
</body>
</html>