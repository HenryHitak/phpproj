<?php
    session_start();
    $no = $_SESSION['dele'];

    $conns = mysqli_connect("localhost","root","","phpproj");
    $UserdeletCMD = "DELETE FROM Invoice WHERE appointmentId = '$no'";

    if(mysqli_query($conns,$UserdeletCMD)){
        unset($_SESSION['dele']);
        header("Location:Payment.php");
    }else{
        echo "failed";
    }
?>