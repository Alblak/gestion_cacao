<?php
include("connexion.php");

if (isset($_POST["valider"])) {
    $date=date('Y-m-d');
    $article=htmlspecialchars($_POST['article']);
    $quantite=htmlspecialchars($_POST['quantite']);
    $fournisseur=htmlspecialchars($_POST['fournisseur']);
    $site=$_SESSION['idsite'];
    $statut=0;        

    $req=$connexion->prepare("INSERT INTO entree(`date`, article, quantite, planteur, utilisateur, statut) VALUES (?,?,?,?,?,?)");
    $req->execute(array($date,$article,$quantite,$fournisseur,$site,$statut));

    $mesg= "Enregistrement reussi";
}


 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Margeurita</title>
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center mb-5">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/img/menu/b1.png" alt="">
                <span class="d-none d-lg-block">Margeurita</span>
            </a>

        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="pe-3 btn btn-outline-danger mx-2">
                    <a class="nav-link d-flex align-items-center pe-0 " href="Admin.php">
                        Revenir à l'administration
                    </a>
                </li><!-- End Profile Nav -->

            </ul>
        </nav>

    </header><!-- End Header -->

    <div class="container-fluid">
        <div class="pagetitle">
            <h1></h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"></a></li>
                    <li class="breadcrumb-item"></li>
                    <li class="breadcrumb-item active"></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section pt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="modal modal-signin position-static d-block  py-1" tabindex="-1" role="dialog"
                                id="modalSignin">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content rounded-5 shadow">
                                        <div class="modal-header border-bottom-0">
                                            <h3></h3>
                                            <h4 class="card-title text-center">Enregister un Nouveau Stock</h4>

                                            <a href="Admin.php">
                                                <button type="button" class="btn-close fw-bold fz-40"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </a>
                                        </div>
                                        <div class="modal-body p-5 pt-0">
                                            <form class="row g-3 needs-validation" method="POST" novalidate>

                                            <div class="form-floating mb-3">	
                                                <select class="form-select" id="floatingSelect" aria-label="State" name="article" >
                                                     <?php 

                                                    $repArt= $connexion-> query("SELECT * FROM `article` WHERE statut=0");
                                                    while ($tab=$repArt->fetch()) {
                                                        
                                                    ?>                    
                                                        <option value="<?php echo $tab['id']; ?>">
                                                            <?php echo $tab['designation']; ?>
                                                                                                                        
                                                        </option>
                                                    <?php 
                                                    }
                                                    ?>                    
                                                </select>
                                                <label>Selectionner L'article</label>
                                            </div> 

                                                <div class="form-floating mb-2">
                                                    <input type="number" class="form-control rounded-4"
                                                        id="floatingInput" required name="quantite">
                                                    <label for="floatingInput"> Quantité </label>
                                                </div>

                                                <div class="form-floating mb-3">	
                                                    <select class="form-select" id="floatingSelect" aria-label="State" name="fournisseur" >
                                                        <?php 

                                                        $repChat= $connexion-> query("SELECT * FROM `planteur`");
                                                        while ($tab=$repChat->fetch()) {
                                                        
                                                        ?>                    
                                                        <option value="<?php echo $tab['idplan']; ?>">
                                                            <?php echo $tab['nom']; ?>
                                                            <?php echo $tab['postnom']; ?>                                                            
                                                            <?php echo $tab['telephone']; ?>                                                            
                                                            </option>
                                                        <?php 
                                                    }
                                                    ?>                    
                                                    </select>
                                                    <label>Selectionner ici Le planteur</label>
                                                </div> 

                                                <p class="text-success text-center">
                                                    <?php if(isset($mesg)){
                                                    
                                                    ?>

                                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <i class="bi bi-check-circle me-1"></i>
                                                        <?php echo $mesg; ?>                                                    
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>

                                                    <?php
                                                    }  
                                                   
                                                    ?>

                                                </p>

                                                <button class="w-100 mb-2 btn btn-lg rounded-5 btn-outline-primary" type="submit"
                                                    name="valider"> Enregister</button> <br>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>

                </div>

            </div>
        </section>
    </div>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js1/main.js"></script>

</body>

</html>