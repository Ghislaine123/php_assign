<?php
session_start();
include("conn.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $deleteQuery = "DELETE FROM student WHERE Student_Id='$id'";

    if (mysqli_query($con, $deleteQuery)) {
        echo "Record deleted successfully!";
        header("Location: view.php"); 
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    echo "No student selected!";
}
?>
