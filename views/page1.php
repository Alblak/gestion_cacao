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

        

    <?php include('header.php');?>

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