<?php 
// à mettre tout en haut du fichier .php, cette fonction propre à PHP servira à maintenir la $_SESSION

if (isset($_GET['recherche'])) {
            $departement = htmlentities($_GET['cboDept'], ENT_QUOTES, "ISO-8859-1"); // le htmlentities() passera les guillemets en entités HTML, ce qui empêchera les injections SQL
            $mysqli = mysqli_connect("localhost", "root", "", "pomme") or die ('Impossible de se connecter');
                // on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent:
                $Requete = mysqli_query($mysqli, "SELECT * FROM users WHERE user_code_postal_id=(select code_postal_id From code_postal where code_postal_departement_id='" . $departement . "')");
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