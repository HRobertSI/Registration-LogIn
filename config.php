<?php

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

function registerNewUser($registration_name, $registration_password) {
    $link = connectDatabase();
    
    $username = mysqli_real_escape_string($link, $registration_name);
    $password = mysqli_real_escape_string($link, $registration_password);
    
    $query = "INSERT INTO RegLogIn (username, password) VALUES ('$username', '$password')";

    mysqli_query($link, $query);
    mysqli_close($link);
    
    
}
    