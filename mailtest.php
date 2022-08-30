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
                
                
                
                $to = "$Pemail";
                $subject = "Dear $Dname, Here is your payment detail. please pay it ASAP!";
                $body = "Hi $Dname  your total price is $Total !!!!";
                $header = "From: from@email";
              
                if (mail($to, $subject, $body, $header)) {
                   echo("the Mail is Successfully sent");
                } else {
                   echo("Failed");
                }
            }

        }
    }
?>

<button type="button" class='btn btn-primary' onclick="location.href='./Payment.php';">Back</button>

<?php include 'footer.php';?>




