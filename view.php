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
    <h1>DATA VIEW</h1>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>Fname</th>
            <th>Lname</th>
            <th>Age</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Department</th>
            <th>Action</th>
</tr>

<?php
  $query = mysqli_query($con,"select student.*, department.Depart_Name as departname from student left join department 
  on student.Student_Id = department.D_id");
  $i=1;
  while( $data = mysqli_fetch_array($query))
  {
    ?><tr>
        <td><?php echo $i++;?></td>
      <td><?php echo $data['Firstname'];?></td>
      <td><?php echo $data['Lastname'];?></td>
      <td><?php echo $data['Age'];?></td>
      <td><?php echo $data['Email'];?></td>
      <td><?php echo $data['Phone_Number'];?></td>
      <td><?php echo $data['Gender'];?></td>
      <td><?php echo $data['Address'];?></td>
      <td> <?php echo $data['departname'];?></td>
      <td><a href="delete.php?id=<?php echo $data['Student_Id']; ?>"> 
        Delete</a> <a href="update.php?id=<?php echo $data['Student_Id'];?>"> Update</a></td> 
    </tr>
    <?php
  }
?>
</table>
<br>
<a href="Register.php">Add Student</a>
<br>
<a href="Logout.php">Logout</a>
</body>
</html>
