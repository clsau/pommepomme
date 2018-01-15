<?php
/**
 * Created by PhpStorm.
 * User: Elhevan
 * Date: 15/01/2018
 * Time: 12:52
 */
/*
Page: connexion.php
*/
session_start(); // à mettre tout en haut du fichier .php, cette fonction propre à PHP servira à maintenir la $_SESSION

if(isset($_POST['connexion'])) {

    if(empty($_POST['login'])) {
        echo "Le champ login est vide.";
    } else {
        if(empty($_POST['mdp'])) {
            echo "Le champ Mot de passe est vide.";
        } else {
            $Pseudo = htmlentities($_POST['login'], ENT_QUOTES, "ISO-8859-1"); // le htmlentities() passera les guillemets en entités HTML, ce qui empêchera les injections SQL
            $MotDePasse = htmlentities($_POST['mdp'], ENT_QUOTES, "ISO-8859-1");
            $mysqli = mysqli_connect("localhost", "root", "", "pomme");
            if(!$mysqli){
                echo "Erreur de connexion à la base de données.";
            } else {
                // on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent:
                $Requete = mysqli_query($mysqli,"SELECT * FROM users  WHERE login = '".$Pseudo."' AND mdp = '".$MotDePasse."'");//si vous avez enregistré le mot de passe en md5() il vous suffira de faire la vérification en mettant mdp = '".md5($MotDePasse)."' au lieu de mdp = '".$MotDePasse."'
                if(mysqli_num_rows($Requete) == 0) {
                    echo '<script language = "JavaScript">
                        alert("Mot de passe ou login incorrect.");
                            window.location.replace("connexion.html");
                            </script>';
                } else {
                    // on ouvre la session avec $_SESSION:
                    $_SESSION['pseudo'] = $Pseudo; // la session peut être appelée différemment et son contenu aussi peut être autre chose que le pseudo
                    echo '<script language = "JavaScript">
                        alert("Connexion effectuée");
                            window.location.replace("accueil_testco.html");
                            </script>';
                    exit;//on affiche pas le reste de la page pour faire une redirection parfaite et sans erreurs

                }
            }
        }
    }
}
?>