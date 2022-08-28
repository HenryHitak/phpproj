<?php
include 'head.php';
include 'conn.php';
session_start();
$id= $_SESSION['appId'];
$date = $_POST['date'];
$time = $_POST['time'];
$sql = "UPDATE appointment SET appointDate ='$date', appointTime='$time' where appointmentId = $id";
if(mysqli_query($conn,$sql)){
    header("location:home.php");
}
?>