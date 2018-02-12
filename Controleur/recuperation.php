<?php 

session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../Config/database.php';

$database = new database();
$db = $database->getConnection();
$email = $_POST["mail"];

$mysqli = mysqli_connect("localhost", "root", "", "Pomme");
$Requete = mysqli_query($mysqli,"Select user_mail from users where user_mail ='".$email."'");
$Requete1 = mysqli_query($mysqli,"Select * from users where user_mail ='".$email."'");
$donnees = mysqli_fetch_array($Requete);
$email1=$donnees['user_mail'];

$donnees1 = mysqli_fetch_array($Requete1);




if($email1!=$email){
	$error = "l'adresse n'existe pas ";
	echo $error;
} else{
	$sujet = "MAIL";
	// METTRE LID DU USER DANS LE LIEN POUR QUIL SOIT RECONNU AU MOMENT DE LA MODIFICATION
	$lien = "http://localhost:8888/pommepomme/Vue/modificationMDP.html";
	$adresse_exp = "innadiall@yahoo.fr";
	$nom =$donnees1['user_nom'];
	$contenu ="Bonjour " .$nom ."\n" ."\n" ."Pour récuperer votre mot de passe suivez le lien suivant " ."\n" ."\n" .$lien ;
	//$succes = mail($email,$sujet,$adresse_exp,$nom,$contenu);
	$succes=mail($email,$sujet,$contenu);
	header('Location:http://localhost:8888/pommepomme/Controleur/index.php');
  	exit();


}

mysqli_close($mysqli);
?>