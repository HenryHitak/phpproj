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
$Patient_Id = $_SESSION['id'];
$name= $_POST["PatientName"];
$email= $_POST["PatientEmail"];
$pass= $_POST["password"];
$PatientGender= $_POST["PatientGender"];
$department= $_POST["PatientDepartment"];
$details= $_POST["PatientDetails"];
$sql = "UPDATE patientrecords SET PatientName ='$name', PatientEmail='$email',password='$pass',PatientGender='$PatientGender',PatientDepartment='$department',PatientDetails='$details' where PatientID=$Patient_Id";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            header("location:viewpatient.php");
        }
        else{
            echo"Something Error Happen for registration again please";
            echo '<a href="home.php">click here</a>';
        }
        include 'footer.php';
?>

</body>
</html>