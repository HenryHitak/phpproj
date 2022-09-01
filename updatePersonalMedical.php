<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Personal Medical History</title>
  <style>
    th {border:1px solid black;}
    td {border:1px solid black;}
  input{
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 50%;
    height: 200px;
    padding: 1%;
  }
  input, textarea{
    border: none;
    outline: none;
    padding: 1%;
    box-shadow: 20px 20px 50px rgba(0,0,0,0.5);
    border-radius: 5px;
  }

  form{
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 5%;
    height:100vh;
  }
  a{
    margin-left: 10%;
  }
  body{
    display:flex;
    flex-direction: column;
  }
  table{
    border: 1px solid red;
  }
  h1{
    display:flex;
    justify-content: center;
  }
  .container1{
    background: rgb(23,122,254);
    background: linear-gradient(0deg, rgba(23,122,254,1) 45%, rgba(255,255,255,1) 100%);
    margin-left: 10%;
    margin-right: 10%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 5%;
  }
  .reg{
    width: 50%;
    padding: 1%;
    border: none;
  }
  .reg:hover{
    color: white;
    background: #1F51FF;
    box-shadow: 0 0 10px #1F51FF, 0 0 40px #1F51FF, 0 0 80px #1F51FF;
  }
  .container{
    height: 10vh;
    width: 100%;
  }

  .container ul{
    display: flex;
    justify-content: space-between;
    font-size: 18px;
  }
  .logo{
    font-size: 18px;
  }
  .row{
    display:flex;
    justify-content: center;
  }
  .tableContainer{
    margin-left: 10%;
    margin-right: 10%;
  }
  form{
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 5%;
    height:100vh;
  }
</style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<header>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo">
                        <a href="home.php">Hey Doc's</a>
                    </div>
                </div>
                <div class="col-md-10">
                    <nav class="menu">
                        <ul class="nav justify-content-end">
                            <li><a href="usertable.php">Users</a></li>
                            <li><a href="viewdoc.php">Doctor List</a></li>
                            <li><a href="checkappointments.php">Appointments</a></li>
                            <li><a href="Payment.php">Payment(Invoice)</a></li>
                            <li><a href="personalmedicalhistory.php">Personal Medical History</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
  <h1 class="title">Update Register Medical History</h1>
  <div class="container1">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <input type="text" name="firstName" placeholder="First Name" ><br><br>
      <input type="text" name="lastName" placeholder="Last Name" ><br><br>
      <input type="text" name="age" placeholder="Age" ><br><br>
      <input type="text" name="dob" placeholder="Day of birth" ><br><br>
      <input type="text" name="phone" placeholder="Phone" ><br><br>
      <input type="text" name="dateOfConsult" placeholder="Date of consult" ><br><br>
      <textarea name="details" placeholder="details about the consult" cols = "90" rows = "100"></textarea><br><br>
      <button class="reg" type="submit" name="update">Update</button>
    </form>
  </div>
  <?php
    $id = $_GET['updateid'];
    if(isset($_POST['update'])){
      $dbUsername = "root";
      $dbServername = "localhost";
      $dbPass = "";
      $dbname = "phpproj";
      $dbCon = new mysqli($dbServername,$dbUsername,$dbPass,$dbname);
      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $age = $_POST['age'];
      $dob = $_POST['dob'];
      $phone = $_POST['phone'];
      $dateOfConsult = $_POST['dateOfConsult'];
      $details = $_POST['details'];
      
      $sql = "UPDATE personalmedicalhistory SET id=$id,firstName='$firstName',lastName='$lastName',age='$age',dob='$dob',phone='$phone',dateOfConsult='$dateOfConsult',details='$details' WHERE id=$id";
      $result = $dbCon->query($sql);
      echo "<script> window.location.href='personalmedicalhistory.php';</script>";
      if($result === true){
        echo "Updated successfully";
        //echo "<script> window.location.href='personalmedicalhistory.php';</script>";
      }else{
      die(mysqli_error($dbCon));
    } 
  } 
  ?>
</div>
</body>
</html>