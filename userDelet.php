<?php
    $idx = $_GET['idx'];

    $data = file_get_contents('./files/data.json');
    $data_array = json_decode($data);

    unset($data_array[$idx]);
    
    $data_array = array_values($data_array);

    $data = json_encode($data_array, JSON_PRETTY_PRINT);
    file_put_contents('./files/data.json', $data);

    header("Location: http://localhost/phpproj/membertest.php");
?>