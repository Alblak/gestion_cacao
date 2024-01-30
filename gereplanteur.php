<?php
include("connexion.php");
if(isset($_GET['idplan']))
{
    $idplan=$_GET['idplan'];
    $req=$connexion->query("SELECT * FROM planteur where idplan='$idplan'");
    $planteur=$req->fetch();

}


 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Planteurs</title>
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center mb-5">

        <div class="d-flex align-items-center justify-content-between">
        <!-- <img class="photo" src="profilplanteur/<?php echo $planteur['photo']?>" alt="" >
        <?php echo $planteur['nom']." ".$planteur['postnom']." ".$planteur['prenom'] ?> -->
        

        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item pe-3 btn btn-danger mx-2">
                    <a class="nav-link d-flex align-items-center pe-0 " href="Admin.php" >
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
               

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center ">Les prets  de <?php echo $planteur['nom'] ?></h5>
                            <a href="preterplanteur.php?idplan=<?php echo $idplan; ?>" class="btn btn-primary">preter</a>
                            

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">quantite</th>
                                        
                                      

                                       
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 

                                    $req=$connexion->prepare("SELECT idpre,datepret,planteurs,quantite FROM prets where planteurs=$idplan");
                                    $req->execute();
                                    $number=0;
                                 
                                    

                                    while($pret=$req->fetch()){
                                        $number++;
                                       
                                    
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo  $number; ?></th>
                                        <td>
                                            <?php echo $pret['datepret']; ?>
                                           
                                        </td>
                                        <td>
                                            <?php echo $pret['quantite']; ?>

                                           
                                        </td>
                                        
                                        <td>
                                            
                                            <a href="planteurs.php?idplan=<?php echo $pret['idpre'] ?>" class=" btn-btn ">
                                                <img src="icon/update.png"  width=25px  alt="" >
                                            </a>  
                                            <a onclick=" return confirm('Si vous supprimer ce village, les planteurs de ce village vont etre supprimer.  Voulez-vous vraiment supprimer ?')"  href="planteurs.php?idplant=<?php echo $vil['idplan']?>" class=" btn-btn ">
                                                <img src="icon/delete.png"  width=25px  alt="">
                                            </a>
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
                
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center ">Les entrees</h5>
                            

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Site</th>
                                        <th scope="col">article</th>
                                        <th scope="col">quantite</th>
                                      

                                       
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 

                                    $req=$connexion->prepare("SELECT entree.id,entree.date,article.designation,users.nom,entree.quantite from entree,article,users where entree.article=article.id and entree.utilisateur=users.id and entree.planteur=$idplan");
                                    $req->execute();
                                    $number=0;
                                 
                                    

                                    while($entree=$req->fetch()){
                                        $number++;
                                       
                                    
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo  $number; ?></th>
                                        <td>
                                            <?php echo $entree['date']; ?>
                                           
                                        </td>
                                        <td>
                                            <?php echo $entree['nom']; ?>

                                           
                                        </td>
                                        <td>
                                            <?php echo  $entree['designation']; ?>
                                           
                                        </td>
                                        <td>
                                            <?php echo $entree['quantite']; ?>
                                           
                                        </td>
                                        <td><span></span><a href="planteurs.php?idplan=<?php echo $vil['idplan'] ?>" class=" btn-btn "><img src="icon/update.png"  width=25px  alt="" ></a>  <a onclick=" return confirm('Si vous supprimer ce village, les planteurs de ce village vont etre supprimer.  Voulez-vous vraiment supprimer ?')"  href="planteurs.php?idplant=<?php echo  $entree['id']?>" class=" btn-btn "><img src="icon/delete.png"  width=25px  alt=""></a></td>
                                        
                                        
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
    </div>


    <!-- ======= Footer ======= -->
    <footer id="footerr" class="footerr text-center">
        <div class="copyright ">
            &copy; Copyright <strong><span>Margeurita</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
           
            Designed by <a href="#">tree Devs</a>
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