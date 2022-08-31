<?php
include 'conn.php';
include 'header.php';
session_start();
$id = $_GET['Del'];
$sql = "DELETE FROM patientrecords WHERE PatientID=$id";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            header("location:viewpatient.php");
        }
        else{
            echo"Something Error Happen for Delete again please";
            echo '<a href="home.php">click here</a>';
        }
        include 'footer.php';
?>