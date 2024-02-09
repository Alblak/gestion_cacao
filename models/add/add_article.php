<?php include("connexion.php");

if (isset($_POST["valider"])) {
    $designation=htmlspecialchars($_POST['designation']);

    $prix=htmlspecialchars($_POST['prix']);
    $statut=0;     

    $req=$connexion->prepare("INSERT INTO article(designation,  prix, statut) VALUES (?,?,?)");
    $req->execute(array($designation,$prix, $statut));

    $mesg= "Enregistrement reussi";
}
 ?>