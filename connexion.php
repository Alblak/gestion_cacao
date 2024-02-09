<?php
try {
session_start();	
$connexion=new PDO('mysql:dbname=gestion_cacao; host=localhost', 'root', '');
} catch (Exception $e) {
	echo $e;
	
}


?>