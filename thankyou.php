<?php
require_once 'Swift-5.0.3/lib/swift_required.php';
require_once './config.php';
//session_start();

if (isset($_SESSION['registration_name'])) {
    $_SESSION['registration_or_login_mail'] = $_SESSION['registration_mail'];
} elseif (isset($_SESSION['login_name'])) {
    $login_name = $_SESSION['login_name'];
    $_SESSION['registration_or_login_mail'] = getLoginMail($login_name);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MERCI</title>
    </head>
    <body>
        <?php
            $cart = $_SESSION['cart'];
            echo "Merci ".$_SESSION['registration_or_login_name']. " pour votre achat.<br>";
            echo "Nous venons d&#146envoyer une confirmation &#224 ".$_SESSION['registration_or_login_mail'].".<br>";
            echo "Les produits achet&#233s: "."<br>";
            foreach ($cart as $value) {echo $value[2]."<br>";}
            uploadBoughtProducts($cart);
        ?>
    </body>
</html>

<?php

$name = $_SESSION['registration_or_login_name'];
$email = $_SESSION['registration_or_login_mail'];
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

