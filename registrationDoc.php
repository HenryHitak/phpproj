<?php
include 'conn.php';
$name = $_POST["user"];
$dname = $_POST["dname"];
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

$sql = "select * from doctorrecords where DoctorEmail= '$name'";
$result = mysqli_query($conn,$sql);

$num = mysqli_num_rows($result);
if($num> 0){
    echo"username already taken<br>";
    echo "<p>If you already register here. Then <a href='signup.php'>click here</a> to log in</p>";
}
else{
    $reg = "INSERT INTO doctorrecords (DoctorName,DoctorNumber,DoctorGender,DoctorSpeciality,DoctorBio,DoctorEmail,DoctorPass) VALUES ('$dname','$DoctorNumber','later','$DoctorSpeciality','$DoctorBio','$name','$pass')";
    $validquery=mysqli_query($conn,$reg);
    if($validquery==1){
        header('location:loginDoc.php');
    }
}
?>