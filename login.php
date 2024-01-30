<?php 
include 'connexion.php';

$type=$_GET['type']; 

 if (isset($_POST['connecter'])) 
 {
   $nom=htmlspecialchars($_POST['name']);
   $motdepasse=htmlspecialchars($_POST['motdepasse']);
   if ($type=="site") 
    {
  
        $recuperUser= $connexion->prepare("SELECT * FROM users WHERE nom='$nom'  and psw='$motdepasse'");
        $recuperUser->execute();
        $recup = $recuperUser->fetch();
        if($recup)
        {
            $_SESSION['idsite']=$recup['id'];
            header("Location: admin.php");
        }
        else
        {
            $erreur= 'Nom ou mot de passe incorrect ';
        }
    }
    if ($type=="patron") 
    {
  
        $recuperUser= $connexion->prepare("SELECT * FROM users WHERE nom='$nom'  and psw='$motdepasse'");
        $recuperUser->execute();
        $recup = $recuperUser->fetch();
        if($recup)
        {
            $_SESSION['idpatron']=$recup['id'];
            header("Location: employeur.php");
        }
        else
        {
            $erreur= 'Nom ou mot de passe incorrect ';
        }
    }
    if ($type=="fournisseur") 
    {
  
        $recuperUser= $connexion->prepare("SELECT * FROM fournisseur WHERE nom='$nom'  and psw='$motdepasse'");
        $recuperUser->execute();
        $recup = $recuperUser->fetch();
        if($recup)
        {
            $_SESSION['idfour']=$recup['id'];
            header("Location: fournisseur.php");
        }
        else
        {
            $erreur= 'Nom ou mot de passe incorrect ';
        }
    }

    if ($type=="planteur") 
    {
  
        $recuperUser= $connexion->prepare("SELECT * FROM planteur WHERE nom='$nom'  and code='$motdepasse'");
        $recuperUser->execute();
        $recup = $recuperUser->fetch();
        if($recup)
        {
            $_SESSION['idplanteur']=$recup['idplan'];
            header("Location: planteurs.php");
        }
        else
        {
            $erreur= 'Nom ou mot de passe incorrect ';
        }
    }
}
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Connexion</title>
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="modal modal-signin position-static d-block  py-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-5 shadow">
                <div class="modal-header border-bottom-0">
                    <h3></h3>          
                   
                    <a href="index.php">
                        <button type="button" class="btn-close fw-bold" data-bs-dismiss="modal" aria-label="Close"></button>
                    </a>
                </div>
                <div class="modal-body p-5 pt-0">
                    <div class="pb-2">                        
                        
                        <h3 class="card-title text-center couleur1 pb-0 fs-4">Connectez-vous</h3>
                    </div>
            
                    <form class="row g-3 needs-validation" method="POST" novalidate>
            
                        <div class="col-12">
                            <label for="name" class="form-label">Votre nom</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                            <div class="invalid-feedback">Entrez Votre nom</div>
                        </div>
            
                        <div class="col-12">
                            <label for="motdepasse" class="form-label">Votre Mot de passe</label>
                            <input type="password" name="motdepasse" class="form-control" id="motdepasse" required>
                            <div class="invalid-feedback">Entrez Votre mot de passe</div>
                        </div> 
                        
                        <p class="text-success text-center">
                            <?php if(isset($erreur)){
                                                    
                                ?>

                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="bi bi-check-circle me-1"></i>
                                        <?php echo $erreur; ?>                                                 
                                    </div>

                                <?php
                                }  
                                                   
                            ?>

                        </p>
            
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit" name="connecter">Se connecter</button>
                        </div>
            
                    </form>
                </div>
            </div>
        </div>
    </div>

    <a href="#" class="back-to-top couleur d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>