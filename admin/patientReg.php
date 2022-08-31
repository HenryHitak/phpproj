<?php
include 'conn.php';
$name= $_POST["PatientName"];
$email= $_POST["PatientEmail"];
$pass= $_POST["password"];
$PatientGender= $_POST["PatientGender"];
$department= $_POST["PatientDepartment"];
$details= $_POST["PatientDetails"];
$sql = "INSERT INTO patientrecords (PatientName,PatientEmail,password,PatientGender,PatientDepartment,PatientDetails) VALUES ('$name','$email','$pass','$PatientGender','$department','$details')";
            if (mysqli_query($conn, $sql)) {
                header("location:viewpatient.php");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

?>