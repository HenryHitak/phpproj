<?php include 'header.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <table class="table">
        <thead>
        <tr>
        <th>Patient Name</th>
        <th>Patient Email</th>
        <th>Patient Password</th>
        <th>Patient Gender</th>
        <th>Patient Department</th>
        <th>Patient Information</th>
        <th></th>
        <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        include 'conn.php';
        $sql = "SELECT * FROM patientrecords";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            $id= $row['PatientID'];
			echo "<td>" . $row['PatientName'] . "</td>";
            echo "<td>" . $row['PatientEmail'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['PatientGender'] . "</td>";
            echo "<td>" . $row['PatientDepartment'] . "</td>";
            echo "<td>" . $row['PatientDetails'] . "</td>";
            ?>
            <td> <button class="btn btn-primary"><a href="patientupdate.php?GetID=<?php echo $id; ?>" style="color: white;">Update</a></button> </td>
            <td> <button class="btn btn-primary"><a href="patientrecorddelete.php?Del='<?php echo $id;?>'" style="color: white;">Delete</a></button> </td>
            <?php
			echo "</tr>";
            }
            }
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php include 'footer.php';?>