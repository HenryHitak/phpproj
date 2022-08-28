<?php
include 'conn.php';
$name= $_POST["name"];
$number= $_POST["number"];
$gender= $_POST["gender"];
$speciality= $_POST["speciality"];
$bio= $_POST["bio"];
$sql = "INSERT INTO doctorrecords (DoctorName,DoctorNumber,DoctorGender,DoctorSpeciality,DoctorBio) VALUES ('$name','$number','$gender','$speciality','$bio')";
            if (mysqli_query($conn, $sql)) {
                header("location:viewdoctor.php");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

?>