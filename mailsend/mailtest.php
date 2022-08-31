<?php
    include '../conn.php';
    $query = "SELECT * FROM Invoice";
    $result = mysqli_query($conn,$query);
    session_start();
    $_SESSION['userName'];
    include '../head.php';
?>

<?php
     ini_set("SMTP", "aspmx.l.google.com");
     ini_set("sendmail_from", "heydoc.email@gmail.com");
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
                

                include('class.phpmailer.php');

                $mail = new PHPMailer(true);
                $mail->IsSMTP();

                try {
                $mail->Host       = "smtp.gmail.com";
                $mail->SMTPAuth   = true;
                $mail->Port       = 465;
                $mail->SMTPSecure = "ssl";
                $mail->Username   = "@gmail.com";
                $mail->Password   = "";

                $mail->AddAddress("nakhe90@gmail.com", "$Dname");
                $mail->SetFrom('heydoc.email@gmail.com', 'HeyDoc');

                $mail->Subject = "Dear $Dname, Here is your payment please pay it ASAP! ";
                $mail->MsgHTML("
                    <form method='POST' action='./edit/invoiceeditInput.php' style='width: 1000px; padding-left:13%;'>
                    <h2>Payment Edit</h2><section class='user'>
                    <div><h4>Appointment Info</h4>
                    <div>
                    <label for='id'>ID number</label>
                    <input name='id' class='form-control' value='".$idx."'/>
                    </div>
                    <label for='Dname'>Doctor Name</label>
                    <input name='Dname' class='form-control' value='".$Dname."'/>
                    <label for='Pname'>Patient Name</label>
                    <input name='Pname' class='form-control' value='".$Pname."'/>
                    <label for='doa'>Appointment Date</label>
                    <input name='doa' type='date' class='form-control' value='".$AppoDate."'/>
                    <label for='atime'>Time</label>
                    <input name='atime' class='form-control' value='".$Vtime."'/>
                    </div>
        
        
                    <div><h4>Prescription Info</h4>
                    <label for='type' >Finish Time</label>
                    <input name='ftime' value='".$Ltime."' type='number' class='form-control''/>
                    <label for='pflie'>Prescription</label>
                    <input name='pflie' type='file' value='".$preFile."' class='form-control' />
                    </div>
        
        
                    <div class='contact'><div><h4>Bill Info</h4>
                    <label for='MSF'>Medical Service Fee($)</label>
                    <input name='MSF' value='".$MSF."' class='form-control'/>
                    <label for='MF'>Medicine Fee($)</label>
                    <input name='MF' value='".$MF."' class='form-control'/>
                    <label for='PF'>Parking Fee($)</label>
                    <input name='PF' value='".$PF."' class='form-control'/>
                    <label for='pemail'>Patient Email</label>
                    <input name='pemail' class='form-control' value='".$Pemail."'/>
                    </div></section>
                
                ");
                //$mail->MsgHTML(file_get_contents('contents.html'));

                $mail->AddAttachment('ryan.jpg');

                $mail->Send();
                echo "Message Sent OK</p>\n";
                } catch (phpmailerException $e) {
                echo $e->errorMessage();
                } catch (Exception $e) {
                echo $e->getMessage();
                }
                
            }

        }
    }
?>

<button type="button" class='btn btn-primary' onclick="location.href='../Payment.php';">Back</button>

<?php include '../footer.php';?>




