<?php include 'header.php';
    include 'conn.php';
    $id = $_GET['GetID'];
    $_SESSION['id'] = $id;
    $query = " select * from doctorrecords where DoctorID= $id";
    $result = mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        $Doctor_ID = $row['DoctorID'];
        $Doctor_Name = $row['DoctorName'];
        $Doctor_Number = $row['DoctorNumber'];
        $Doctor_Email = $row['DoctorEmail'];
        $Doctor_Pass = $row['DoctorPass'];
        $Doctor_Bio = $row['DoctorBio'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>doctorwiew</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="form-group">
    <form action="doctorEdit.php" method="POST">
    <label for="name">Doctor's Name</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo $Doctor_Name ?>">
    <label for="number">Doctor's Number</label>
    <input type="text" class="form-control" id="number" name="number" value="<?php echo $Doctor_Number ?>">
    <label for="DoctorEmail">Doctor's email</label>
    <input type="email" class="form-control" id="DoctorEmail" name="DoctorEmail" value="<?php echo $Doctor_Email ?>">
    <label for="DoctorPass">Doctor's password</label>
    <input type="password" class="form-control" id="DoctorPass" name="DoctorPass" value="<?php echo $Doctor_Pass ?>">

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
      <option>Ear Nose Throat Head And Neck Surgery</option>
      <option>Allergy and immunology</option>
      <option>Neurology</option>
      <option>Gynecologist</option>
      <option>Pediatrics</option>
    </select>

    <label for="Bio">Doctor's Bio</label>
    <input class="form-control" id="bio" rows="3" name="bio" value="<?php echo $Doctor_Bio ?>">
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    </div>
</body>
</html>