<?php 
    include 'head.php';
    include 'conn.php';
    session_start();
    $docid=$_SESSION['docid'];
    $patient=$_SESSION['userName'];
    $DoctorName=$_POST['docname'];
    $DoctorNumber=$_POST['docnumber'];
    $DoctorGender=$_POST['docgender'];
    $DoctorSpeciality=$_POST['docspeciality'];
    $DoctorBio=$_POST['DoctorBio'];
    $sql2 = "select * from User_DB WHERE email='$patient'";
    $result2 = mysqli_query($conn,$sql2);
    $row=mysqli_fetch_assoc($result2);
    $userid = $row['userid'];
    $appointDate= $_POST['date'];
    $appointtime= $_POST['time'];
    $PatientDetails= $_POST['PatientDetails'];
    $today = date('Y-m-d');
    $formDate= strtotime($appointDate);
    $tonight= strtotime($today);
    if($formDate<$tonight){
        header("location:home.php");
    }
    else{
        $sql= "INSERT INTO appointment (DoctorID, userid, DoctorName, DoctorNumber,DoctorGender,DoctorSpeciality,DoctorBio,appointDate, appointTime, PatientDetails, confimation)VALUES ($docid, '$userid','$DoctorName','$DoctorNumber','$DoctorGender','$DoctorSpeciality','$DoctorBio','$appointDate', '$appointtime','$PatientDetails','not yet')";
        if(mysqli_query($conn,$sql)){
            header("location:checkappointments.php");
        }
        else{
            header("location:checkappointments.php");
        }
    }

?>