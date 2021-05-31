<?php
//session_start();

require_once './config.php';

$link = connectDatabase();

$add_typ='';
$add_nom='';
$add_couleur='';
$add_code='';
$add_prix='';
$add_taille='';
$add_image='';

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div style="text-align: center;">
        <h1>Administrateur</h1><br><br>
        </div>
<?php
        
        if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) //sticky form, if you leave the field empty or enter an invalid e-mail address, the correct fields keep the values TEST BY CLICKING SUBMIT
            {
                if (empty($_POST['add_typ']))  {echo "Erreur, le typ n&#146est pas correct! ";}
  
                if (empty($_POST['add_nom']))  {echo "Erreur, le nom n&#146est pas correct! ";}
                
                if (empty($_POST['add_couleur']))  {echo "Erreur, la couleur n&#146est pas correcte! ";}
                
                if (empty($_POST['add_code']))  {echo "Erreur, le code n&#146est pas correct! ";}
                
                if (empty($_POST['add_prix']))  {echo "Erreur, le prix n&#146est pas correct! ";}
                
                if (empty($_POST['add_taille']))  {echo "Erreur, la taille n&#146est pas correcte! ";}
                
                if (empty($_POST['add_image']))  {echo "Erreur, l&#146image n&#146est pas correct! ";}
                    
                if (checkIfCodeExists($_POST['add_code']) == 1) {echo "Erreur, le produit avec ce code existe d&#233j&#224! ";} //see if a product with this code is already in the database
               
                if (!empty($_POST['add_typ']) && !empty($_POST['add_nom']) && !empty($_POST['add_couleur']) && !empty($_POST['add_code']) && !empty($_POST['add_prix']) && !empty($_POST['add_taille']) && !empty($_POST['add_image']) && checkIfCodeExists($_POST['add_code']) != 1) 
                {
                addProduct($_POST['add_typ'], $_POST['add_typ'], $_POST['add_couleur'], $_POST['add_code'], $_POST['add_prix'], $_POST['add_taille'], $_POST['add_image']);
                echo "Produit ajout&#233";
                }
            }
        
        
        
if (isset($_POST['add_typ']))  {
    $add_typ=$_POST['add_typ'];
}

if (isset($_POST['add_nom']))  {
    $add_nom=$_POST['add_nom'];
}

if (isset($_POST['add_couleur']))  {
    $add_couleur=$_POST['add_couleur'];
}

if (isset($_POST['add_code']))  {
    $add_code=$_POST['add_code'];
}

if (isset($_POST['add_prix']))  {
    $add_prix=$_POST['add_prix'];
}

if (isset($_POST['add_taille']))  {
    $add_taille=$_POST['add_taille'];
}

if (isset($_POST['add_image']))  {
    $add_image=$_POST['add_image'];
}
?>
        
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <fieldset>
                <legend>Ajoutez un produit:</legend>
                Typ: <input type="text" name="add_typ" value="<?= $add_typ ?>"><br>
                Nom: <input type="text" name="add_nom" value="<?= $add_nom ?>"><br>
                Couleur: <input type="text" name="add_couleur" value="<?= $add_couleur ?>"><br>
                Code: <input type="text" name="add_code" value="<?= $add_code ?>"><br>
                Prix: <input type="text" name="add_prix" value="<?= $add_prix ?>"><br>
                Taille: <input type="text" name="add_taille" value="<?= $add_taille ?>"><br>
                Image: <input type="text" name="add_image" value="<?= $add_image ?>"><br>
                <input type="submit" value="Envoyer les données">
                <input type="reset" value="Effacer">
            </fieldset>
        </form>
    <a href="logout.php">Logout</a>    
    </body>
</html>
