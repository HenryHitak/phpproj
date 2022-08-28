<?php
  include 'conn.php';
  session_start();
  $_SESSION['userName'];
  include 'head.php';

  $sql = "SELECT * FROM appointment";
  $result = mysqli_query($conn,$sql);

  $insql = "SELECT * FROM Invoice";
  $inresult = mysqli_query($conn,$insql);
?>
<div class="Users">
    <div class="User_Table">
        <h2>Appointment List</h2>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Appointment Num</th>
                <th scope="col">Doctor</th>
                <th scope="col">Speciality</th>
                <th scope="col">Doctor Name</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Patient Email</th>
                <th scope="col">Appointment Date</th>
                <th scope="col">Appointment time</th>
                <th scope="col">Invoice Write</th>
                </tr>
            </thead>
            <tbody class="table-group-divider text">
                <?php
                    while($row = mysqli_fetch_array($result)) {
                        $ano = $row['appointmentId'];
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
                        <td>$dname</td>
                        <td>$special</td>
                        <td>$doctor</td>
                        <td>$patient</td>
                        <td>$pemail</td>
                        <td>$adate</td>
                        <td>$atime</td>
                        <td><a href='./invoice.php?no=$ano'class='btn btn-primary'>Invoice</a></td>
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
                <th scope="col">Patient Email</th>
                <th scope="col">Doctor Name</th>
                <th scope="col">Appointment Date</th>
                <th scope="col">Visit Time</th>
                <th scope="col">Leave Time</th>
                <th scope="col">Total Cost</th>
                <th scope="col">Edit invoice</th>
                <th scope="col">Send Email</th>
                <th scope="col">Payment(yet/finish)</th>
                </tr>
            </thead>
            <tbody class="table-group-divider text">
                <?php

                    while($rows = mysqli_fetch_array($inresult)) {
                        $ano = $rows['appointmentId'];
                        $pname = $rows['PatientName'];
                        $email = $rows['PatientEmail'];
                        $dname = $rows['DoctortName'];
                        $appdate = $rows['AppoDate'];
                        $vtime = $rows['Vtime'];
                        $Ltime = $rows['Ltime'];
                        $Total = $rows['Total'];
                    
                        echo("
                        <tr>
                        <td>$ano</td>
                        <td>$pname</td>
                        <td>$email</td>
                        <td>$dname</td>
                        <td>$appdate</td>
                        <td>$vtime</td>
                        <td>$Ltime</td>
                        <td>$Total</td>
                        <td><a href='#'class='btn btn-primary'>Edit</a></td>
                        <td><a href='#'class='btn btn-primary'>Send</a></td>
                        <td><a href='#'class='btn btn-primary'>Pay</a></td>
                        </tr>")
                        ;
                        
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php';?>