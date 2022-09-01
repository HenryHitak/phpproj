<?php
include 'conn.php';
$name = $_POST["user"];
$pass = $_POST["pwd"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$cnpass = $_POST["cnpwd"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$phnumber = $_POST["phnumber"];
$addr = $_POST["addr"];
if($name =="" || $pass == "" || $cnpass ==""|| $age ==""|| $phnumber==""){
    header('location:signup.php');
}
else{
    if($pass != $cnpass)
    {
    header('location:signup.php');
    }
}

$sql = "select * from user_db where email= '$name'";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if($num> 0){
    echo "<h1>If you already register here. Then <a href='signup.php'>click here</a> to log in</h1>";
}
else{
    $pwd = $_POST['pwd'];
    $pwdhash = password_hash($pwd,PASSWORD_BCRYPT,["cost"=>9]);
    $reg = "INSERT INTO user_db (firstName,lastName,gender,dob,email,pass,phone,addr,salt) VALUES ('$fname','$lname','$gender','$dob','$name','$pwdhash','$phnumber','$addr','salt')";
    $validquery=mysqli_query($conn,$reg);
    if($validquery==1){
        header('location:login.php');
    }
}
?>