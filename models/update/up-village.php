<?php 
include('../../connexion/connexion.php');
if(isset($_POST['Modifier']))
{
    $idvi=$_GET['idvi'];
    $nom=htmlspecialchars($_POST['nom']);
    $req=$connexion->prepare("UPDATE village set nomvillage=? where idvi='$idvi'");
    $req->execute(array($nom));

    $_SESSION['msg']= "modification  reussie";
    header('location:../../views/villages.php');
}


?>