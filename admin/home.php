<?php
    include 'header.php';

    $name= $_SESSION['adminName'];
    if($name=="admin"){
    }
    else{
      header('location:login.html');
    }
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
    <form action="doctorReg.php" method="POST">
    <label for="name">Doctor's Name</label>
    <input type="text" class="form-control" id="name" name="name">
    <label for="number">Doctor's Number</label>
    <input type="password" class="form-control" id="number" name="number">
    <input type='checkbox' onclick='myFunction2()'>Show Password<br>
    <label for="DoctorEmail">Doctor's email</label>
    <input type="email" class="form-control" id="DoctorEmail" name="DoctorEmail">
    <label for="DoctorPass">Doctor's password</label>
    <input type="password" class="form-control" id="DoctorPass" name="DoctorPass">
    <input type='checkbox' onclick='myFunction1()'>Show Password<br>
    <label >Doctor's Gender</label> <br>
    <input type="radio"name="gender" value="Male"><label>Male</label><br>
    <input type="radio" name="gender"value="Female"><label>Female</label><br>
    <input type="radio" name="gender"value="nottosay"><label>Prefer not to say</label><br>

    <label for="speciality">Select Speciality</label>
    <select class="form-control" id="speciality" name="speciality">
      <option></option>
      <option>Surgery</option>
      <option>Gastrology</option>
      <option>Medicine</option>
      <option> Ear Nose Throat Head And Neck Surgery</option>
      <option>Allergy and immunology</option>
      <option>Neurology</option>
      <option>Gynecologist</option>
      <option>Pediatrics</option>
    </select>

    <label for="Bio">Doctor's Bio</label>
    <textarea class="form-control" id="bio" rows="3" name="bio"></textarea>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    </div>
</body>
<script>
  function myFunction1() {
  var x = document.getElementById("DoctorPass");
  if (x.type === "password") {
  x.type = "text";
  } else {
  x.type = "password";
  }
  }
  function myFunction2() {
  var x = document.getElementById("number");
  if (x.type === "password") {
  x.type = "text";
  } else {
  x.type = "password";
  }
  }
</script>
</html>
