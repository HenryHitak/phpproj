<?php
  include 'conn.php';
    session_start();
    $name = $_SESSION['userName'];
    include 'head.php';
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
    <div class="row pt-5">
    
    <?php
      $sql1 = "SELECT * FROM usertable WHERE name = '$name'";
      if(mysqli_query($conn, $sql1)){
          $row = mysqli_fetch_assoc(mysqli_query($conn, $sql1));
          $userid= $row['userid'];
      $sql2 = "SELECT * FROM appointment WHERE userid= $userid";
      if(mysqli_query($conn, $sql2)){
      $result = mysqli_query($conn, $sql2);
      if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          $id= $row['appointmentId'];
          ?>
          <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['DoctorName']?></h5>
          <p class="card-text"><?php echo $row['DoctorSpeciality']?></p>
          <p class="card-text">Appointment Date: <?php echo $row['appointDate']?></p>
          <p class="card-text"> Appointment Time: <?php echo $row['appointTime']?></p>
          <a href="updateappointment.php?up=<?php echo $id; ?>" class="btn btn-primary">UPDATE APPOINTMENT</a>
          <a href="cancelappointment.php?del=<?php echo $id; ?>" class="btn btn-primary mt-3">CANCEL APPOINTMENT</a> 
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
<?php include 'footer.php';
?>
