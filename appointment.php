<?php
  include 'conn.php';
    session_start();
    $name = $_SESSION['userName'];
    $id = $_GET['appointId'];
    $_SESSION['docid'] = $id;
    include 'head.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="styleshe-et" href="style.css">
</head>
<body>
    <div class="container">
    <div class="row pt-5">
    
    <?php
      $sql = "SELECT * FROM doctorrecords WHERE DoctorID= $id";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          $id= $row['DoctorID'];
          ?>
        <div class="form-group">
          <form action="appointmentvalidation.php" method="POST">
            <label for="docname">Name </label>
            <input type="text" class="form-control" id="docname" name="docname" value="<?php echo $row['DoctorName']?>">
            <label for="docnumber">Number</label>
            <input type="text" class="form-control" id="docnumber" name="docnumber" value="<?php echo $row['DoctorNumber']?>">
            <label for="docgender">Gender</label>
            <input type="text" class="form-control" id="docgender" name="docgender" value="<?php echo $row['DoctorGender']?>">
            <label for="docspeciality">Speciality</label>
            <input type="text" class="form-control" id="docspeciality" name="docspeciality" value="<?php echo $row['DoctorSpeciality']?>">
            <label for="DoctorBio">Doctor Information</label>
            <input type="text" class="form-control" id="DoctorBio" name="DoctorBio" value="<?php echo $row['DoctorBio']?>">
            <label for="docname">Email address</label>
            <input type="text" class="form-control" id="docname" name="docname" value="<?php echo $row['DoctorName']?>">
            <label for="PatientDetails">Patient's Details</label>
            <textarea class="form-control" id="PatientDetails" rows="3" name="PatientDetails"></textarea>
            <label for="date">Appointment Date</label>
            <input type="date" class="form-control"  name="date" id="date">
            <p style="color: red;">Please select a valid date.if you select privious date then you have to do an appointment process again.</p>
            <label for="time">Appointment Time</label>
            <input type="number" id="time" name="time" min="8" max="22"> <br>
             <p style="color: red;">Please input only hour(international time system).</p>
            <button type="submit" class="btn btn-primary">Take Appointment</button>
          </form>
    </div>
    <?php
        }
      }
    ?>
    </div>
    </div>
</body>
</html>
<?php include 'footer.php';?>