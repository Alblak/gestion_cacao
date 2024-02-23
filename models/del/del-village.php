<?php 
include('../../connexion/connexion.php');
if(isset($_GET['iddel']))
{
    $idvil=$_GET['iddel'];
    $req=$connexion->query("DELETE   FROM village where idvi='$idvil'");

    $_SESSION['msg']= "Suppression reussie";
    header('location:../../views/villages.php');
    
}
?>