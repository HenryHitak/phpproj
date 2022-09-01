<?php
    include '../conn.php';
    $query = "SELECT * FROM Invoice";
    $result = mysqli_query($conn,$query);
    session_start();
    $did = $_SESSION['did'];
    $dnam = $_SESSION['dname'];
    $_SESSION['userName'];
    include './dochead.php';
?>

<?php
     ini_set("SMTP", "aspmx.l.google.com");
     ini_set("sendmail_from", "heydocmailtest@gmail.com");
    if(isset($_GET['up'])){
        $idx = $_GET['up'];
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
                $mail->Username   = "heydocmailtest@gmail.com";
                $mail->Password   = "";

                $mail->AddAddress("nakhe90@gmail.com", "$Dname");
                $mail->SetFrom('heydoc.email@gmail.com', 'HeyDoc');

                $mail->Subject = "Dear $Dname, Your appointment has been confirm! ";
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
 
                    <label for='pemail'>Patient Email</label>
                    <input name='pemail' class='form-control' value='".$Pemail."'/>
                    </div></section>
                
                ");
                //$mail->MsgHTML(file_get_contents('contents.html'));

                $no = $_GET['up'];

                $conns = mysqli_connect("localhost","root","","phpproj");

                $insertCmd = "UPDATE appointment SET confimation='confirmed' where appointmentId=$no";

                mysqli_query($conns,$insertCmd);



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

<button type="button" class='btn btn-primary' onclick="location.href='../docPayment.php';">Back</button>

<?php include '../footer.php';?>




