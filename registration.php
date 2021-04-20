<?php
session_start();
?>

<!DOCTYPE HTML>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>


<?php 
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) //sticky form, if you leave the field empty or enter an invalid e-mail address, the correct fields keep the values TEST BY CLICKING SUBMIT
{
  if (empty($_POST['name']))  {echo "Erreur, votre nom d&#146utilisateur n&#146est pas correct! ";}
  
  if (empty($_POST['password'])) {echo "Erreur, votre mot de passe n&#146est pas correct! ";}
  
  if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {echo "Erreur, votre courriel n&#146est pas correct! ";}
                           
  if (!empty($_POST['name']) && !empty($_POST['password']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
  {
      $_SESSION['name']=$_POST['name'];
      $_SESSION['mail']=$_POST['mail'];
      header("Location: thankyou.php");
      
  }
}
$name=''; // to naj bi blo bolj čisto programiranje kot to pod 41 in 42
if (isset($_POST['name']))  {
    $name=$_POST['name'];
}
?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
<fieldset>
<legend>Merci d'avoir choisi notre magasin. Saissisez votre nom d'utilisateur, le mot de passe et le courriel s'il vous pla&#238t:</legend>
Votre nom d'utilisateur: <input type="text" name="name" value="<?= $name ?>"> <br>
Votre mot de passe: <input type="text" name="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"><br>
Votre mot courriel: <input type="text" name="mail" value="<?php if (isset($_POST['mail'])) echo $_POST['mail']; ?>"><br>
<input type="submit">
</fieldset>
</form>
</html>