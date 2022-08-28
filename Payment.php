<?php
  include 'conn.php';
  session_start();
  $_SESSION['userName'];
  include 'head.php';

  $sql = "SELECT * FROM appointment";
  $result = mysqli_query($conn,$sql);
?>
<div class="Users">
    <div class="User_Table">
        <h2>Appointment List</h2>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Appointment Num</th>
                <th scope="col">Doc ID</th>
                <th scope="col">Doctor</th>
                <th scope="col">Speciality</th>
                <th scope="col">Doctor Name</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Patient Phone</th>
                <th scope="col">Patient Email</th>
                <th scope="col">Appointment Date</th>
                <th scope="col">Appointment time</th>
                </tr>
            </thead>
            <tbody class="table-group-divider text">
                <?php
                    while($row = mysqli_fetch_array($result)) {
                        $ano = $row['appointmentId'];
                        $dnum = $row['DoctorNumber'];
                        $dname = $row['DoctorName'];
                        $special = $row['DoctorSpeciality'];
                        $doctor = $row['DoctorName'];
                        $patient = $row['Patient'];
                        $pphone = $row['Pphone'];
                        $pemail = $row['Pemail'];
                        $adate = $row['appointDate'];
                        $atime = $row['appointTime'];
                    
                        echo("
                        <tr>
                        <td>$ano</td>
                        <td>$dnum</td>
                        <td>$dname</td>
                        <td>$special</td>
                        <td>$doctor</td>
                        <td>$patient</td>
                        <td>$pphone</td>
                        <td>$pemail</td>
                        <td>$adate</td>
                        <td>$atime</td>
                        <td><a href='./userUpdate.php?no=$invoice'class='btn btn-primary'>charge</a></td>
                        ");
                    }
                ?>
            </tbody>
        </table>
    </div>
    <hr>
    <div class="User_Table">
        <h2>Invoice List</h2>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Appointment Num</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Doctor Name</th>
                <th scope="col">Appointment Date</th>
                <th scope="col">Edit invoice</th>
                <th scope="col">Send Email</th>
                </tr>
            </thead>
            <tbody class="table-group-divider text">
                <?php

                    while($row = mysqli_fetch_array($result)) {
                        $ano = $row['appoint_num'];
                        $pname = $row['patient_name'];
                        $email = $row['email'];
                        $UserID = $row['user_num'];
                        $doctor = $row['doctor'];
                        $adate = $row['adate'];
                        $atime = $row['atime'];
                        $memo = $row['memo'];
                    
                        echo("
                        <tr>
                        <td>$ano</td>
                        <td>$pname</td>
                        <td>$email</td>
                        <td>$UserID</td>
                        <td>$doctor</td>
                        <td>$adate</td>
                        <td>$atime</td>
                        <td>$memo</td>
                        <td><a href='./userUpdate.php?no=$invoice'class='btn btn-primary'>Cost</a></td>
                        ");
                        
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php';?>