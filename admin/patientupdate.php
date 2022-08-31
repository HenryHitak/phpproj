<?php include 'header.php';
    include 'conn.php';
    session_start();
    $id = $_GET['GetID'];
    $_SESSION['id'] = $id;
    $query = " select * from patientrecords where PatientID= $id";
    $result = mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        $Patient_ID = $row['PatientID'];
        $Patient_Name = $row['PatientName'];
        $Patient_Email = $row['PatientEmail'];
        $Patient_Pass = $row['password'];
        $PatientDepartment = $row['PatientDepartment'];
        $PatientDetails = $row['PatientDetails'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="form-group">
    <form action="patientEdit.php" method="POST">
    <label for="PatientName">Patient's Name</label>
    <input type="text" class="form-control" id="PatientName" name="PatientName" value="<?php echo $Patient_Name ?>">
    <label for="PatientEmail">Patient's Email</label>
    <input type="email" class="form-control" id="PatientEmail" name="PatientEmail" value="<?php echo $Patient_Email ?>">
    <label for="password">Patient's Password</label>
    <input type="password" class="form-control" id="password" name="password" value="<?php echo $Patient_Pass ?>">

    <label >Patient's Gender</label> <br>
    <input type="radio"name="PatientGender" value="Male"><label>Male</label><br>
    <input type="radio" name="PatientGender"value="Female"><label>Female</label><br>
    <input type="radio" name="PatientGender"value="Not to say"><label>Prefer not to say</label><br>

    <label for="PatientDepartment">Select Department</label>
    <select class="form-control" id="PatientDepartment" name="PatientDepartment">
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

    <label for="PatientDetails">Patient's Details</label>
    <input class="form-control" id="PatientDetails" rows="3" name="PatientDetails" value="<?php echo $PatientDetails ?>">
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    </div>
</body>
</html>