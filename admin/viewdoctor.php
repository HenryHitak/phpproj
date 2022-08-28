<?php include 'header.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>doctorwiew</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <table class="table">
        <thead>
        <tr>
        <th>Doctor Name</th>
        <th>Doctor's Number</th>
        <th>Doctor Gender</th>
        <th>Doctor Speciality</th>
        <th>Doctor Information</th>
        <th></th>
        <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        include 'conn.php';
        $sql = "SELECT * FROM doctorrecords";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            $id= $row['DoctorID'];
			echo "<td>" . $row['DoctorName'] . "</td>";
            echo "<td>" . $row['DoctorNumber'] . "</td>";
            echo "<td>" . $row['DoctorGender'] . "</td>";
            echo "<td>" . $row['DoctorSpeciality'] . "</td>";
            echo "<td>" . $row['DoctorBio'] . "</td>";
            ?>
            <td> <button class="btn btn-primary"><a href="doctorupdate.php?GetID=<?php echo $id; ?>" style="color: white;">Update</a></button> </td>

            <td> <button class="btn btn-primary"><a href="doctorrecorddelete.php?Del='<?php echo $id;?>'" style="color: white;">Delete</a></button> </td>
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