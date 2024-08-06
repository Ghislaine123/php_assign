<?php
session_start();
if($_SESSION['username']==""){
    header('location:Login.php');
}
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
    
<h1>Student Registration Form</h1>
        <form action = "" method = "POST">
            <input type= "hidden" name="Id">
        Firstname:<input type = "text" name= "Firstname"required><br><br>
        Lastname:<input type = "text" name= "Lastname"required><br><br>
        Age:<input type = "number" name= "Age" min="18" min="100"required><br><br>
        Email:<input type = "email" name= "Email"required><br><br>
        Phone_Number:<input type = "number" name= "Phone_Number"required><br><br>
        Gender:<input type = "radio" name= "Gender" value="Male">Male
               <input type = "radio" name= "Gender" value="Female">Female<br><br>
        Address:<input type = "text" name= "Address"required><br><br>
        Department:  
        <select name="Department">
        <?php
        $query = mysqli_query($con,"select * from department");
        while($data=mysqli_fetch_array($query))
       {
       ?> 
        <option value="<?php echo $data['D_id']; ?>"><?php echo $data['Depart_Name'];?></option>
        <?php
}
?>    
</select>

<br><br>
        <input type = "submit" name= "register" value="Register"><br><br>
</form>
<a href="view.php">View Data</a>
<br>
<a href="Logout.php">Logout</a>
</body>
</html>

<?php

if(isset($_POST['register']))
{
    $id=$_POST['Id'];
   $fname=filter_var($_POST['Firstname'],FILTER_SANITIZE_STRING);
   $lname=filter_var($_POST['Lastname'],FILTER_SANITIZE_STRING);
   $age=filter_var($_POST['Age'],FILTER_SANITIZE_NUMBER_INT);
   $email=filter_var($_POST['Email'],FILTER_VALIDATE_EMAIL);
   $phone=filter_var($_POST['Phone_Number'],FILTER_SANITIZE_NUMBER_INT);
   $gender=filter_var($_POST['Gender'],FILTER_SANITIZE_STRING);
   $address=filter_var($_POST['Address'],FILTER_SANITIZE_STRING);
   $department=filter_var($_POST['Department'],FILTER_SANITIZE_STRING); 
   if(!preg_match("/^[a-zA-z]*$/",$fname))
   {
       echo "Firstname should not contain numbers";
   }
   elseif(!preg_match("/^[a-zA-z]*$/",$lname))
   {
       echo "Lastname should not contain numbers";
   }
   elseif(!preg_match("/^(078|072|073|079)\d{7}$/",$phone))
   {
       echo "Invalid Phone number";
   }
   elseif(!preg_match("/^[a-zA-z]*$/",$address))
   {
       echo "Address should not contain numbers";
   }
   else
   {
    $query=  mysqli_query($con,"insert into Student values('$id','$fname','$lname','$age','$email','$phone','$gender','$address','$department')");
   
   

    if($query)
    {
        echo "Data Inserted successfully";
    }
   }
   
}

   