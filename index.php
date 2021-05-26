<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Bienvenue sur notre site</h1>
        <h2>Enregistrez-vous pour devenir membre ou identifiez-vous</h2>
        <form method="post">
            <input type="submit" value="Devenir membre" name="register">
            <input type="submit" value="S'identifier" name="login">
        </form>
        
  <?php
    extract($_POST); // I prefer submit buttons in the form, in this case the extract() function seems the best
    if(isset($register)) {header('Location: register.php');}
    if(isset($login)) {header('Location: login.php');}
    exit;
  ?>
        
    </body>
</html>
