<?php
include("connexion.php");


 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Margeurita Gerance</title>
    <!-- Vendor CSS Files -->
    <?php include("link.php"); ?>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="#" class="logo d-flex align-items-center">
                <img src="assets/img/menu/b1.png" width="60px" height="100%" alt="">
                <span class="d-none d-lg-block">Margeurita</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3 mx-2">
                    <a class="nav-link d-flex align-items-center pe-0  " href="#" data-bs-toggle="dropdown">
                        <span class="bi bi-person"> Mon Profil</span>
                    </a>
                </li><!-- End Profile Nav -->
                <li class="pe-3 btn btn-outline-danger mx-2">
                    <a class="nav-link d-flex align-items-center pe-0 " href="index.php" >
                        Deconnexion
                    </a>
                </li><!-- End Profile Nav -->

            </ul>
        </nav>

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-heading Actions">Actions</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="AjoutSite.php">
                    <i class="bi bi-person"></i>
                    <span>Ajouter un site </span>
                </a>
            </li><!-- End Register Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="planteursFour.php">
                    <i class="bi bi-person"></i>
                    <span>Gerer les  planteurs</span>
                </a>
            </li><!-- End Profile Page Nav -->

           <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="AjoutClient.php">
                    <i class="bi bi-person"></i>
                    <span>Gerer Clients</span>
                </a>
            </li> End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Stocks selon les Sites</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                <?php 
                    $req=$connexion->prepare('SELECT `id`,`nom` FROM `users` WHERE users.fonction= "Site";');
                    $req->execute();
                    
                    while($donnee=$req->fetch()){  
                    
                    ?>

                    <li>
                        <a href="stockSites.php?idsit=<?php echo $donnee['0']; ?>" class="active">
                            <i class="bi bi-circle"></i><span><?php echo $donnee['1']; ?></span>
                        </a>
                    </li>
                    
                    <?php }
                    ?>
                </ul>
            </li><!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Situation Planteurs</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                <?php 
                    $req=$connexion->prepare('SELECT `idplan`,`nom`, `postnom`, `telephone` FROM `planteur`;');
                    $req->execute();
                    
                    while($donnee=$req->fetch()){  
                    
                    ?>

                    <li>
                        <a href="situationFour.php?idfour=<?php echo $donnee['0']; ?>" class="active">
                            <i class="bi bi-circle"></i><span><?php echo $donnee['1']; ?></span>
                            <i class=""></i><span><?php echo $donnee['2']; ?></span>
                        </a>
                    </li>
                    
                    <?php }
                    ?>
                </ul>
            </li><!-- End Tables Nav -->
            

            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-card-list"></i>
                    <span>Listes des Clients</span>
                </a>
            </li><!-- End Register Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="index.php">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Déconnexion</span>
                </a>
            </li><!-- End Login Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Administration</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Sites</a></li>
                    <li class="breadcrumb-item"><a href="index.html">Fournisseurs</a></li>
                    <li class="breadcrumb-item"><a href="index.html">Clients</a></li>
                    <li class="breadcrumb-item"><a href="">Nouveau stocks</a></li>
                    <li class="breadcrumb-item"><a href="">Ventes</a> </li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center ">Liste des sites</h5>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Action</th>                                       
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $req=$connexion->prepare('SELECT `id`,`nom` FROM `users` WHERE users.fonction= "Site";');
                                    $req->execute();
                                    $number=0;

                                    while($donnee=$req->fetch()){
                                        $number++;

                                    ?>

                                    <tr>
                                        <th scope="row"><?php echo $number; ?></th>
                                        <td><?php echo $donnee['1']; ?></td>
                                        <td>
                                        <a onclick="return confirm('si Voulez-vous vraiment modifier le <?php echo $donnee['1']; ?> ?') " class="btn btn-primary" href="modifSite.php?idmod=<?php echo $donnee['0']; ?>"> Modifier</a> 
                                        
                                        </td>
                                        
                                    </tr>
                                    <?php }
                                ?>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title text-center ">Liste des mouvements des Stock </h2>
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
                                        $req=$connexion->prepare("SELECT entree.date, article.designation, entree.quantite, planteur.nom, planteur.postnom, users.nom FROM `entree`,article,planteur, users WHERE article.id=entree.article AND planteur.idplan=entree.planteur AND users.id=entree.utilisateur ");
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
                                        $req=$connexion->prepare("SELECT sortie.date, article.designation, sortie.quantite, client.nom, client.postnom, users.nom FROM `sortie`,article,client,users WHERE article.id=sortie.article AND client.id=sortie.client AND users.id=sortie.utilisateur");
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


        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center ">Liste des Planteur Créanciers </h5>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Noms</th>
                                        <th scope="col">Adresse</th>
                                        <th scope="col">Telephone</th>
                                        <th scope="col">solde</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 

                                    $req=$connexion->prepare('SELECT `nom`, `postnom`, village, `telephone`, `montant` FROM `planteur`,pret,village WHERE planteur.idplan=pret.fourniseur and Planteur.village=village.idvi');
                                    $req->execute();
                                    $number=0;
                                 
                                    

                                    while($donnee=$req->fetch()){
                                        $number++;
                                    
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo  $number; ?></th>
                                        <td>
                                            <?php echo $donnee['0']; ?>
                                            <?php echo $donnee['1']; ?>
                                        </td>
                                        <td><?php echo $donnee['2']; ?></td>
                                        <td><?php echo $donnee['3']; ?></td>
                                        <td><?php echo $donnee['4']; ?></td>
                                    </tr>

                                    <?php }
                                ?>
                                   
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

        

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Margeurita</span></strong>. All Rights Reserved
        </div>
        <div class="credits">

            Designed by <a href="#">Tree Devs</a>
        </div>
    </footer><!-- End Footer -->

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