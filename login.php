<?php

require_once './config.php';

$link = connectDatabase();

$login_name='';

$login_password='';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $login_name = filter_input(INPUT_POST, 'login_name');
    $login_password = filter_input(INPUT_POST, 'login_password');

        
    $login_result = login($login_name, $login_password);
    if ($login_result == 1){
        $_SESSION['login_name'] = $login_name;
        header('Location: store.php');
        exit;
    } elseif ($login_result != 1) {
    echo "Fausses informations d'identification";
}
}

?>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <fieldset>
                <legend>Merci d'avoir choisi notre magasin. Saisissez votre nom d'utilisateur et le mot de passe s'il vous pla&#238t:</legend>
                Votre nom d'utilisateur: <input type="text" name="login_name" value="<?= $login_name ?>"><br>
                Votre mot de passe: <input type="password" name="login_password" value="<?= $login_password ?>"><br>
                <input type="submit">
            </fieldset>
        </form>
    </body>
</html>
