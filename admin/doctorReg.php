<?php
include 'conn.php';
$name= $_POST["name"];
$number= $_POST["number"];
$email= $_POST["DoctorEmail"];
$pass= $_POST["DoctorPass"];
$gender= $_POST["gender"];
$speciality= $_POST["speciality"];
$bio= $_POST["bio"];
$sql = "INSERT INTO doctorrecords (DoctorName,DoctorNumber,DoctorGender,DoctorSpeciality,DoctorBio,DoctorEmail,DoctorPass) VALUES ('$name','$number','$gender','$speciality','$bio','$email','$pass')";
            if (mysqli_query($conn, $sql)) {
                header("location:viewdoctor.php");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

?>