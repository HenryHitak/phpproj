<?php
include 'conn.php';
session_start();
$name = $_POST["user"];
$pass = $_POST["pwd"];
$sql = "select * from User_DB where email= '$name' && pass = '$pass'";
$result = mysqli_query($conn,$sql);
$rowNum = mysqli_num_rows($result);

while($row = mysqli_fetch_array($result)) {
    $fname = $row['firstName'];
    $lname = $row['lastName'];

    $_SESSION['fullname'] = "$fname $lname";
}

if($rowNum == 1){
    $_SESSION['userName'] = $name;
    $_SESSION['sessionTimeout'] = time()+600;
    header('location:home.php');
    
}
else{
    header('location:login.php');
}


?>