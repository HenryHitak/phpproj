<?php
session_start();
include 'conn.php';
$name= $_POST["name"];
$pass= $_POST["pass"];
$sql = "SELECT * FROM admin WHERE userName = '$name' && password = '$pass'";
$result =mysqli_query($conn, $sql);
            if (mysqli_num_rows($result)>0) {
                $_SESSION['adminName'] = $name;
                $_SESSION['sessionTimeout'] = time()+600;
                header("location:viewdoctor.php");
                
            } else {
                header("location:login.html");
            }
?>