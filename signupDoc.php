<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container" >
  <h1 style="margin-left: 55vh; margin-bottom: 50px">Registration Page for Doctor</h1>
  <p style="color:red; margin-left: 50vh;">All fields need to be filled up and password should match</p>  
  <div class="form-group">
    <form class="form-horizontal" action="registration.php" method="POST">
        <label style="margin-top: 15px;"> Email</label> <br>
        <input type="email" class="form-control" placeholder="Enter your email" name="user" required>
        <label style="margin-top: 15px;"> Password</label> <br>
          <input type="password" class="form-control" placeholder="Enter password" name="pwd" required>
          <label style="margin-top: 15px;"> Confirm Password</label> <br>
          <input type="password" class="form-control" id="cnpwd" placeholder="Enter the same password to confirm" name="cnpwd" required>
          <label style="margin-top: 15px;"> Doctor registration number</label> <br>
          <input type="password" class="form-control" placeholder="Enter Your Doc Number" name="DoctorNumber" required>
          <label style="margin-top: 15px;"> Doctor Speciality</label> <br>
          <input type="text" class="form-control" placeholder="Enter Your Phone Number" name="DoctorSpeciality" required>
          <label style="margin-top: 15px;"> Doctor Bio</label> <br>
          <input type="text" class="form-control" placeholder="Enter Your Phone Number" name="DoctorBio" required>
        <button type="submit" class="btn btn-primary" style="margin-top: 50px;">Register</button>
    </form>
    <p>If you already register here. Then <a href="loginDoc.php">click here</a> to log in</p>
  </div>
</div>
</body>
</html>
<?php
include 'footer.php';
?>
