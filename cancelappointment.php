<?php 
    include 'head.php';
    include 'conn.php';
    $id = $_GET['del'];	
    $sql1 = " DELETE FROM appointment WHERE appointmentId = $id";
    if(mysqli_query($conn,$sql1)){
        header("location:home.php");
    }
?>