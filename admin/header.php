<?php
    session_start();
    if($_SESSION['sessionTimeout'] < time() || !isset($_SESSION['adminName'])){
        session_unset();
        session_destroy();
        header("Location: http://localhost/phpproj/admin/login.php");
    }
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo">
                        <a href="viewdoctor.php">HEY DOC'S</a>
                    </div>
                </div>
                <div class="col-md-10">
                    <nav class="menu">
                        <ul class="nav justify-content-end">
                            <li><a href="viewdoctor.php">Doctor List</a></li>
                            <li><a href="home.php">Register Doctor</a></li>
                            <li><a href="viewpatient.php">Patient List</a></li>
                            <li><a href="patienthome.php">Register Patient</a></li>
                            <li><a href="signout.php">Sign Out</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    
</body>
</html>