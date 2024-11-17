<?php 
    session_start();
    include "include/functions.php";
    $categories = getAllCategories();

    if(!empty($_POST)){
        
        $produits = searchProduits($_POST['search']);
    }else{
        $produits = getAllProduits();
    }


    //$produits = getAllProduits();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bliss_Pearls</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <?php
        include "include/header.php";
    ?>
    <div class="row col-12 mt-4">
        <?php
            foreach ($produits as $produit) {
                echo '<div class="col-3">';
                echo '<div class="card" style="width: 18rem;">';
                echo '<img src="images/'.$produit['image'].'" class="card-img-top"  alt="'.$produit['nom'].'">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">'.$produit['nom'].'</h5>';
                echo '<p class="card-text">'.$produit['description'].'</p>';
                echo '<a href="produit.php? id='.$produit['id'].'" class="btn btn-primary">Voir plus</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }


        ?>

        <?php
                include 'include/footer.php';
        ?>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>