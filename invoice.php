<?php
    include 'conn.php';

    $query = "SELECT * FROM appointment";
    $result = mysqli_query($conn,$query);
    $_SESSION['userName'];
    include 'head.php';

    session_start();
    $_SESSION['userName'];
    include 'head.php';
    $query = "SELECT * FROM appointment";
    $result = mysqli_query($conn,$query);

?>

<?php
    if(isset($_GET['no'])){
        $idx = $_GET['no'];
        while($row = mysqli_fetch_array($result)) {
            if($row['appointmentId']==$idx) {
                $Dname = $row['DoctorName'];

                $Pname = $row['pname'];
                $doa = $row['appointDate'];
                $atime = $row['appointTime'];
                $Pemail = $row['pemail'];
                $pass = $row['pass'];
                $dob = $row['dob'];
                $phone = $row['phone'];
                $addr = $row['addr'];

                $Pname = "t";//.$row['pname']
                $doa = $row['appointDate'];
                $atime = $row['appointTime'];
                $Pemail = "t";//.$row['pemail']

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
        echo "<input name='pemail' class='form-control' value='".$Pemail."'/>";
        echo "</div></section>";
    }
?>
        <button type="submit" class='btn btn-primary'>Save</button>
        <button type="button" class='btn btn-primary' onclick="location.href='./Payment.php';">Back</button>
    </section>
</form>


<?php include 'footer.php';?>