<?php
    include 'conn.php';
    $query = "SELECT * FROM Invoice";
    $result = mysqli_query($conn,$query);
    session_start();
    $_SESSION['userName'];
    include 'head.php';
?>

<?php
    if(isset($_GET['no'])){
        $idx = $_GET['no'];
        while($row = mysqli_fetch_array($result)) {
            if($row['appointmentId']==$idx) {
                $Dname = $row['DoctortName'];
                $Pname = $row['PatientName'];
                $Pemail = $row['PatientEmail'];
                $AppoDate = $row['AppoDate'];
                $Vtime = $row['Vtime'];
                $Ltime = $row['Ltime'];
                $preFile = $row['preFile'];
                $MSF = $row['MSF'];
                $MF = $row['MF'];
                $PF = $row['PF'];
                $Total = $row['Total'];
                $pcd = $row['pcd'];
                $_SESSION['dele'] = $idx;
            }

        }
        echo "<form method='POST' action='invoiceeditInput.php' style='width: 1000px; padding-left:13%;'>";
        echo "<h2>Payment Edit</h2><section class='user'>";
        echo "<div><h4>Appointment Info</h4>";
        echo "<div>";
        echo "<label for='id'>ID number</label>";
        echo "<input name='id' class='form-control' value='".$idx."'/>";
        echo "</div>";
        echo "<label for='Dname'>Doctor Name</label>";
        echo "<input name='Dname' class='form-control' value='".$Dname."'/>";
        echo "<label for='Pname'>Patient Name</label>";
        echo "<input name='Pname' class='form-control' value='".$Pname."'/>";
        echo "<label for='doa'>Appointment Date</label>";
        echo "<input name='doa' type='date' class='form-control' value='".$AppoDate."'/>";
        echo "<label for='atime'>Time</label>";
        echo "<input name='atime' class='form-control' value='".$Vtime."'/>";
        echo "</div>";


        echo "<div><h4>Prescription Info</h4>";
        echo "<label for='type' >Finish Time</label>";
        echo "<input name='ftime' value='".$Ltime."' type='number' class='form-control''/>";
        echo "<label for='pflie'>Prescription</label>";
        echo "<input name='pflie' type='file' value='".$preFile."' class='form-control' />";
        echo "</div>";


        echo "<div class='contact'><div><h4>Bill Info</h4>";
        echo "<label for='MSF'>Medical Service Fee($)</label>";
        echo "<input name='MSF' value='".$MSF."' class='form-control'/>";
        echo "<label for='MF'>Medicine Fee($)</label>";
        echo "<input name='MF' value='".$MF."' class='form-control'/>";
        echo "<label for='PF'>Parking Fee($)</label>";
        echo "<input name='PF' value='".$PF."' class='form-control'/>";
        echo "<label for='pemail'>Patient Email</label>";
        echo "<input name='pemail' class='form-control' value='".$Pemail."'/>";
        echo "</div></section>";
    }
?>
        <a href='./invoicedelet.php' class="btn btn-danger">Del</a>
        <button type="submit" class='btn btn-primary'>Save</button>
        <button type="button" class='btn btn-primary' onclick="location.href='./Payment.php';">Back</button>
    </section>
</form>


<?php include 'footer.php';?>