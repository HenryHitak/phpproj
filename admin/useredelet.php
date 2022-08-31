<?php
    session_start();
    $no = $_SESSION['del'];

    $conns = mysqli_connect("localhost","root","","phpproj");
    $UserdeletCMD = "DELETE FROM User_DB WHERE userid = '$no'";

    if(mysqli_query($conns,$UserdeletCMD)){
        unset($_SESSION['del']);
        header("Location:./viewpatient.php");
    }else{
        echo "failed";
    }
?>