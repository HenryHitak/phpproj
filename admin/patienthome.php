<?php

    include 'header.php';
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <div class="form-group">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="fname" class="form-label">Fisrt Name</label>
    <input type="text" name="fname" class="form-control" required>
    <label for="lname" class="form-label">Last Name</label>
    <input type="text" name="lname" class="form-control" required>
    <label for="dob" class="form-label">Date of Birth</label>
    <input type="date" name="dob" class="form-control" required>
    <label for="PatientEmail">Patient's Email</label>
    <input type="email" class="form-control" id="PatientEmail" name="PatientEmail" required>
    <label for="pass">Patient's Password</label>
    <input type="password" class="form-control" id="password" name="pass">
    <label >Patient's Gender</label> <br>
    <input type="radio"name="gender" value="Male"><label>Male</label><br>
    <input type="radio" name="gender" value="Female"><label>Female</label><br>
    <input type="radio" name="gender" value="nottosay"><label>Prefer not to say</label><br>
    <label for="phone" class="form-label">Phone</label>
    <input type="text" name="phone" class="form-control" required>
    <label for="addr" class="form-label">Address</label>
    <input type="text" name="addr" class="form-control" required>


  
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

      <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $dbUsername = "root";
            $dbServername = "localhost";
            $dbPass = "";
            $dbName = "phpproj";

            $dbCon = new mysqli($dbServername,$dbUsername,$dbPass,$dbName);

            if($dbCon->connect_error){
                die("Connection error ".$dbCon->connect_error);
            }else{
                $insertCmd = "INSERT INTO User_DB (firstName,lastName,gender,dob,email,pass,phone,addr,salt) VALUES ('".$_POST['fname']."','".$_POST['lname']."','".$_POST['gender']."','".$_POST['dob']."','".$_POST['PatientEmail']."','".$_POST['pass']."','".$_POST['phone']."','".$_POST['addr']."','salt')";
                $result = $dbCon->query($insertCmd);

                if($result === true){
                    echo "<h1 style='color: green;'>DONE!!!!</h1>";
                }else{
                    echo "<h1 style='color: red;'>".$dbCon->error."</h1>";
                }
                $dbCon->close();

                header('Location:viewpatient.php');
            }
        }
      ?> 
    </div>
    </div>
</body>
</html>
