<?php
session_start();
include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Admin Login Form</h1>
        <form action = "" method = "POST">
        Username:<input type = "text" name= "Username" required><br><br>
        Password:<input type = "password" name= "Password" required><br><br>
        <input type = "submit" name= "login" value="Login"><br><br>
</form>
</body>
</html>

<?php

if(isset($_POST['login']))
{
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $query = mysqli_query($con,"select * from admin where Username ='$username' AND Password = '$password'");
    if(mysqli_num_rows($query)==1)
    {
      $_SESSION['username']=['Username'=>$username];
      header("location:Register.php");
    }
    else
    {
        echo "Failed to login";
    }

}
?>