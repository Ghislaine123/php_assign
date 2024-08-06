<?php
session_start();
if($_SESSION['username']==""){
    header('location:Login.php');
}
include("conn.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM student WHERE Student_Id='$id'");
    $data = mysqli_fetch_array($query);
} else {
    echo "No student selected!";
    exit;
}

if (isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $d_id = $_POST['d_id'];

    $updateQuery = "UPDATE student SET Firstname='$fname', Lastname='$lname', Age='$age', Email='$email', 
    Phone_Number='$phone',Gender='$gender', Address='$address', Depart_Id='$d_id' WHERE Student_Id='$id'";

    if (mysqli_query($con, $updateQuery)) {
        echo "Record updated successfully!";
        header("Location: view.php"); 
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student Details</title>
</head>
<body>
    <h1>Update Student Details...</h1>
    <form method="post">
        First Name: <input type="text" name="fname" value="<?php echo $data['Firstname']; ?>"><br><br>
        Last Name: <input type="text" name="lname" value="<?php echo $data['Lastname']; ?>"><br><br>
        Age: <input type="text" name="age" value="<?php echo $data['Age']; ?>"><br><br>
        Email: <input type="text" name="email" value="<?php echo $data['Email']; ?>"><br><br>
        Phone: <input type="text" name="phone" value="<?php echo $data['Phone_Number']; ?>"><br><br>
        Gender: <input type="text" name="gender" value="<?php echo $data['Gender']; ?>"><br><br>
        Address: <input type="text" name="address" value="<?php echo $data['Address']; ?>"><br><br>
        Department ID: <input type="text" name="d_id" value="<?php echo $data['Depart_Id']; ?>"><br><br><br>
        <input type="submit" name="update" value="Update">
    </form>
    <a href="view.php">Back to View Page</a>
</body>
</html>
