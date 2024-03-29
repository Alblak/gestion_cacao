<?php
include("connexion.php");

if (isset($_POST["valider"])) {
    $designation=htmlspecialchars($_POST['designation']);

    $prix=htmlspecialchars($_POST['prix']);
    $statut=0;     

    $req=$connexion->prepare("INSERT INTO article(designation,  prix, statut) VALUES (?,?,?)");
    $req->execute(array($designation,$prix, $statut));

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
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
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
                <li class=" pe-3 btn btn-outline-danger mx-2">
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
                            <h4 class="card-title text-center">Ajouter un Article</h4>
                            <div class="modal modal-signin position-static d-block  py-1" tabindex="-1" role="dialog"
                                id="modalSignin">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content rounded-5 shadow">
                                        <div class="modal-header border-bottom-0">
                                            <h3></h3>

                                            <a href="Admin.php">
                                                <button type="button" class="btn-close fw-bold fz-40"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </a>
                                        </div>
                                        <div class="modal-body p-5 pt-0">
                                            <form class="row g-3 needs-validation" method="POST" novalidate>
                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control rounded-4" id="floatingInput"
                                                        required name="designation">
                                                    <label for="floatingInput">designation</label>
                                                </div>

                                               

                                                <div class="form-floating mb-2">
                                                    <input type="text" class="form-control rounded-4" id="floatingInput"
                                                        required name="prix">
                                                    <label for="floatingInput">Prix</label>
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
                                                    name="valider"> Enregistrer</button> <br>
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
                            <h5 class="card-title">Nos articles</h5>
                            

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">quantité</th>
                                        <th scope="col">prix</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $req=$connexion->query("SELECT * from article");
                                $num=0;
                                while($article=$req->fetch())
                                    {
                                        $num++;
                                
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $num?></th>
                                        <td><?php echo $article['designation']?></td>
                                        <td>qte</td>
                                        <td><?php echo $article['prix']?>$</td>
                                        
                                        
                                    </tr>
                                    <?php }?>
                                   
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
        <?php include('footer.php');?>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
 <!-- ======= JS script ======= -->
            <?php include_once('scriptjs.php')?>

</body>

</html>