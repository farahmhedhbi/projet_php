<?php 
    Session_start();
    if( isset($_SESSION['nom'])){
        header('Location: profile.php');
        exit();
    }


    include "include/functions.php";
    $user= true;
    $categories = getAllCategories();
    if (!empty($_POST)) {
        $user = ConnectVisiteur($_POST);
    
        if (!empty($user) && is_array($user)) { // Check if $user is not empty and is an array
            session_start();
            $_SESSION['email'] = $user['email'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['mp'] = $user['mp'];
            $_SESSION['telephone'] = $user['telephone'];
    
            header("Location: profile.php"); // Redirection vers la page profile
            exit();
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bliss_Pearls</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.12.4/sweetalert2.min.css">
</head>
<body>
    <?php
        include "include/header.php";
    ?>
    <!--fin nav-->

    <div class="col-12 p-5" >
        <h1 class="text-center">Connexion</h1>
        <form action="connexion.php"  method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                
            </div>
            
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" name="mp" class="form-control" id="exampleInputPassword1">
            </div>
            
            <button type="submit" class="btn btn-primary">connecter</button>
        </form>

    </div>



    <!--footer-->
    <?php
                include 'include/footer.php';
        ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>
<?php
if(!$user){
        echo "<script>
        Swal.fire({
            title: 'Erreur',
            icon: 'error',
            text: 'Cordonnes non valide',
            confirmButtonText: 'OK',
            timer: 2000
        });
        </script>";
    }
?>







</html>