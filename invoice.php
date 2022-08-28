<?php
    include 'conn.php';
    $query = "SELECT * FROM appointment";
    $result = mysqli_query($conn,$query);
    $_SESSION['userName'];
    include 'head.php';
?>

<?php
    if(isset($_GET['no'])){
        $idx = $_GET['no'];
        while($row = mysqli_fetch_array($result)) {
            if($row['appointmentId']==$idx) {
                $Dname = $row['DoctorName'];
                $Pname = $row['lastName'];
                $doa = $row['appointDate'];
                $atime = $row['appointTime'];
                $Pemail = $row['pemail'];
                $pass = $row['pass'];
                $dob = $row['dob'];
                $phone = $row['phone'];
                $addr = $row['addr'];
            }

        }
        echo "<form method='POST' action='".$_SERVER['PHP_SELF']."' style='width: 1000px; padding-left:13%;'>";
        echo "<h2>Payment</h2><section class='user'>";
        echo "<div><h4>Appointment Info</h4>";
        echo "<div>";
        echo "<label for='id'>ID number</label>";
        echo "<input name='id' class='form-control' value='".$idx."' disabled/>";
        echo "</div>";
        echo "<label for='Dname'>Doctor Name</label>";
        echo "<input name='Dname' class='form-control' value='".$Dname."' disabled/>";
        echo "<label for='Pname'>Patient Name</label>";
        echo "<input name='Pname' class='form-control' value='".$Pname."' disabled/>";
        echo "<label for='doa'>Appointment Date</label>";
        echo "<input name='doa' type='date' class='form-control' value='".$doa."' disabled/>";
        echo "<label for='atime'>Time</label>";
        echo "<input name='atime' class='form-control' value='".$atime."' disabled/>";
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
        echo "<input name='pemail' class='form-control' value='".$Pemail."' disabled/>";
        echo "</div></section>";
    }


?>
        <button type="submit">Save</button>
        <button type="button" onclick="location.href='./Payment.php';">Back</button>
    </section>
</form>
<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $no = $_POST['id'];
        $pname = $_POST['Pname'];
        $dname = $_POST['Dname'];
        $pemamil = $_POST['pemail'];
        $doa = $_POST['doa'];
        $atime = $_POST['atime'];
        $ftime = $_POST['ftime'];
        $pfile = $_POST['pflie'];
        $MSF = $_POST['MSF'];
        $MF = $_POST['MF'];
        $PF = $_POST['PF'];
        $total = $_POST['MSF']+$_POST['MF']+$_POST['PF'];
        $cTime = date();

        echo $no;

        $conn = mysqli_connect("localhost","root","","phpproj");
        $UsereditCMD = "UPDATE Invoice SET appointmentId='$no',PatientName='test$pname',DoctortName='$dname',PatientEmail='test$pemamil',AppoDate='$doa',Vtime='$atime',Ltime='$ftime',preFile='test$pfile',`MSF`='$MSF',MF='$MF',PF='$PF',Total='$total',doi='$cTime' pcd='not yet' WHERE appointmentId = $no";
        if(mysqli_query($conn,$UsereditCMD)){
            header("Location: http://localhost/phpproj/Patment.php");
        }else{
            echo "failed";
        }
    }
?>

<?php include 'footer.php';?>