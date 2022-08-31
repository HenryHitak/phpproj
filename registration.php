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

$sql = "select * from User_DB where email= '$name'";
$result = mysqli_query($conn,$sql);

$num = mysqli_num_rows($result);
if($num> 0){
    echo"username already taken<br>";
    echo "<p>If you already register here. Then <a href='signup.php'>click here</a> to log in</p>";
}
else{
    $reg = "INSERT INTO User_DB (firstName,lastName,gender,dob,email,pass,phone,addr,salt) VALUES ('$fname','$lname','$gender','$dob','$name','$pass','$phnumber','$addr','salt')";
    $validquery=mysqli_query($conn,$reg);
    if($validquery==1){
        header('location:login.php');
    }
}
?>