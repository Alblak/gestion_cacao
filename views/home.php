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
    <?php include('menu.php');?>
  <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1></h1>
            <nav>
               
            </nav>
        </div><!-- End Page Title -->
        <div>
            <form  class="shadow p-3"action="" method="post">
               
               
            </form>
        </div>

     

       

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
    <?php include('footer.php'); ?>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <?php include_once('scriptjs.php')?>

</body>

</html>