<?php
include 'conn.php';
include 'header.php';
$no = $_SESSION['del'];
$sql = "DELETE FROM User_DB WHERE userid = '$no'";
$result = mysqli_query($conn,$sql);
if($result)
{
    header("location:viewpatient.php");
}
else{
    echo"Something Error Happen for Delete again please";
    echo"<a href='userUpdate.php?no=".$no."'>click here</a>";
}
include 'footer.php';
?>