<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include 'conn.php';
include 'header.php';
session_start();
$Doctor_Id = $_SESSION['id'];
$name= $_POST["name"];
$number= $_POST["number"];
$gender= $_POST["gender"];
$speciality= $_POST["speciality"];
$bio= $_POST["bio"];
$sql = "UPDATE doctorrecords SET DoctorName ='$name', DoctorNumber='$number', DoctorGender='$gender',DoctorSpeciality='$speciality',DoctorBio='$bio' where DoctorID=$Doctor_Id";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            header("location:viewdoctor.php");
        }
        else{
            echo"Something Error Happen for registration again please";
            echo '<a href="home.php">click here</a>';
        }
        include 'footer.php';
?>

</body>
</html>