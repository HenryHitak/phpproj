<?php
include 'conn.php';
session_start();
$name = $_POST["user"];
$pass = $_POST["pwd"];

$sql = "select * from user_db where email= '$name'";
$result = mysqli_query($conn,$sql);
$rowNum = mysqli_num_rows($result);

while($row = mysqli_fetch_array($result)) {
    if(password_verify($pass,$row['pass'])){
        $fname = $row['firstName'];
        $lname = $row['lastName'];
        $_SESSION['fullname'] = "$fname $lname";
        $_SESSION['userName'] = $name;
        $_SESSION['sessionTimeout'] = time()+600;
        header('location:home.php');
    }
    else{
        header('location:login.php');
    }
}

?>