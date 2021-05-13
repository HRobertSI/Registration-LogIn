<?php
session_start();
require_once './config.php';
?>
<?php

$discardedprice= floatval($_GET['id']);

echo "To je id: ".$discardedprice."<br>";

var_dump($discardedprice);

/*function getProductName($id){
    
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

$productname = getProductName($id);
$productprice = getProductPrice($id);*/

if(!isset($_SESSION['rubbish'])){
    $_SESSION['rubbish'] = [];
}

$_SESSION['rubbish'][] = array($discardedprice);

   
$_SESSION['discardedtotal']=[];  
foreach ($_SESSION['rubbish'] as $value ) {
echo "Odstranjena cena: ".$value[0]."<br>";
$_SESSION['discardedtotal'][] = $value[0];
}

//echo "Vsota odstranjenih: ".array_sum($_SESSION['discardedtotal']);



header("Location: store.php");

?>