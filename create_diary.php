<?php
include("db_connection.php");

//start session
session_start();

$user_name = $_SESSION['username'];

//reading the contents from the database
$read = "SELECT * FROM entry WHERE username = '".$user_name."' ";
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

    //database insertion

$insert = "INSERT INTO entry(title,content,username) VALUES('".$title."', '".$content."', '".$user_name."')";
$insertResult = $db->query($insert);

if(!$insertResult){
    echo "There was a problem with saving your diary please try again later";
} else {
    header("Location:create_diary.php");
}
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
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            margin-top: 20px;
            font-size: 2.5em;
            color: #333;
        }
        .container {
            width: 80%;
            max-width: 800px;
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        form {
            width: 100%;
        }
        label {
            font-size: 1.2em;
            margin-bottom: 10px;
            display: block;
            color: #555;
        }
        textarea {
            width: 96%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
            resize: vertical;
        }
        input[type="submit"] {
            padding: 10px 20px;
            font-size: 1.2em;
            color: #fff;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .entries {
            margin-top: 20px;
            width: 100%;
        }
        .entry {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
        .entry a {
            color: #007bff;
            text-decoration: none;
            margin: 0 10px;
            transition: color 0.3s ease;
        }
        .entry a:hover {
            color: #0056b3;
        }
        .back-button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1em;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Create Diary</h1>

    <center> <form action="create_diary.php" method="POST">
       <table border="1px solid black">
            <tr>
                <td>
                    <label for="heading">Heading</label>
                </td>
                <td>
                    <textarea cols="50" name="heading" placeholder="Enter heading of your diary" id="input"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="content">Content</label>
                </td>
                <td>
                    <textarea cols="50" rows="10" name="content" placeholder="Enter content of your diary" id="input"></textarea>
                </td>
            </tr>
            <tr>
         <td colspan="2">
            <center><input type="submit" value="Save"></center> 
        </td>
            </tr>
        </table>

    </form>
    </center>
<br><br><br>
    <table border="1px solid black">
        <?php foreach($fetchedData as $row): ?>
<tr>
    <td>
<?php echo $row['title'] ?>
    </td>
</thead>

</td> 
<td>
<a href="view_diary.php?entry_id=<?php echo $row['entry_id'] ?>">View | </a>
<a href="delete_diary.php?entry_id=<?php echo $row['entry_id'] ?>">Delete</a>
</td>
</tr>
<?php endforeach ?>
    </table>
<br><br>
    <button onclick="history.back()">Back</button>
</body>
</html>