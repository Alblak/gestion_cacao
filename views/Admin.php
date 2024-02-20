<?php
include("connexion.php");
$site=$_SESSION['idsite'];

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">    
    <title>Margeurita Administration</title>
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
                <li class="pe-3 btn btn-outline-danger mx-2">
                    <a class="nav-link d-flex align-items-center pe-0 " href="index.php">
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
                <a class="nav-link collapsed" href="village.php">
                    <i class="bi bi-city"></i>
                    <span>Village</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="planteurs.php">
                    <i class="bi bi-person"></i>
                    <span>Planteurs</span>
                </a>
            </li><!-- End fournisseur Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="AjoutClient.php?idsite=<?php $site ?>">
                    <i class="bi bi-person"></i>
                    <span>Gerer Clients</span>
                </a>
            </li><!-- End client Page Nav -->

            <li class="nav-item">
                <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-layout-text-window-reverse"></i><span>Stocks</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                  <li>
                    <a href="#entrees">
                      <i class="bi bi-circle"></i><span> Les Entrés en Stock</span>
                    </a>
                  </li>
                  <li>
                    <a href="#vente" class="active">
                      <i class="bi bi-circle"></i><span> Les Sorties Stock</span>
                    </a>
                  </li>
                </ul>
              </li><!-- End Stock Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="AjoutArticle.php">
                    <i class="bi bi-card-list"></i>
                    <span>Article</span>
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
                    <li class="breadcrumb-item"><a href="#">Fournisseurs</a></li>
                    <li class="breadcrumb-item"><a href="#">Clients</a></li>
                    <li class="breadcrumb-item"><a href="#entrees">Nouveau stocks</a></li>
                    <li class="breadcrumb-item"><a href="#vente">Ventes</a> </li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section" id="entrees" >
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center ">Liste des Entrés en Stock</h5>
                            <a href="NouveauStock.php " class=" btn btn-outline-primary bi bi-plus">Nouveau stock</a>                          
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Article</th>
                                        <th scope="col">Quantité</th>
                                        <th scope="col">Fournisseur</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                        $req=$connexion->prepare("SELECT entree.date, article.designation, entree.quantite, planteur.nom, planteur.postnom,entree.id FROM `entree`,article,planteur WHERE article.id=entree.article AND planteur.idplan=entree.planteur AND entree.utilisateur='$site'");
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
                                            <td><a href="modifarticle.php?iden=<?php echo $donnee['id']?>" class=" btn btn-primary ">Modifier</</td>
                                        </tr>
                                        <?php 
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="section" id="vente" >
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center ">Liste des Sorties en Stock</h5>
                            <a href="sortirStock.php " class=" btn btn-outline-primary bi bi-plus">Vendre</a>                          
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Article</th>
                                        <th scope="col">Quantité</th>
                                        <th scope="col">Client</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                        $req=$connexion->prepare("SELECT sortie.date, article.designation, sortie.quantite, client.nom, client.postnom,sortie.id FROM `sortie`,article,client WHERE article.id=sortie.article AND client.id=sortie.client AND sortie.utilisateur='$site'");
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
                                            <td><a href="modifarticlev.php?idsor=<?php echo $donnee['id']?>" class=" btn btn-primary ">Modifier</</td>
                                        </tr>
                                        <?php 
                                        }
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
    <?php include_once('scriptjs.php')?>

</body>

</html>