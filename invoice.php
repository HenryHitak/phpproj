<?php
    session_start();
    include 'conn.php';
    $did = $_SESSION['did'];
    $dnam = $_SESSION['dname'];

    $query = "SELECT * FROM appointment INNER JOIN User_DB on appointment.userid = User_DB.userid";
    $result = mysqli_query($conn,$query);
    include 'dochead.php';

?>

<?php
    if(isset($_GET['no'])){
        $idx = $_GET['no'];
        while($row = mysqli_fetch_array($result)) {
            if($row['appointmentId']==$idx) {
                $Dname = $row['DoctorName'];

                $userid = $row['userid'];
                $doa = $row['appointDate'];
                $atime = $row['appointTime'];
                $Pname = $row['firstName']." ".$row['lastName'];
                $Pmail = $row['email'];
                $pass = $row['pass'];
                $dob = $row['dob'];
                $phone = $row['phone'];
                $addr = $row['addr'];
                $doa = $row['appointDate'];
                $atime = $row['appointTime'];

            }

        }
        echo "<form method='POST' action='./edit/invoiceInput.php' enctype='multipart/form-data' style='width: 1000px; padding-left:13%;'>";
        echo "<h2>Payment</h2><section class='user'>";
        echo "<div><h4>Appointment Info</h4>";
        echo "<div>";
        echo "<label for='id'>ID number</label>";
        echo "<input name='id' class='form-control' value='".$idx."'/>";
        echo "</div>";
        echo "<label for='Dname'>Doctor Name</label>";
        echo "<input name='Dname' class='form-control' value='".$Dname."'/>";
        echo "<label for='Pname'>Patient number</label>";
        echo "<input name='Pname' class='form-control' value='".$userid."'/>";
        echo "<label for='Pname'>Patient Name</label>";
        echo "<input name='Pname' class='form-control' value='".$Pname."'/>";
        echo "<label for='doa'>Appointment Date</label>";
        echo "<input name='doa' type='date' class='form-control' value='".$doa."'/>";
        echo "<label for='atime'>Time</label>";
        echo "<input name='atime' class='form-control' value='".$atime."'/>";
        echo "</div>";


        echo "<div><h4>Prescription Info</h4>";
        echo "<label for='type'>Finish Time</label>";
        echo "<input name='ftime' type='number' class='form-control''/>";
        echo "<label for='pflie'>Prescription</label>";
        echo "<input name='pflie' type='file' class='form-control' type='email'/>";
        echo "</div>";


        echo "<div class='contact'><div><h4>Bill Info</h4>";
        echo "<label for='MSF'>Medical Service Fee($)</label>";
        echo "<input name='MSF' class='form-control'/>";
        echo "<label for='MF'>Medicine Fee($)</label>";
        echo "<input name='MF' class='form-control'/>";
        echo "<label for='PF'>Parking Fee($)</label>";
        echo "<input name='PF' class='form-control'/>";
        echo "<label for='pemail'>Patient Email</label>";
        echo "<input name='pemail' class='form-control' value='".$Pmail."'/>";
        echo "</div></section>";
    }
?>
        <button type="submit" class='btn btn-primary'>Save</button>
        <button type="button" class='btn btn-primary' onclick="location.href='./Payment.php';">Back</button>
    </section>
</form>


<?php include 'footer.php';?>