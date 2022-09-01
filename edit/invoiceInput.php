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

    $insertCmd = "INSERT INTO Invoice (appointmentId,PatientName,DoctortName,PatientEmail,AppoDate,Vtime,Ltime,preFile,MSF,MF,PF,Total,pcd) VALUES ('$no','$pname','$dname','$pemamil','$doa','$atime','$ftime','$pfile','$MSF','$MF','$PF','$total','yet')";
    if(mysqli_query($conns,$insertCmd)){
        header("Location:../docPayment.php");
    }
?>