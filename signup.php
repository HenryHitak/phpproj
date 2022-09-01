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
  <h1 style="margin-left: 55vh; margin-bottom: 50px">Registration Page for Patient</h1>
  <p style="color:red; margin-left: 50vh;">All fields need to be filled up and password should match</p>  
  <div class="form-group">
    <form class="form-horizontal" action="registration.php" method="POST">
        <label style="margin-top: 15px;"> Email</label> <br>
        <input type="email" class="form-control" placeholder="Enter your email" name="user" required>
        <label style="margin-top: 15px;"> Password</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
        <input type="checkbox" onclick="myFunction2()">Show Password<br>
          <label style="margin-top: 15px;"> Confirm Password</label>
          <input type="password" class="form-control" id="cnpwd" placeholder="Enter the same password to confirm" name="cnpwd" required>
          <input type="checkbox" onclick="myFunction1()">Show Password<br>
          <label for="fname" class="form-label">Fisrt Name</label>
          <input type="text" name="fname" class="form-control" required>
          <label for="lname" class="form-label">Last Name</label>
          <input type="text" name="lname" class="form-control" required>
          <label for="dob" class="form-label">Date of Birth</label>
          <input type="date" name="dob" class="form-control" required>
          <label >Patient's Gender</label> <br>
          <input type="radio"name="gender" value="Male"><label>Male</label><br>
          <input type="radio" name="gender" value="Female"><label>Female</label><br>
          <input type="radio" name="gender" value="nottosay"><label>Prefer not to say</label><br>
          <label style="margin-top: 15px;"> Phone Number</label> <br>
          <input type="text" class="form-control" placeholder="Enter Your Phone Number" name="phnumber" required>
          <label for="addr" class="form-label">Address</label>
          <input type="text" name="addr" class="form-control" required>
        <button type="submit" class="btn btn-primary" style="margin-top: 50px;">Register</button>
    </form>
    <p>If you already register here. Then <a href="login.php">click here</a> to log in</p>
  </div>
</div>
</body>
</html>
<script>
  function myFunction1() {
  var x = document.getElementById("cnpwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
  function myFunction2() {
var x = document.getElementById("pwd");
if (x.type === "password") {
  x.type = "text";
} else {
  x.type = "password";
}
  }
</script>
<?php
include 'footer.php';
?>
