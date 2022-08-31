<?php
    $no = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $addr = $_POST['addr'];

    $conns = mysqli_connect("localhost","root","","phpproj");
    $UsereditCMD = "UPDATE User_DB SET userid='$no',firstName='$fname',lastName='$lname',gender='$gender',dob='$dob',email='$email',pass='$password',`phone`='$phone',addr='$addr',salt='salt' WHERE userid = '$no'";

    if(mysqli_query($conns,$UsereditCMD)){
        header("Location:./viewpatient.php");
    }else{
        echo "failed";
    }
?>