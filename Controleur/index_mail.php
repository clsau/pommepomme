<html>
<head>
	<title> Titre Super Stylé </title>
</head>
	<body>
<?php
$to       = '[adresse-du-receveur]';
$subject  = 'Testing sendmail.exe';
$message  = 'On a réussi à 16h27';
$headers  = 'From: [adresse-de-l\'envoyeur]' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=utf-8';
if(mail($to, $subject, $message, $headers))
    echo "Email sent";
else
    echo "Email sending failed";
?>
	</body>
</html>