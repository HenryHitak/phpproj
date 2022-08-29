<?php
    $no = $_POST['id'];
    $pname = $_POST['Pname'];
    $dname = $_POST['Dname'];
    $pemamil = $_POST['pemail'];
    $doa = $_POST['doa'];
    $atime = $_POST['atime'];
    $ftime = $_POST['ftime'];
    $pfile = "test";
    $MSF = $_POST['MSF'];
    $MF = $_POST['MF'];
    $PF = $_POST['PF'];
    $total = $_POST['MSF']+$_POST['MF']+$_POST['PF'];

    $conns = mysqli_connect("localhost","root","","phpproj");

    $insertCmd = "UPDATE Invoice SET appointmentId ='$no', PatientName='$pname', DoctortName='$dname',PatientEmail='$pemamil',AppoDate='$doa',Vtime='$atime',Ltime='$ftime',preFile='$pfile',MSF='$MSF',MF='$MF',PF='$PF',Total='$total',pcd='yet'  where appointmentId=$no";

    if(mysqli_query($conns,$insertCmd)){
        header("Location:../Payment.php");
    }
?>