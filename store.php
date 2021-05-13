<?php
session_start();
require_once './config.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="modalNEW.css">
        <link rel="stylesheet" href="storeNEW3.css">
    </head>
    <body>

        <table border='1'>
            <caption>Nos produits:</caption>
            <tr>
                <th>Typ</th>
                <th>Nom</th>
                <th>Couleur</th>
                <th>Code</th>
                <th>Prix</th>
                <th>Taille</th>
                <th>Image</th>
            </tr>
            <?php
            
            $glovesList = getAllGloves();
            
            while ($row = mysqli_fetch_assoc($glovesList)):

            ?>
            
            <tr>
                <td><?= $row['gtype'] ?></td>
                <td><?= $row['gname'] ?></td>
                <td><?= $row['gcolour'] ?></td>
                <td><?= $row['gcode'] ?></td>
                <td id="<?= $row['gname']?>"><?= $row['gprice'] ?></td>
                <td><?= $row['gsize'] ?></td>
                <td><img
                    id="<?= $row['gID'] ?>"
                    class="slika"
                    alt="<?= $row['gname']?>"
                    src="./images/<?= $row['gimage']?>"  width="80"
                    onclick="open_modal(<?= $row['gID'] ?>)"
                    draggable="true" 
                    ondragstart="drag(event)"
                    >
                </td>

            </tr>
            <?php endwhile;?>
        </table>
        <div class="div_cart">
            <img id="cart" src="./images/cart.png" width="150" ondrop="drop(event)" ondragover="allowDrop(event)">
            <img id="rubbish" src="./images/rubbish.png" ondrop="drop2(event)" ondragover="allowDrop2(event)" width="70">            
        <fieldset id="fieldset_list">
            <legend>Produits sélectionnés:</legend>
            <table id="list_selected_products">
            <?php 
            $cart=[];
            if(isset($_SESSION['cart'])) {
                $cart=$_SESSION['cart'];
            }
            $total=[];
            if(isset($_SESSION['total'])) {
                $total=$_SESSION['total'];
            }
            //$cart_id=1;
            foreach ($cart as $value) {
                echo '<tr id="'.$value[1].'" draggable="true" ondragstart="drag2(event)"><td>'.$value[0]."</td><td>".$value[1]."</td></tr>";
                //$cart_id++;
            }
            
            $discardedtotal=[];
            if(isset($_SESSION['discardedtotal'])) {
                $discardedtotal=$_SESSION['discardedtotal'];
            }
            
            $totalcomplet = array_sum($total)-array_sum($discardedtotal);
            
            
            echo "<tr><td><strong>Total: </td><td>".array_sum($total)."</strong></td><tr>"
                    . "<tr><td><strong>Total reduit: </td><td>".array_sum($discardedtotal)."</strong></td><tr>"
                    . "<tr><td><strong>Total complet: </td><td>".$totalcomplet."</strong></td><tr>";
            ?>
            </table>
            <?php echo "<form action = 'check_out.php'>";
            echo "<input type='submit' value='Acheter'>";
            echo "</form>"; 
            ?>
        </fieldset>
        </div>
        <div id="myModal" class="modal">

            <!-- The Close Button -->
            <span class="close">&times;</span>

            <!-- Modal Content (The Image) -->
            <img class="modal-content" id="img">

            <!-- Modal Caption (Image Text) -->
            <div id="caption"></div>
        </div>
        <script>
                       
           function allowDrop(ev) {
            ev.preventDefault();
            }

            function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
            }
            
            function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            
            window.location.href="cart.php?id="+data;
            } 
            
            function allowDrop2(ev) {
            ev.preventDefault();
            }
            
           function drag2(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
            }
            
            function drop2(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            var el = document.getElementById(data);
            el.parentNode.removeChild(el);
            window.location.href="rubbish.php?id="+data;
            } 
           
            function open_modal(id) {
                var modal = document.getElementById("myModal");
                var img = document.getElementById(id); 
                var modalImg = document.getElementById("img");
                var captionText = document.getElementById("caption");
                modal.style.display = "block";
                modalImg.src = img.src;
                captionText.innerHTML = img.alt;

                // Get the <span> element that closes the modal
              var span = document.getElementsByClassName("close")[0];

             // When the user clicks on <span> (x), close the modal
                span.onclick = function () {
                    modal.style.display = "none";
                }
            }


            
        </script>
    </body>
</html>