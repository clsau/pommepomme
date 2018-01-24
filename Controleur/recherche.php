<?php 
// à mettre tout en haut du fichier .php, cette fonction propre à PHP servira à maintenir la $_SESSION

if (isset($_GET['recherche'])) {

            $departement = htmlentities($_GET['cboDept'],ENT_QUOTES,"ISO-8859-1");
            $mysqli = mysqli_connect("localhost", "root", "", "Pomme") or die ('Impossible de se connecter');
                // on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent:
            $Requete = mysqli_query($mysqli, "Select * from users, code_postal where users.user_code_postal_id = code_postal.code_postal_id and code_postal.code_postal_departement_id ='".$departement."'");

            if (mysqli_num_rows($Requete) == 0){ 
                    //echo "dpt:".$departement;
			     echo '<script language = "JavaScript">
                    alert("Il n y a pas de producteur dans ce departement");
					window.location.replace("index.php");
					</script>';
                } else {
                    header('Location:resultat_recherche.php?cboDept='.$_GET['cboDept']);
                }  
    
}
?>