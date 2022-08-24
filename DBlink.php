<?php
    // link DataBase
    $conn = mysqli_connect("localhost","root","","Hey_Doc");
    if(!$conn) {
        die("db error : " . mysqli_error());
    }
    $query = "SELECT * FROM User_DB ORDER BY user_num";
    $result = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($result);
?>