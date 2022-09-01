<?php
include 'conn.php';
include 'header.php';
session_start();
$no = $_SESSION['del'];
$sql = "DELETE FROM user_db user_num = $no";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            header("location:viewpatient.php");
        }
        else{
            echo"Something Error Happen for Delete again please";
            echo '<a href="userUpdate.php">click here</a>';
        }
        include 'footer.php';
?>