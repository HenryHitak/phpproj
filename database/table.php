<?php
include 'conn.php';
$doctorrecords = "CREATE TABLE doctorrecords (
    DoctorID INT NOT NULL AUTO_INCREMENT primary key,
    DoctorName varchar(50) NOT NULL,
    DoctorNumber varchar(50) NOT NULL,
    DoctorGender varchar(10) NOT NULL,
    DoctorSpeciality varchar(10) NOT NULL,
    DoctorBio varchar(255) NOT NULL
    )";
    
    if (mysqli_query($conn, $doctorrecords)) {}
     else {
        echo "Error creating table: " . mysqli_error($conn);
    }

$adminName= "admin";
$adminpass = "admin";
$adminTable = "CREATE TABLE admin (
    userName varchar(50) NOT NULL,
    password varchar(50) NOT NULL
    )";
    
    if (mysqli_query($conn, $adminTable)) {}
     else {
        echo "Error creating table: " . mysqli_error($conn);
    }
$adminInsert= "INSERT INTO admin (userName,password)
VALUES ('$adminName', '$adminpass')";
if (mysqli_query($conn, $adminInsert)) {}
else {
   echo "Error creating table: " . mysqli_error($conn);
}
$usertable = "CREATE TABLE usertable 
(
userid int NOT NULL AUTO_INCREMENT primary key,
name varchar(255) NOT NULL,
password varchar(255) NOT NULL,
age int NOT NULL,
phoneNumber varchar(255) NOT NULL
)";

if (mysqli_query($conn,$usertable)) {}
 else {
    echo "Error creating table: " . mysqli_error($conn);
}
$appointment = "CREATE TABLE appointment 
(
    appointmentId int NOT NULL AUTO_INCREMENT primary key,
    DoctorID INT,
    userid INT,
    FOREIGN KEY (userid) REFERENCES usertable(userid),
    DoctorName varchar(50) NOT NULL,
    DoctorNumber varchar(50) NOT NULL,
    DoctorGender varchar(10) NOT NULL,
    DoctorSpeciality varchar(50) NOT NULL,
    DoctorBio varchar(255) NOT NULL,
    appointDate varchar(20) NOT NULL,
    appointTime varchar(20) NOT NULL
)";

if (mysqli_query($conn,$appointment)) {}
 else {
    echo "Error creating table: " . mysqli_error($conn);
}
?>