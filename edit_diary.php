<?php
//database connection
include("db_connection.php");

//getting an id
$entry_id = $_GET['entry_id'];

//fetching current contents by using an id
$fetch = "SELECT * FROM entry WHERE entry_id = '".$entry_id."'";
$result = $db->query($fetch);

if(!$result){
    echo "Error: $db->error";
    echo "<br> There was an error with fetching the diary details";
}

$fetchedData = array();
while($row = $result->fetch_assoc()){
    $fetchedData[] = $row;

    $title = $row['title'];
    $content = $row['content'];
    

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Diary</title>
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
            width: 100%;
            height: auto;
            display: flex;
            flex-wrap: wrap;
            outline: none;
        }
        textarea{
            border: none;
            outline: none;
        }
        a{
            text-decoration: none;
        }
        #content{
            width: 100%;
            outline: none;
            height: 300px;
        }
    </style>
</head>
<body>
<h1>Edit Diary</h1>

<center> <form action="edit_diary1.php" method="POST">
   <table border="1px solid black">
        <tr>
            <td>
                <label for="heading">Heading</label>
            </td>
            <td>
                <input type="text" name="heading" placeholder="Enter heading of your diary" id="input" value= "<?php echo $title;  ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="content">Content</label>
            </td>
            <td>
                <input type = "text"  id="content" name="content" placeholder="Enter content of your diary" id="input" value ="<?php echo $content ?>" >
            </td>
        </tr>
        <tr>
     <td colspan="2">
        <center><input type="submit" value="Save Changes"></center> 
    </td>
        </tr>
    </table>

    <input type="hidden" name="entry_id" value="<?php echo $entry_id ?>">

</form>
</center>
</body>
</html>