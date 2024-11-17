<?php 
    
    Session_start();
    if( isset($_SESSION['nom'])){
        header('Location: profile.php');
        exit();
    }

    include "include/functions.php";
    $showRegistrationAlert = 0;
    $categories = getAllCategories();

    if(!empty($_POST)){
        if(AddVisiteur($_POST)){
            $showRegistrationAlert = 1;
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
        <h1 class="text-center">Registre</h1>
        <form action ="registre.php"   method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name= "email">
                
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nom</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="nom">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Prenom</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="prenom">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">telephone</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="telephone">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="mp">
            </div>
            
            <button type="submit" class="btn btn-primary" name="sauvgarder">Sauvgarder</button>
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
if($showRegistrationAlert == 1){
        print"
        <script>
            Swal.fire({
                title: 'success',
                text: 'creation de compte sucess',
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 2000
                })
    
        </script>
        ";
    }
?>




</html>