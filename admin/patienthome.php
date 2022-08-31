<?php
    session_start();
    $name= $_SESSION['adminName'];
    if($name=="admin"){
    }
    else{
      header('location:login.html');
    }
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
    <form action="patientReg.php" method="POST">
    <label for="PatientName">Patient's Name</label>
    <input type="text" class="form-control" id="PatientName" name="PatientName">
    <label for="PatientEmail">Patient's Email</label>
    <input type="email" class="form-control" id="PatientEmail" name="PatientEmail">
    <label for="password">Patient's Password</label>
    <input type="password" class="form-control" id="password" name="password">
    <label >Patient's Gender</label> <br>
    <input type="radio"name="PatientGender" value="Male"><label>Male</label><br>
    <input type="radio" name="PatientGender"value="Female"><label>Female</label><br>
    <input type="radio" name="PatientGender"value="nottosay"><label>Prefer not to say</label><br>


    <label for="PatientDepartment">Select Department</label>
    <select class="form-control" id="PatientDepartment" name="PatientDepartment">
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

    <label for="PatientDetails">Patient's Details</label>
    <textarea class="form-control" id="PatientDetails" rows="3" name="PatientDetails"></textarea>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    </div>
</body>
</html>
