<?php
session_start();
/*
$host = "localhost";
$user = "lllcuser";
$password = "qwert123";
$dataBase = "lllc";
*/

define('host', "localhost");
define('user', "lllcuser");
define('password', "qwert123");
define('dataBase', "lllc");

function connectDatabase(){
//global $host, $user, $password, $dataBase; // z "global" pokličem spremenljivko, ki je bila deklarirana izven funkcije; brez global bi bila to lokalna spremenljivka znotraj funkcije z drugo vrednostjo
//$con = mysqli_connect($host, $user, $password, $dataBase);
$con = mysqli_connect(host, user, password, dataBase);
return $con;
mysqli_set_charset($dbc,'utf-8');
}

function registerNewUser($registration_name, $registration_password, $registration_mail) {
    
    $salt = getSalt();
    $password = crypt($registration_password, $salt);
    
    $link = connectDatabase();
    
    $username = mysqli_real_escape_string($link, $registration_name);
    //$password = mysqli_real_escape_string($link, $registration_password);
    
    $mail = mysqli_real_escape_string($link, $registration_mail);
    
    $query = "INSERT INTO RegLogIn (username, password, mail) VALUES ('$username', '$password', '$mail')";
    
    mysqli_query($link, $query);
    mysqli_close($link);
    
    
}

function getSalt() {
    $salt_temp = str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ");
    $salt = '$5$' . substr($salt_temp, 0, 16); // I use SHA-256
    return $salt;
}

function getAllGloves() { //download gloves to present them in store.php
    
    $link = connectDatabase();
    
    $query = "SELECT * FROM gloves";
    
    $result = mysqli_query($link, $query);
    
    mysqli_close($link);

    return $result;
              
}

/*function numberOfProducts(){
    
    $link = connectDatabase();
    
    $query = "SELECT COUNT(gID) FROM gloves";
    
    $result = mysqli_query($link, $query);
    
    $result = $result->fetch_array();
    $quantity = intval($result[0]);
       
    mysqli_close($link);

    return $quantity;
   
}*/

function uploadBoughtProducts($cart){ //to keep statistics of purchases in the separate table BoughtProducts
    $link = connectDatabase();
    
    $cart = $_SESSION['cart'];
    
    $name_of_buyer = $_SESSION['registration_or_login_name'];
    
    $username = mysqli_real_escape_string($link, $name_of_buyer);
    
    $query = "SELECT UserID FROM RegLogIn where username = '$username'";
           
    $result = mysqli_query($link, $query);
    $result = $result->fetch_array();
    $UserID = $result[0];
    
    foreach ($cart as $value) {
    $query2 = "INSERT INTO BoughtProducts (UserID, bought_products) VALUES ('$UserID', '$value[2]')";
    mysqli_query($link, $query2);
    }
    
    mysqli_close($link);

}

function login($login_name, $login_password) {
    $link = connectDatabase();

    $login_name = mysqli_real_escape_string($link, $login_name);

    $query = "SELECT * FROM RegLogIn WHERE username='$login_name'";

    $result = mysqli_query($link, $query);

    $user = $result->fetch_array();
    

    mysqli_close($link);
    
    if ($user) {
        $hash = $user['password'];
        if ($hash == crypt($login_password, $hash)) {

            $_SESSION["UserID"] = $user['UserID'];
            $_SESSION["username"] = $user['username'];
            $_SESSION["isAdmin"] = $user['isAdmin'];
            
            if ($_SESSION["isAdmin"] == 1){return "isAdmin";} else {return "notAdmin";}
            
            } else {
            return false;
        }
    } else {
        return false;
    }
}

function getLoginMail($login_name) { //when the user logs in, he doesn't enter his e-mail address, but we need this address when sending a confirmation mail
    $link = connectDatabase();
    
    $login_name = mysqli_real_escape_string($link, $login_name);

    $query = "SELECT mail FROM RegLogIn WHERE username='$login_name'";
    
    $result = mysqli_query($link, $query);

    $result = $result->fetch_array();
    
    $login_mail = $result['mail'];
    
    mysqli_close($link);
    
    return $login_mail;
}

function checkIfMailExists($registration_mail) { //this function prevents registration of a second user with an already registered e-mail
    
    $link = connectDatabase();
    
    $query = "SELECT mail FROM RegLogIn WHERE mail = '$registration_mail'";
    
    $result = mysqli_num_rows(mysqli_query($link, $query));
    
    if($result != 0){
        return true;
    }
    
    mysqli_close($link);
    
}

function checkIfCodeExists($add_code) {
    
    $link = connectDatabase();
    
    $query = "SELECT gcode FROM gloves WHERE gcode = '$add_code'";
    
    $result = mysqli_num_rows(mysqli_query($link, $query));
    
    if($result != 0){
        return true;
    }
    
    mysqli_close($link);    
    
}

function addProduct($add_typ, $add_nom, $add_couleur, $add_code, $add_prix, $add_taille, $add_image) {
    
    $link = connectDatabase();
    
    $query = "INSERT INTO gloves (gtype, gname, gcolour, gcode, gprice, gsize, gimage) VALUES ('$add_typ', '$add_nom', '$add_couleur', '$add_code', '$add_prix', '$add_taille', '$add_image')";
    
    mysqli_query($link, $query);
    
    mysqli_close($link);
}