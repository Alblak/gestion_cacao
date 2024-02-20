<?php
    include("connexion.php");
    if (isset($_POST["valider"])) {
        $nom=htmlspecialchars($_POST['nom']);
        $postnom=htmlspecialchars($_POST['postnom']);
        $adress=htmlspecialchars($_POST['adress']); 
        $telephone=htmlspecialchars($_POST['telephone']);
        $statut=0;     

        $req=$connexion->prepare("INSERT INTO client(nom, postnom, adress, telephone, statut) VALUES (?,?,?,?,?)");
        $req->execute(array($nom, $postnom, $adress, $telephone, $statut));

        $mesg= "Enregistrement reussi";
    }

    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $req=$connexion->query("SELECT * FROM `client` WHERE client.id='$id'");
        $client=$req->fetch();
    }
    if(isset($_POST['modifier']))
    {
        $idplan=$_GET['id'];
        $nom=htmlspecialchars($_POST['nom']);
        $postnom=htmlspecialchars($_POST['postnom']);
        $adress=htmlspecialchars($_POST['adress']); 
        $telephone=htmlspecialchars($_POST['telephone']);
        $statut=0;

        $req=$connexion->prepare("UPDATE client SET nom=?, postnom=?,adress=?, telephone=?, statut=? where id='$idplan'");
        $req->execute(array($nom,$postnom,$adress,$telephone,$statut));
        if($req)
        {
            $msg="modification reussie";
            header('location:AjoutClient.php');
        }


    }
    if(isset($_GET['idDel']))
    {
        $idDel=$_GET['idDel'];
        $req=$connexion->query("UPDATE client SET statut=1 WHERE id='$idDel'");
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Clients</title>
    <!-- Vendor CSS Files -->
    <?php include("link.php"); ?>
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
                <li class="nav-item pe-3 btn btn-outline-danger mx-2">
                    <a class="nav-link d-flex align-items-center pe-0 " href="Admin.php?idsite=<?php $site ?>">
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
                            
                            <div class="modal modal-signin position-static d-block  py-1" tabindex="-1" role="dialog"
                                id="modalSignin">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content rounded-5 shadow">
                                        <div class="modal-header border-bottom-0">
                                        <h4 class="card-title text-center">AJouter un Clients</h4>

                                        </div>
                                        <div class="modal-body p-5 pt-0">
                                            <form class="row g-3 needs-validation" method="POST" novalidate>
                                            <div class="form-floating mb-2">
                                                    <input type="text" class="form-control rounded-4" id="floatingInput"
                                                        required name="nom"<?php if(isset($client)){ ?>value="<?=$client['nom'] ?>" <?php } ?>>
                                                    <label for="floatingInput">Nom </label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control rounded-4" id="floatingInput"
                                                        required name="postnom"<?php if(isset($client)){ ?>value="<?=$client['postnom'] ?>" <?php } ?>>
                                                    <label for="floatingInput">Postnom</label>
                                                </div>
                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control rounded-4" id="floatingInput"
                                                        required name="adress"<?php if(isset($client)){ ?>value="<?=$client['adress'] ?>" <?php } ?>>
                                                    <label for="floatingInput">Adresse</label>
                                                </div>

                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control rounded-4" id="floatingInput"
                                                        required name="telephone"<?php if(isset($client)){ ?>value="<?=$client['telephone'] ?>" <?php } ?>>
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
                                                <?php if(isset($_GET['id'])){  ?>
                                                          <a href="AjoutClient.php" class="btn btn-success btn-lg rounded-5">Annuler</a>
                                               <?php } ?>
                                                

                                                <button class="w-100 mb-2 btn btn-lg rounded-5 btn-outline-primary" type="submit"
                                                     <?php if(isset($_GET['id'])){ ?>name="modifier" <?php } else { ?> name="valider" <?php } ?> >  
                                                     <?php if(isset($_GET['id'])){ ?>modifier<?php } else { ?>Enregistrer<?php } ?>
                                                </button>
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
                            <h5 class="card-title text-center ">Listes des Clients</h5>


                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Noms</th>
                                        <th scope="col">Adresse</th>
                                        <th scope="col">Telephone</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 

                                    $req=$connexion->prepare('SELECT id, nom, postnom, adress, telephone FROM client WHERE statut=0');
                                    $req->execute();
                                    $number=0;

                                    while($donnee=$req->fetch()){
                                        $number++;
                                    
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo  $number; ?></th>
                                        <td>
                                            <?php echo $donnee['1']; ?>
                                            <?php echo $donnee['2']; ?>
                                        </td>
                                        <td><?php echo $donnee['3']; ?></td>
                                        <td><?php echo $donnee['4']; ?></td>
                                        <td>
                                            <a href="AjoutClient.php?id=<?php echo $donnee['0'] ?>" class=" btn btn-primary mb-2">
                                               Modifier
                                            </a>  <br>
                                            <a onclick=" return confirm('Voulez-vous vraiment supprimer ?')"  href="AjoutClient.php?idDel=<?php echo $donnee['0']?>" class=" btn btn-danger ">
                                                Supprimer
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

            </div>
        </section>
    </div>


    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Margeurita</span></strong>. All Rights Reserved
        </div>
        <div class="credits">

            Designed by <a href="#"> Glad</a>
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