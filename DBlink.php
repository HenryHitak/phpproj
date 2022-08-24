<?php
    // link DataBase
    $conn = mysqli_connect("localhost","root","","User_DB");
    if(!$conn) {
        die("db error : " . mysqli_error());
    }
?>