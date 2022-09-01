<?php
include 'conn.php';
session_start();
$name = $_POST["DoctorEmail"];
$pass = $_POST["DoctorPass"];
$sql = "select * from doctorrecords where DoctorEmail= '$name'";
$result = mysqli_query($conn,$sql);
$rowNum = mysqli_num_rows($result);

if($rowNum > 0){
    while($row = mysqli_fetch_array($result)) {
        $did = $row['DoctorID'];
        $dname = $row['DoctorName'];
        $hashpass = $row['DoctorPass'];

        $_SESSION['did'] = "$did";
        $_SESSION['dname'] = "$dname";
        $_SESSION['userName'] = $name;
        $_SESSION['sessionTimeout'] = time()+600;
        
        if(password_verify($pass,$hashpass)){
        header('location:viewpatient.php');
        
        }
        else{
            header('location:loginDoc.php');
        }
    }
}
else{
    header('location:loginDoc.php');
}

?>