<?php
    include 'conn.php';
    session_start();
    include 'head.php';

    $sql = "SELECT * FROM Invoice WHERE PatientEmail = '".$_SESSION['userName']."'";
    $result = mysqli_query($conn,$sql);
?>
<div class="Users">
    <div class="pay">
        <h2>My Invoice List</h2>
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
                <th scope="col">Payment</th>
                </tr>
            </thead>
            <tbody class="table-group-divider text">
                <?php

                    while($rowss = mysqli_fetch_array($result)) {
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

                        <td><a href='./mailsend/mailtest.php?no=$ano' class='btn btn-warning'>Send</a></td>

                        <td><a href='./edit/paycheck.php?no=$ano' class='btn btn-dark'>Pay</a></td>
                        </tr>")
                        ;
                        
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php';?>