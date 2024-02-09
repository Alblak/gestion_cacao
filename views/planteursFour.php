<?php
include("connexion.php");

if(isset($_POST['valider']))
{
    $nom=htmlspecialchars($_POST['nom']);
    $postnom=htmlspecialchars($_POST['postnom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $villages=htmlspecialchars($_POST['village']);
    $tel=htmlspecialchars($_POST['tel']);


    $village=substr($villages,0,1);
    $code=substr($villages,0,1).substr($villages,1,1).strtoupper(substr($villages,2,1)).substr($villages,3,1).substr($nom,0,1).strtoupper(substr($nom,1,1)).strtoupper(substr($postnom,0,2));
    $photo=$_FILES['photo']['name'];
    $upload="profilplanteur/".$photo;
    move_uploaded_file($_FILES['photo']['tmp_name'],$upload);
    

    $reqq=$connexion->query("SELECT * FROM `planteur` WHERE village='$village' order by idplan desc limit 1");
    $derniere=$reqq->fetch();
    $iddd=$derniere['code'];
    $idd=substr($iddd,0,1);+1;
     echo $idd;


   $req=$connexion->prepare("INSERT INTO planteur (code,nom,postnom,prenom,photo,village,telephone) values (?,?,?,?,?,?,?)");
    $req->execute(array($idd.$code,$nom,$postnom,$prenom,$photo,$village,$tel));
   


}

if(isset($_POST['modifier']))
{
    $idplan=$_GET['idplan'];
    $nom=htmlspecialchars($_POST['nom']);
    $postnom=htmlspecialchars($_POST['postnom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $villages=htmlspecialchars($_POST['village']);
    $tel=htmlspecialchars($_POST['tel']);
    $village=substr($villages,0,1);
    $code=substr($villages,0,1).substr($villages,1,1).strtoupper(substr($villages,2,1)).substr($villages,3,1).substr($nom,0,1).strtoupper(substr($nom,1,1)).strtoupper(substr($postnom,0,2));
    $photo=$_FILES['photo']['name'];
    $upload="profilplanteur/".$photo;
    move_uploaded_file($_FILES['photo']['tmp_name'],$upload);
    

    $reqq=$connexion->query("SELECT * FROM `planteur` WHERE village='$village' order by idplan desc limit 1");
    $derniere=$reqq->fetch();
    $iddd=$derniere['code'];
 
    $idd=substr($iddd,0,1);+1;
     echo $idd;


   $req=$connexion->prepare("UPDATE planteur SET   code=?,nom=?,postnom=?,prenom=?,photo=?,village=?,telephone=? where idplan='$idplan'");
    $req->execute(array($idd.$code,$nom,$postnom,$prenom,$photo,$village,$tel));
    if($req)
    {
        $msg="modification reussie";
        header('location:planteurs.php');
    }


}
if(isset($_GET['idplan']))
    {
        $idplan=$_GET['idplan'];
        $req=$connexion->query("SELECT planteur.*,village.nomvillage FROM village,planteur WHERE planteur.village=village.idvi and planteur.idplan='$idplan'");
        $planteur=$req->fetch();
    }
if(isset($_GET['idplant']))
    {
        $idplant=$_GET['idplant'];
        $req=$connexion->query("DELETE   FROM planteur where idplan='$idplant'");
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

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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
                    <a class="nav-link d-flex align-items-center pe-0 " href="employeur.php" >
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
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                        <?php if(isset($_GET['idvi'])){ ?> <h4 class="card-title text-center">Modifier un Planteur</h4> <?php } else { ?>  <h4 class="card-title text-center">Ajouter un  Planteur</h4> <?php } ?>
                           
                            <div class="modal modal-signin position-static d-block  py-1" tabindex="-1" role="dialog"
                                id="modalSignin">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content rounded-5 shadow">
                                        <div class="modal-header border-bottom-0">
                                        
                                        </div>
                                        <div class="modal-body p-5 pt-0">
                                            <form  class="row g-3 needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control rounded-4" id="floatingInput"
                                                        required name="nom"<?php if(isset($planteur)){ ?>value="<?=$planteur['nom'] ?>" <?php } ?>>
                                                    <label for="floatingInput">Nom </label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control rounded-4" id="floatingInput"
                                                        required name="postnom"<?php if(isset($planteur)){ ?>value="<?=$planteur['postnom'] ?>" <?php } ?>>
                                                    <label for="floatingInput">Postnom</label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control rounded-4" id="floatingInput"
                                                        required name="prenom"<?php if(isset($planteur)){ ?>value="<?=$planteur['prenom'] ?>" <?php } ?>>
                                                    <label for="floatingInput">Prenom</label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <input type="file" class="form-control rounded-4" id="floatingInput"
                                                        required name="photo"<?php if(isset($planteur)){ ?>value="<?=$planteur['photo'] ?>" <?php } ?>>
                                                    <label for="floatingInput">Photo</label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <select   class="form-select" id="floatingSelect" aria-label="State" name="village" id="">
                                                    <?php 
                                                    $req=$connexion->query("SELECT * from village");
                                                    while($vill=$req->fetch()){
                                                    
                                                    ?>
                                                    <option value="<?php echo $vill['idvi'].$vill['1']?>"><?php echo $vill['nomvillage']?></option>
                                                    <?php } ?>
                                                    </select>
                                                    <label for="floatingInput">Nom du village</label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control rounded-4" id="floatingInput"
                                                        required name="tel"<?php if(isset($planteur)){ ?>value="<?=$planteur['telephone'] ?>" <?php } ?>>
                                                    <label for="floatingInput">Telephone</label>
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
                                                <?php if(isset($_GET['idplan'])){  ?>
                                                          <a href="planteurs.php" class="btn btn-success btn-lg rounded-5  ">Annuler</a>
                                               <?php } ?>

                                                <button class="w-100 mb-2 btn btn-lg rounded-5 btn-outline-primary" type="submit"
                                                     <?php if(isset($_GET['idplan'])){ ?>name="modifier" <?php } else { ?> name="valider" <?php } ?> >  <?php if(isset($_GET['idplan'])){ ?>modifier<?php } else { ?>Enregistrer<?php } ?>
                                                </button>
                                                     
                                                 <br>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center ">Listes de planteurs</h5>
                            

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">code</th>
                                        <th scope="col">Noms</th>
                                        <th scope="col">village</th>
                                        <th scope="col">tel</th>
                                        <th scope="col">action</th>

                                       
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 

                                    $req=$connexion->prepare("SELECT planteur.*,village.nomvillage FROM village,planteur WHERE planteur.village=village.idvi");
                                    $req->execute();
                                    $number=0;
                                 
                                    

                                    while($vil=$req->fetch()){
                                        $number++;
                                       
                                    
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo  $number; ?></th>
                                        <td>
                                            <?php echo $vil['code']; ?>
                                           
                                        </td>
                                        <td>
                                            <?php echo $vil['nom']." ".$vil['postnom']." ".$vil['prenom']; ?>

                                           
                                        </td>
                                        <td>
                                            <?php echo $vil['nomvillage']; ?>
                                           
                                        </td>
                                        <td>
                                            <?php echo $vil['telephone']; ?>
                                           
                                        </td>
                                        <td>
                                            <a class="btn-btn "href="gereplanteur.php?idplan=<?php echo $vil['idplan']?>">
                                                <img src="icon/device_manager.png" alt="">
                                            </a> <span></span>
                                            <a href="planteurs.php?idplan=<?php echo $vil['idplan'] ?>" class=" btn-btn ">
                                                <img src="icon/update.png"  width=25px  alt="" >
                                            </a>  
                                            <a onclick=" return confirm('Si vous supprimer ce village, les planteurs de ce village vont etre supprimer.  Voulez-vous vraiment supprimer ?')"  href="planteurs.php?idplant=<?php echo $vil['idplan']?>" class=" btn-btn ">
                                                <img src="icon/delete.png"  width=25px  alt="">
                                            </a>
                                        </td>
                                
                                    </tr>

                                    <?php }   ?>
                                   
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