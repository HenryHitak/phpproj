<?php
    $no = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $type = $_POST['type'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $addr = $_POST['addr'];

    $conns = mysqli_connect("localhost","root","","phpproj");
    $UsereditCMD = "UPDATE User_DB SET user_num='$no',occupation='$type',firstName='$fname',lastName='$lname',gender='$gender',dob='$dob',email='$email',pass='$password',`phone`='$phone',addr='$addr',salt='salt' WHERE user_num = '$no'";

    if(mysqli_query($conns,$UsereditCMD)){
        header("Location:UserTable.php");
    }else{
        echo "failed";
    }
?>