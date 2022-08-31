<?php
include 'conn.php';
$name = $_POST["user"];
$pass = $_POST["pwd"];
$cnpass = $_POST["cnpwd"];
$DoctorNumber = $_POST["DoctorNumber"];
$DoctorSpeciality = $_POST["DoctorSpeciality"];
$DoctorBio = $_POST["DoctorBio"];
if($name =="" || $pass == "" || $cnpass ==""|| $DoctorNumber ==""|| $DoctorSpeciality==""|| $DoctorBio==""){
    header('location:signupDoc.php');
}
else{
    if($pass != $cnpass)
    {
    header('location:signupDoc.php');
    }
}

$sql = "select * from usertable where name= '$name'";
$result = mysqli_query($conn,$sql);

$num = mysqli_num_rows($result);
if($num> 0){
    echo"username already taken<br>";
    echo "<p>If you already register here. Then <a href='signup.php'>click here</a> to log in</p>";
}
else{
    $reg = " insert into usertable (name , password, DoctorNumber, DoctorSpeciality,DoctorBio) values ('$name','$pass',$DoctorNumber, '$DoctorSpeciality', '$DoctorBio')";
    $validquery=mysqli_query($conn,$reg);
    if($validquery==1){
        header('location:loginDoc.php');
    }
}
?>