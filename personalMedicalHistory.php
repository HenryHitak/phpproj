<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Document</title>
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
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
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
<body>
  <div class="container1">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <input type="text" name="firstName" placeholder="First Name" require><br><br>
      <input type="text" name="lastName" placeholder="Last Name" require><br><br>
      <input type="text" name="age" placeholder="Age" require><br><br>
      <input type="text" name="dob" placeholder="Day of birth" require><br><br>
      <input type="text" name="phone" placeholder="Phone" require><br><br>
      <input type="text" name="dateOfConsult" placeholder="Date of consult" require><br><br>
      <textarea name="details" placeholder="details about the consult" cols = "70" rows = "20" require ></textarea><br><br>
    <button class="btn btn-outline-primary" type="submit" name="reg">Register</button>
  </form>

  </div>
  <table class="table table-striped">
    <?php
    // Creating and populating the table with the information we have in database
    $dbUsername = "root";
    $dbServername = "localhost";
    $dbPass = "";
    $dbname = "phpproj";
    $dbCon = new mysqli($dbServername,$dbUsername,$dbPass,$dbname);
    $sql = "SELECT * FROM personalmedicalhistory";
    $resultSelect = $dbCon->query($sql);
    if($resultSelect->num_rows > 0){
      echo "<tr>";
      echo "<th>id</th>";
      echo "<th>First Name</th>";
      echo "<th>Last Name</th>";
      echo "<th>Age</th>";
      echo "<th>Day Of Birth</th>";
      echo "<th>Phone</th>";
      echo "<th>Date of consult</th>";
      echo "<th>Details</th>";
      echo "<th>Actions</th>";
      echo "</tr>";
      while($row = $resultSelect->fetch_assoc()){
        echo "<tr>";
          echo "<td>";
            echo $row["id"];
          echo "</td>";
          echo "<td>";
            echo $row["firstName"];
          echo "</td>";
          echo "<td>";
            echo $row["lastName"];
          echo "</td>";
          echo "<td>";
            echo $row["age"];
          echo "</td>";
          echo "<td>";
            echo $row["dob"];
          echo "</td>";
          echo "<td>";
            echo $row["phone"];
          echo "</td>";
          echo "<td>";
            echo $row["dateOfConsult"];
          echo "</td>";
          echo "<td>";
            echo $row["datails"];
          echo "</td>";
          echo "<td>";
            echo '<a class="btn btn-primary" href="updatePersonalMedical.php?edit=<?php echo'.$row["id"].';?">update</a>';
            echo '<a class="btn btn-danger" href="personalmedicalhistory.php?delete='.$row["id"].'">delete</a>';
          echo "</td>";
        echo "</tr>";
      }
    }else{
      echo "No results";
    }
     // deleting from the database using delete button;
    if (isset($_GET['delete'])){
      $id = $_GET['delete'];
      $dbCon->query("DELETE FROM personalmedicalhistory where id=$id");
      header("Location:personalmedicalhistory.php");
    }

    // editing the data in database with the button;
    if (isset($_GET['edit'])){
      header("Location:login.php");
    }
    ?>
  </table>
  <?php
      if($_SERVER['REQUEST_METHOD'] == "POST"){
      // 
      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $age = $_POST['age'];
      $dob = $_POST['dob'];
      $phone = $_POST['phone'];
      $phone = $_POST['dateOfConsult'];
      $details = $_POST['details'];

      $dbUsername = "root";
      $dbServername = "localhost";
      $dbPass = "";
      $dbname = "phpproj";
      $dbCon = new mysqli($dbServername,$dbUsername,$dbPass,$dbname);
      if($dbCon->connect_error){
        die('Connection error'.$dbCon->connect_error);
      }else{
        // Inserting new medial register
        $insertCmd = "INSERT INTO personalmedicalhistory (firstName,lastName,age,dob,phone,dateOfConsult,datails) values ('".$_POST['firstName']."','".$_POST['lastName']."','".$_POST['age']."','".$_POST['dob']."','".$_POST['phone']."','".$_POST['dateOfConsult']."','".$_POST['details']."')";
        $result = $dbCon->query($insertCmd);
        header("location: personalmedicalhistory.php");
        if($result === true){
          echo "<h1 style='color: green;> Done!!!</h1>'";
        }else{
          echo "<h1 style='color: red;'>".$dbCon->error."</h1>";
        }
        $dbCon->close();
      }
    }
  ?>
</body>
</html>