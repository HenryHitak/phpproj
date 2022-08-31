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
    <form class="form-horizontal" action="registrationDoc.php" method="POST">
        <label style="margin-top: 15px;"> Email</label> <br>
        <input type="email" class="form-control" placeholder="Enter your email" name="DoctorEmail" required>
        <label style="margin-top: 15px;"> Password</label> <br>
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="DoctorPass" required>
        <input type="checkbox" onclick="myFunction1()">Show Password<br>
          <label style="margin-top: 15px;"> Confirm Password</label> <br>
          <input type="password" class="form-control" id="cnpwd" placeholder="Enter the same password to confirm" name="cnpwd" required>
        <input type="checkbox" onclick="myFunction2()">Show Password<br>
          <label style="margin-top: 15px;"> Doctor Name</label> <br>
          <input type="text" class="form-control" placeholder="Enter Your funllname" name="DoctorName" required>
          <label style="margin-top: 15px;"> Doctor registration number</label> <br>
          <input type="password" class="form-control" id="DoctorNumber" placeholder="Enter Your Doc Number" name="DoctorNumber" required>
        <input type="checkbox" onclick="myFunction3()">Show Doctor Number<br>
          <label for="DoctorSpeciality">Select Speciality</label>
          <select class="form-control" id="speciality" name="DoctorSpeciality">
            <option></option>
            <option>Surgery</option>
            <option>Gastrology</option>
            <option>Medicine</option>
            <option>Ear Nose Throat Head And Neck Surgery</option>
            <option>Allergy and immunology</option>
            <option>Neurology</option>
            <option>Gynecologist</option>
            <option>Pediatrics</option>
          </select>
          <label style="margin-top: 15px;"> Doctor Bio</label> <br>
          <input type="text" class="form-control" name="DoctorBio" required>
        <button type="submit" class="btn btn-primary" style="margin-top: 50px;">Register</button>
    </form>
    <p>If you already register here. Then <a href="loginDoc.php">click here</a> to log in</p>
  </div>
</div>
</body>
</html>
<script>
  function myFunction3() {
  var x = document.getElementById("DoctorNumber");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
  function myFunction2() {
  var x = document.getElementById("cnpwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
  function myFunction1() {
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
