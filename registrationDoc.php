<?php
include 'conn.php';
$name = $_POST["DoctorEmail"];
$dname = $_POST["DoctorName"];
$pass = $_POST["DoctorPass"];
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

$sql = "select * from doctorrecords where DoctorEmail= '$name'";
$result = mysqli_query($conn,$sql);

$num = mysqli_num_rows($result);
if($num> 0){

    echo "<p>If you already register here. Then <a href='signupDoc.php'>click here</a> to log in</p>";
}
else{
    $pwd = $_POST['DoctorPass'];
    $pwdhash = password_hash($pwd,PASSWORD_BCRYPT,["cost"=>9]);
    $reg = "INSERT INTO doctorrecords (DoctorName,DoctorNumber,DoctorEmail,DoctorPass,DoctorSpeciality,DoctorBio) VALUES ('$dname','$DoctorNumber','$name','$pwdhash','$DoctorSpeciality','$DoctorBio')";
    $validquery=mysqli_query($conn,$reg);
    if($validquery==1){
        header('location:loginDoc.php');
    }
}
?>