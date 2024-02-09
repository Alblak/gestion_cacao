<?php 
include("connexion.php");
if(isset($_POST['valider']))
{
    $nom=htmlspecialchars($_POST['nom']);
    $postnom=htmlspecialchars($_POST['postnom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $villages=htmlspecialchars($_POST['village']);
    $tel=htmlspecialchars($_POST['tel']);
    $village=$villages{0};
    $code=$villages{1}.strtoupper($villages{2}).$villages{3}.$nom{0}.strtoupper($nom{1}).$nom{2}.$nom{3}.strtoupper($postnom{2});
    $photo=$_FILES['photo']['name'];
    $upload="profilplanteur/".$photo;
    move_uploaded_file($_FILES['photo']['tmp_name'],$upload);
    

    $reqq=$connexion->query("SELECT * FROM `planteur` WHERE village='$village' order by idplan desc limit 1");
    $derniere=$reqq->fetch();
    $iddd=$derniere['code'];
    $idd=$iddd{0}+1;
     echo $idd;


   $req=$connexion->prepare("INSERT INTO planteur (code,nom,postnom,prenom,photo,village,telephone) values (?,?,?,?,?,?,?)");
    $req->execute(array($idd.$code,$nom,$postnom,$prenom,$photo,$village,$tel));


}
?>