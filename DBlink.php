<?php
    // link DataBase
    $conn = mysqli_connect("localhost","root","","User_DB");
    if(!$conn) {
        die("db error : " . mysqli_error());
    }
    $query = "SELECT * FROM user_tb ORDER BY user_id";
    $result = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($result);
?>