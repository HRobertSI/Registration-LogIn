<?php
session_start();
require_once './config.php';
?>
<?php

$id=$_GET['id'];

function getProductName($id){
    
    $link = connectDatabase();
    
    $query = "SELECT gname FROM gloves WHERE gID =".$id;
    
    $result = mysqli_query($link, $query);
    $result = $result->fetch_array();
    $productname = $result[0];
    
    mysqli_close($link);

    return $productname;
}


function getProductPrice($id){
    
    $link = connectDatabase();
    
    $query = "SELECT gprice FROM gloves WHERE gID =".$id;
    
    $result = mysqli_query($link, $query);
    $result = $result->fetch_array();
    $productprice = floatval($result[0]);
    
    mysqli_close($link);

    return $productprice;
    
}

function getProductCode($id){
    
    $link = connectDatabase();
    
    $query = "SELECT gcode FROM gloves WHERE gID =".$id;
    
    $result = mysqli_query($link, $query);
    $result = $result->fetch_array();
    $productcode = $result[0];
    
    mysqli_close($link);

    return $productcode;
    
}

$productname = getProductName($id);
$productprice = getProductPrice($id);
$productcode = getProductCode($id);

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

$_SESSION['cart'][] = array($productname, $productprice, $productcode);

   
$_SESSION['total']=[];  
foreach ($_SESSION['cart'] as $value ) {
echo $value[1]."<br>"; //za samo delovanje programa nepomembna vrstica
$_SESSION['total'][] = $value[1]; // tu gradim niz, ki se na koncu sešteje v store.php z array_sum($total)
}



header("Location: store.php");

?>