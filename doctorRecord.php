<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
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