<?php
  include 'conn.php';
    session_start();
    $name = $_SESSION['userName'];
    $did = $_SESSION['did'];
    $dnam = $_SESSION['dname'];
    include 'dochead.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="styleshe-et" href="style.css">
</head>
<body>
    <div class="container">
      <h3>Your Patient List</h3>
    <div class="row pt-5">
    
    <?php
      $sql1 = "SELECT * FROM doctorrecords WHERE DoctorEmail = '$name'";
      if(mysqli_query($conn, $sql1)){
          $row = mysqli_fetch_assoc(mysqli_query($conn, $sql1));
          $userid= $row['DoctorID'];
          $sql2 = "SELECT * FROM appointment INNER JOIN User_DB on appointment.userid = User_DB.userid WHERE DoctorID = '$userid'";
          if(mysqli_query($conn, $sql2)){
            $result = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)){
                $id= $row['userid'];
          ?>
          <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['firstName']." ".$row['lastName']; ?></h5>
          <p class="card-text"><?php echo $row['PatientDetails']?></p>
          <a href="./userUpdate.php?no=<?php echo $id; ?>" class="btn btn-primary">See Profile</a> 
          <a href="appointment.php?appointId=<?php echo $id; ?>" class="btn btn-primary">Get Appointment</a> 
        </div>
      </div>
    </div>
    <?php
              }
            }
        }
      }
    ?>
    </div>
    </div>
</body>
</html>
<?php include 'footer.php';?>