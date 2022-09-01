<?php 
    include 'conn.php';
    session_start();
    $id = $_GET['up'];	
    $_SESSION['appId']= $id;
    $sql1 = " select * from appointment WHERE appointmentId = $id";
    $result1 = mysqli_query($conn,$sql1);
    $row=mysqli_fetch_assoc($result1);
    $DoctorName = $row['DoctorName'];
    $DoctorNumber = $row['DoctorNumber'];
    $DoctorGender = $row['DoctorGender'];
    $speciality = $row['DoctorSpeciality'];
    $DoctorBio = $row['DoctorBio'];
    $appointDate = $row['appointDate'];
    $appointTime = $row['appointTime'];
    include 'head.php';
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>doctor appointment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body >
<div class="container">
    <div class="form-group" >
        <form action="updateconfirm.php" method="POST" style="display:flex; flex-direction:column;">
        <input disabled value="Doctor Name:.<?php echo $DoctorName?>"></input>
        <input disabled value="Doctor Gender:<?php echo $DoctorGender?>"></input>
        <input disabled value="Doctor Speciality:<?php echo $speciality?>"></input>
        <input disabled value="Doctor Number:<?php echo $DoctorNumber?>"></input>
        <input disabled value="Doctor's Bio:<?php echo $DoctorBio?>"></input>
        <label for="date">Appointment Date</label>
        <input type="date" class="form-control"  name="date" id="date" value="<?php echo $appointDate?>">
        <p style="color: red;">Please select a valid date</p>
        <label for="time">Appointment Time</label>
        <input type="number" id="time" name="time" min="8" max="22" value="<?php echo $appointTime?>"> <br>
        <p style="color: red;">Please input only hour(from 24).</p>
        <button type="submit" class="btn btn-primary">Update Appointment</button>
        </form>
    </div>
</div>
</body>
</html>
