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
    
    $salt = getSalt();
    $password = crypt($registration_password, $salt);
    
    $link = connectDatabase();
    
    $username = mysqli_real_escape_string($link, $registration_name);
    //$password = mysqli_real_escape_string($link, $registration_password);
    
    $query = "INSERT INTO RegLogIn (username, password) VALUES ('$username', '$password')";

    mysqli_query($link, $query);
    mysqli_close($link);
    
}

function getSalt() {
    $salt_temp = str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ");
    $salt = '$5$' . substr($salt_temp, 0, 16); // I use SHA-256
    return $salt;
}

function getAllGloves() {
    
    $link = connectDatabase();
    
    $query = "SELECT * FROM gloves";
    
    $result = mysqli_query($link, $query);
    
    mysqli_close($link);

    return $result;
              
}

function numberOfProducts(){
    
    $link = connectDatabase();
    
    $query = "SELECT COUNT(gID) FROM gloves";
    
    $result = mysqli_query($link, $query);
    
    $result = $result->fetch_array();
    $quantity = intval($result[0]);
       
    mysqli_close($link);

    return $quantity;
   
}