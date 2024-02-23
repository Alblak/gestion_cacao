<?php
include("connexion.php");

if(isset($_GET['idvi']))
{
    $id=$_GET['idvi'];
    $req=$connexion->prepare("SELECT * from village where idvi=?");
    $req->execute(array($id));
    $sel_village=$req->fetch();
    $action="../models/update/up-village.php?idvi=$id";
    $bouton="Modifier";
}
else
{
    $action="../models/add/add-village.php";
    $bouton="Enregistrer";
    
}
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
      
        <section class="section" id="village" >
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center "> Les villages</h5>
                                                    
                            <!-- Table with stripped rows -->
                            <?php if(isset($_GET['new']) ||isset($_GET['idvi']))  { ?>
                                <form  class="shadow p-3"action="<?=$action?>" method="post">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 mt-10 col-sm-12 p-3">
                                        <label for="">Nom village</label>
                                        <input autocomplete="off" required type="text" class="form-control" placeholder="Entrez le village" name="nom" <?php if(isset($sel_village)){?> value="<?=$sel_village['nomvillage']?>"<?php } ?> > 

                                    </div>
                                   
                                    <div class="col-xl-12 col-lg-12 col-md-12 mt-10 col-sm-12 p-3 aling-center">
                                        <input type="submit" class="btn btn-dark w-100" name="<?=$bouton?>" value="<?=$bouton?>">
                                    
                                    </div>
                            </div>
               
               
                                </form>

                            <?php }else{ ?>
                                <a href="villages.php?new" class=" btn btn-outline-primary bi bi-plus">Nouveau village</a> 

                            <?php }?>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Nom du village</th>
                                        <th scope="col">action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                        $req=$connexion->prepare("SELECT * FROM village");
                                        $req->execute();
                                        $number=0;

                                        while($donnee=$req->fetch()){
                                            $number++;

                                        ?>

                                        <tr>
                                            <th scope="row"><?php echo $number; ?></th>
                                            <td><?php echo $donnee['1']; ?></td>
                                            <td>
                                                <a href="villages.php?idvi=<?=$donnee['idvi']?>" class="btn btn-dark btn-sm "><i class="bi bi-pencil-square"></i></a>
                                                <a onclick=" return confirm('Voulez-vous vraiment supprimer')" href="../models/del/del-village.php?iddel=<?=$donnee['idvi']?>" class="btn btn-danger btn-sm "><i class="bi bi-trash3-fill"></i></a>
                                            </td>
                                            
                                            
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
    <?php include('footer.php'); ?>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <?php include_once('scriptjs.php')?>

</body>

</html>