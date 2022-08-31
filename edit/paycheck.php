<?php
    $no = $_GET['no'];

    $conns = mysqli_connect("localhost","root","","phpproj");

    $insertCmd = "UPDATE Invoice SET pcd='payment complete'  where appointmentId=$no";

    if(mysqli_query($conns,$insertCmd)){
        header("Location:../Payment.php");
    }
?>