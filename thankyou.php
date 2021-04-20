<?php
//require_once 'Swift-5.0.3/lib/swift_required.php';
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MERCI</title>
    </head>
    <body>
        <?php
            echo "Merci ".$_SESSION['name']. " pour votre achat.<br>";
            echo "Nous venons d&#146envoyer une confirmation &#224 ".$_SESSION['mail'].".<br>";
        ?>
    </body>
</html>

<?php

/*$name = $_SESSION['name'];
$email = $_SESSION['mail'];
$text = "Nous avons plaisir de confirmer votre achat pour un total de ".array_sum(@$_SESSION['total'])." €. Merci.";


// Create the SMTP configuration
$transport = Swift_SmtpTransport::newInstance("w014e163.kasserver.com", 465, 'ssl');
$transport->setUsername("m058f5c3");
$transport->setPassword("L3N9Qq54FJpt7QM6");
 
// Create the message
$message = Swift_Message::newInstance();

//Set the adress
$message->setTo("$email");

$message->setSubject("Confirmation d'achat");
$message->setBody("$text");
$message->setFrom("robert@lllc.info", "Leone - LLLC");
 
// Send the email
$mailer = Swift_Mailer::newInstance($transport);

$result = $mailer->send($message);

/*if($result){
	echo "Message send ok";
}else{
	echo "Problems with sending the message";
}
*/
