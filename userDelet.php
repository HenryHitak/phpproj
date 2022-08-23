<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
</body>
</html>