<?php
include 'conn.php';
session_start();
$name = $_POST["DoctorEmail"];
$pass = $_POST["DoctorPass"];
$sql = "select * from doctorrecords where DoctorEmail= '$name' && DoctorPass = '$pass'";
$result = mysqli_query($conn,$sql);
$rowNum = mysqli_num_rows($result);


while($row = mysqli_fetch_array($result)) {
    $did = $row['DoctorID'];
    $dname = $row['DoctorName'];

    $_SESSION['did'] = "$did";
    $_SESSION['dname'] = "$dname";
    
    if(password_verify($pass,$row['pass'])){
    $_SESSION['userName'] = $name;
    $_SESSION['sessionTimeout'] = time()+600;
    header('location:homeDoc.php');
    
}
else{
    header('location:loginDoc.php');
}



?>