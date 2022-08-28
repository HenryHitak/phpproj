<?php
    include 'conn.php';
    session_start();
    $name = $_SESSION['userName'];
    $id = $_GET['id'];
    $query = " select * from doctorrecords where DoctorID= $id";
    $result = mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result))
    {
        $Doctor_ID = $row['DoctorID'];
        $Doctor_Name = $row['DoctorName'];
        $Doctor_Speciality=$row['DoctorSpeciality'];
        $Doctor_Number = $row['DoctorNumber'];
        $Doctor_Bio = $row['DoctorBio'];
    }
    if(isset($_SESSION['userName'])){
    }
    else{
      header('location:login.php');
    }
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
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Doctor's Name: <?php echo $Doctor_Name;?></h5>
          <p class="card-text">Doctor's Speciality: <?php echo $Doctor_Speciality;?></p>
          <p class="card-text">Doctor's Number: <?php echo $Doctor_Number;?></p>
          <p class="card-text">Doctor's Bio: <?php echo $Doctor_Bio;?></p>
        </div>
      </div>
    </div>
    </div>
</body>
</html>
<?php include 'footer.php';?>