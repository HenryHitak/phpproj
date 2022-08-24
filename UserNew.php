<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="mb-3">
            <label for="fname" class="form-label">Fisrt Name</label>
            <input type="text" name="fname" class="form-control" require>
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" name="lname" class="form-control" require>
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" name="dob" class="form-control" require>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" require>
            <label for="pass" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" require>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" require>
            <label for="addr" class="form-label">Address</label>
            <input type="text" name="addr" class="form-control" require>
            <button type="submit" class="btn btn-primary">new user</button>
        </div>
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $dbUsername = "root";
            $dbServername = "localhost";
            $dbPass = "";
            $dbName = "User_DB";

            $dbCon = new mysqli($dbServername,$dbUsername,$dbPass,$dbName);

            if($dbCon->connect_error){
                die("Connection error ".$dbCon->connect_error);
            }else{
                $insertCmd = "INSERT INTO user_tb (firstName,lastName,email,pass,dob,phone,addr,salt) VALUES ('".$_POST['fname']."','".$_POST['lname']."','".$_POST['email']."','".$_POST['pass']."','".$_POST['dob']."','".$_POST['phone']."','".$_POST['addr']."','salt')";
                $result = $dbCon->query($insertCmd);
    
                if($result === true){
                    echo "<h1 style='color: green;'>DONE!!!!</h1>";
                }else{
                    echo "<h1 style='color: red;'>".$dbCon->error."</h1>";
                }
                $dbCon->close();

                header('Location: ');
            }
        }
    ?>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>