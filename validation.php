<?php
include 'conn.php';
session_start();
$name = $_POST["user"];
$pass = $_POST["pwd"];
$sql = "select * from usertable where name= '$name' && password = '$pass'";
$result = mysqli_query($conn,$sql);
$rowNum = mysqli_num_rows($result);

if($rowNum == 1){
    $_SESSION['userName'] = $name;
    $_SESSION['sessionTimeout'] = time()+600;
    header('location:home.php');
    
}
else{
    header('location:login.php');
}


?>