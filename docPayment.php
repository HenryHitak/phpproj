<?php
    include 'conn.php';
    session_start();
    $_SESSION['userName'];
    $did = $_SESSION['did'];
    $dnam = $_SESSION['dname'];
    include 'dochead.php';

    $sql = "SELECT * FROM appointment INNER JOIN User_DB on appointment.userid = User_DB.userid WHERE DoctorID = '$did'";
    $result = mysqli_query($conn,$sql);

    $sqls = "SELECT * FROM Invoice WHERE DoctortName = '$dnam'";
    $inresult = mysqli_query($conn,$sqls);

?>
<div class="container">
    <div class="pay">
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
                    $patient = $row['firstName']." ".$row['lastName'];
                    $pemail = $row['email'];
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
    <div class="pay">
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
                <th scope="col">Payment status</th>
                <th scope="col">Edit invoice</th>
                <th scope="col">Send Email</th>
                </tr>
            </thead>
            <tbody class="table-group-divider text">
                <?php

                    while($rowss = mysqli_fetch_array($inresult)) {
                        $ano = $rowss['appointmentId'];
                        $pname = $rowss['PatientName'];
                        $email = $rowss['PatientEmail'];
                        $dname = $rowss['DoctortName'];
                        $appdate = $rowss['AppoDate'];
                        $vtime = $rowss['Vtime'];
                        $Ltime = $rowss['Ltime'];
                        $Total = $rowss['Total'];
                        $pcd = $rowss['pcd'];
                    
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
                        <td>$pcd</td>
                        <td><a href='./invoiceedit.php?no=$ano' class='btn btn-primary'>Edit</a></td>

                        <td><a href='./mailsend/invoicemail.php?no=$ano' class='btn btn-warning'>Send</a></td>

                        </tr>")
                        ;
                        
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php';?>