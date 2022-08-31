<html>
<head>
<title>PHPMailer - SMTP advanced test with authentication</title>
</head>
<body>

<?php
include('class.phpmailer.php');

$mail = new PHPMailer(true);
$mail->IsSMTP();

try {
  $mail->Host       = "smtp.gmail.com";
  $mail->SMTPAuth   = true;
  $mail->Port       = 465;
  $mail->SMTPSecure = "ssl";
  $mail->Username   = "heydoc.email@gmail.com";
  $mail->Password   = "fhickcsztesnjifo";

  $mail->AddAddress('nakhe90@gmail.com', 'test');
  $mail->SetFrom('heydoc.email@gmail.com', 'test');

  $mail->Subject = 'PHPMailer Test Subject';
  $mail->MsgHTML('Body message !');
  //$mail->MsgHTML(file_get_contents('contents.html'));

  $mail->AddAttachment('ryan.jpg');

  $mail->Send();
  echo "Message Sent OK</p>\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage();
} catch (Exception $e) {
  echo $e->getMessage();
}
?>

</body>
</html>
