<?php
    // link DataBase
    $conn = mysqli_connect("localhost","root","","Hey_Doc");
    if(!$conn) {
        die("db error : " . mysqli_error());
    }
?>