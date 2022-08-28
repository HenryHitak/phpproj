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

    //echo "$total";
    $conns = mysqli_connect("localhost","root","","phpproj");

    //$invoiceinput = "INSERT INTO Invoice(appointmentId, PatientName, DoctortName, PatientEmail, AppoDate, Vtime, Ltime, preFile, MSF, MF, PF, Total, pcd) VALUES ('123','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]','[value-13]')";

    $insertCmd = "INSERT INTO Invoice (appointmentId,PatientName,DoctortName,PatientEmail,AppoDate,Vtime,Ltime,preFile,MSF,MF,PF,Total,pcd) VALUES ('$no','$pname','$dname','$pemamil','$doa','$atime','$ftime','$pfile','$MSF','$MF','$PF','$total','yet')";

    if(mysqli_query($conns,$insertCmd)){
        header("Location:Payment.php");
    }
?>