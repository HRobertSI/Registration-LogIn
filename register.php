<?php
session_start();

require_once './config.php';

$link = connectDatabase();

$registration_name='';

$registration_password='';

?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php 
            if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) //sticky form, if you leave the field empty or enter an invalid e-mail address, the correct fields keep the values TEST BY CLICKING SUBMIT
            {
                if (empty($_POST['registration_name']))  {echo "Erreur, votre nom d&#146utilisateur n&#146est pas correct! ";}
  
                if (empty($_POST['registration_password'])) {echo "Erreur, votre mot de passe n&#146est pas correct! ";}
                             
                if (!empty($_POST['registration_name']) && !empty($_POST['registration_password']))
                {
                $_SESSION['registration_name']=$_POST['registration_name'];
                $_SESSION['registration_password']=$_POST['registration_password'];
                registerNewUser($_SESSION['registration_name'], $_SESSION['registration_password']);
                header("Location: registrationsuccessful.php");
                exit;
                }
            }

if (isset($_POST['registration_name']))  {
    $registration_name=$_POST['registration_name'];
}


if (isset($_POST['registration_password']))  {
    $registration_password=$_POST['registration_password'];
}
?>
        
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <fieldset>
                <legend>Merci d'avoir choisi notre magasin. Choisissez votre nom d'utilisateur et le mot de passe s'il vous pla&#238t:</legend>
                Votre nom d'utilisateur: <input type="text" name="registration_name" value="<?= $registration_name ?>"> <br>
                Votre mot de passe: <input type="password" name="registration_password" value="<?= $registration_password ?>"><br>
                <input type="submit">
            </fieldset>
        </form>
    </body>
</html>
