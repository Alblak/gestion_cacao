<?php 
include('../../connexion/connexion.php');
if (isset($_POST["Enregistrer"])) {
    $nom=htmlspecialchars($_POST['nom']);
    

    $req=$connexion->prepare("INSERT INTO village(nomvillage) VALUES (?)");
    $req->execute(array($nom));

    $_SESSION['msg']= "Enregistrement reussi";
    header('location:../../views/villages.php');
}

?>