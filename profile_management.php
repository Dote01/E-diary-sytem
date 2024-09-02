<?php
//session
session_start();

//obtaining the username via the link
$username = $_GET['username'];


//database connection
include("db_connection.php");

//select current details
$details = "SELECT * FROM users WHERE username = '".$username."'";
$result = $db->query($details);

if(!$result){
    echo "Error: $db->error";
    echo "<br> There was an error with fetching the current user's details";
}


$fetchedDetails = array();
while ($row = $result->fetch_assoc()){
    $fetchedDetails[] = $row;

    $user_name = $row['username'];
    $password = $row['password'];
    $email = $row['email'];

 }

 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User|Edit Profile</title>
</head>
<body>
    <h1>User|Edit Profile</h1>
    <form action="update_profile.php" action = "GET">
        <table>
            <tr>
            <td>
                Username
            </td>
            <td>
                <?php echo $user_name ?>
                <input type="hidden" value = "<?php echo $user_name ?>">
            </td>
            </tr>
            <tr>
            <td>
                Email
            </td>
            <td>
                <input type="text" name="email" value="<?php echo $email ?>">
            </td>
            </tr>
            <tr>
            <td>
                Password
            </td>
            <td>
               <input type="password" name="password" value="<?php echo $password ?>"> 
            </td>
            </tr>
            <tr>
                <td>
                    <button type="submit">Update Details</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>