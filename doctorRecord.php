<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
  <style>
  a{
    margin-left: 10%;
  }
  body{
    display:flex;
    flex-direction: column;
  }
  h1{
    display:flex;
    justify-content: center;
    margin: 2%;
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
  </style>
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
<h1>Doctor Record</h1>       
<table class="table">
    <?php
    // Creating and populating the table with the information we have in database
    $dbUsername = "root";
    $dbServername = "localhost";
    $dbPass = "";
    $dbname = "phpproj";
    $dbCon = new mysqli($dbServername,$dbUsername,$dbPass,$dbname);
    $sql = "SELECT * FROM doctorrecords";
    $resultSelect = $dbCon->query($sql);
    if($resultSelect->num_rows > 0){
      echo "<tr>";
      echo "<th>Doctor ID</th>";
      echo "<th>Name</th>";
      echo "<th>Number</th>";
      echo "<th>Gender</th>";
      echo "<th>Speciality</th>";
      echo "<th>Bio</th>";
      echo "</tr>";
      while($row = $resultSelect->fetch_assoc()){
        echo "<tr>";
          echo "<td>";
            echo $row["DoctorID"];
          echo "</td>";
          echo "<td>";
            echo $row["DoctorName"];
          echo "</td>";
          echo "<td>";
            echo $row["DoctorNumber"];
          echo "</td>";
          echo "<td>";
            echo $row["DoctorGender"];
          echo "</td>";
          echo "<td>";
            echo $row["DoctorSpeciality"];
          echo "</td>";
          echo "<td>";
            echo $row["DoctorBio"];
          echo "</td>";
        echo "</tr>";
      }
    }else{
      echo "No results";
    }
    ?>
  </table>
</body>
</html>