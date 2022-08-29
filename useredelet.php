<?php
    session_start();
    $no = $_SESSION['del'];

    $conns = mysqli_connect("localhost","root","","phpproj");
    $UserdeletCMD = "DELETE FROM User_DB WHERE user_num = '$no'";

    if(mysqli_query($conns,$UserdeletCMD)){
        unset($_SESSION['del']);
        header("Location:UserTable.php");
    }else{
        echo "failed";
    }
?>