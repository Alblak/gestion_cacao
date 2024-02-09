<?php
include("connexion.php");

if (isset($_POST["valider"])) {
    $nom=htmlspecialchars($_POST['nom']);
    

    $req=$connexion->prepare("INSERT INTO village(nomvillage) VALUES (?)");
    $req->execute(array($nom));

    $mesg= "Enregistrement reussi";
}
if(isset($_GET['idvi']))
{
    $idvi=$_GET['idvi'];
    $req=$connexion->query("SELECT * FROM village where idvi='$idvi'");
    $village=$req->fetch();
    $nomv=$village['nomvillage'];
}
if(isset($_GET['idvil']))
{
    $idvil=$_GET['idvil'];
    $req=$connexion->query("DELETE   FROM village where idvi='$idvil'");
    
}
if(isset($_POST['modifier']))
{
    $idvi=$_GET['idvi'];
    $nom=htmlspecialchars($_POST['nom']);
    $req=$connexion->prepare("UPDATE village set nomvillage=? where idvi='$idvi'");
    $req->execute(array($nom));
}

 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Fournisseurs</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

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
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body">
                        <?php if(isset($_GET['idvi'])){ ?> <h4 class="card-title text-center">Modifier un Village</h4> <?php } else { ?>  <h4 class="card-title text-center">Ajouter un Village</h4> <?php } ?>
                           
                            <div class="modal modal-signin position-static d-block  py-1" tabindex="-1" role="dialog"
                                id="modalSignin">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content rounded-5 shadow">
                                        <div class="modal-header border-bottom-0">
                                        
                                        </div>
                                        <div class="modal-body p-5 pt-0">
                                            <form class="row g-3 needs-validation" method="POST" novalidate>
                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control rounded-4" id="floatingInput"
                                                        required name="nom"<?php if(isset($nomv)){ ?>value="<?=$nomv ?>" <?php } ?>>
                                                    <label for="floatingInput">Nom du village</label>
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
                                                <?php if(isset($_GET['idvi'])){  ?>
                                                          <a href="village.php" class="btn btn-success btn-lg rounded-5  ">vider</a>
                                               <?php } ?>

                                                <button class="w-100 mb-2 btn btn-lg rounded-5 btn-outline-primary" type="submit"
                                                     <?php if(isset($_GET['idvi'])){ ?>name="modifier" <?php } else { ?> name="valider" <?php } ?> >  <?php if(isset($_GET['idvi'])){ ?>modifier<?php } else { ?>Enregistrer<?php } ?></button>
                                                     
                                                 <br>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center ">Listes de village</h5>
                            

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Nom du village</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 

                                    $req=$connexion->prepare("SELECT * FROM village");
                                    $req->execute();
                                    $number=0;
                                 
                                    

                                    while($vil=$req->fetch()){
                                        $number++;
                                       
                                    
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo  $number; ?></th>
                                        <td>
                                            <?php echo $vil['nomvillage']; ?>
                                           
                                        </td>
                                        <td><a href="village.php?idvi=<?php echo $vil['idvi'] ?>" class=" btn btn-primary">Modifier</a> <a onclick=" return confirm('Si vous supprimer ce village, les planteurs de ce village vont etre supprimer.  Voulez-vous vraiment supprimer ?')"  href="village.php?idvil=<?php echo $vil['idvi']?>" class=" btn btn-danger">supprimer</a></td>
                                        
                                        
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
    <footer id="footer" class="footer">
        <div class="copyright">
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