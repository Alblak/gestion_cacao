<?php
include("connexion.php");
$idsitee=$_GET['idsit'];

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Stock_Liste</title>
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
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="#" class="logo d-flex align-items-center">
                <img src="assets/img/menu/b1.png" width="60px" height="100%" alt="">
                <span class="d-none d-lg-block">Margeurita</span>
            </a>
            
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
               
                <li class="nav-item dropdown pe-3 btn btn-danger mx-2">
                    <a class=" d-flex align-items-center pe-0 text-light" href="employeur.php" >
                        Fermer
                    </a>
                </li><!-- End Profile Nav -->

            </ul>
        </nav>

    </header><!-- End Header -->

    <div class="container">
        <div class="pagetitle mb-5">
            <h1></h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"></a></li>
                <li class="breadcrumb-item"></li>
                <li class="breadcrumb-item active"></li>
              </ol>
            </nav>
        </div><!-- End Page Title -->
        <section id="stock" class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title text-center ">Liste des mouvements des Stock de  </h2>
                           

                            
                            <h4 class="text-center">Les entrees</h4>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Article</th>
                                        <th scope="col">Quantité</th>
                                        <th scope="col">Planteur</th>
                                        <th scope="col">Site</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                        $req=$connexion->prepare("SELECT entree.date, article.designation, entree.quantite, planteur.nom, planteur.postnom,users.nom FROM `entree`,article,planteur,users WHERE article.id=entree.article AND planteur.idplan=entree.planteur AND entree.utilisateur=users.id and entree.utilisateur='$idsitee'");
                                        $req->execute();
                                        $number=0;

                                        while($donnee=$req->fetch()){
                                            $number++;

                                            ?>
                                                <tr>
                                                    <th scope="row"><?php echo $number; ?></th>
                                                    <td><?php echo $donnee['0']; ?></td>
                                                    <td><?php echo $donnee['1']; ?></td>
                                                    <td><?php echo $donnee['2']; ?></td>
                                                    <td>
                                                        <?php echo $donnee['3']; ?>
                                                        <?php echo $donnee['4']; ?>
                                                    </td>
                                                    <td><?php echo $donnee['5']; ?></td>
                                                </tr>
                                            <?php 
                                            }
                                    ?>
                                        
                                </tbody>
                                </table>
                                <!-- End Table with stripped rows -->
                                <h4 class="text-center">Les sorties</h4>
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">N°</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Article</th>
                                            <th scope="col">Quantité</th>
                                            <th scope="col">client</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                            $req=$connexion->prepare("SELECT sortie.date, article.designation, sortie.quantite, client.nom, client.postnom, users.nom FROM `sortie`,article,client,users WHERE article.id=sortie.article AND client.id=sortie.client AND users.id=sortie.utilisateur and sortie.utilisateur='$idsitee'");
                                            $req->execute();
                                            $number=0;

                                            while($donnee=$req->fetch()){
                                                $number++;

                                            ?>

                                            <tr>
                                                <th scope="row"><?php echo $number; ?></th>
                                                <td><?php echo $donnee['0']; ?></td>
                                                <td><?php echo $donnee['1']; ?></td>
                                                <td><?php echo $donnee['2']; ?></td>
                                                <td>
                                                    <?php echo $donnee['3']; ?>
                                                    <?php echo $donnee['4']; ?>
                                                </td>
                                                <td><?php echo $donnee['5']; ?></td>
                                            </tr>
                                            <?php 
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                </div>
        </section>
    </div>



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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