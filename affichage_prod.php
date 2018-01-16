<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <title>Test affichage</title>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8"/>
</head>
<body>
<?php //Connection avec la BDD.
$mysqli = mysqli_connect("localhost", "root", "", "pomme");
$Pseudo = $_SESSION["pseudo"];
$Requete = mysqli_query($mysqli, "SELECT * FROM users  WHERE login = '" . $Pseudo . "'");
$donnees = mysqli_fetch_array($Requete);
$Requete2 = mysqli_query($mysqli, "SELECT * FROM users, code_postal  WHERE login = '" . $Pseudo . "' AND users.Id_CP = code_postal.id_CP");
$donnees2 = mysqli_fetch_array($Requete2);
?>
<table border="3">
    <tr>
        <td>
            <table>
                <tr>
                    <th id="Titre"><?php echo $donnees['Titre']; ?></th>
                </tr>
                <tr>
                    <td id="Description"><?php echo $donnees['Description']; ?></td>
                </tr>
            </table>
        </td>
        <td>
            <table border="3">
                <tr>
                    <td>Login</td>
                    <td id="login"><?php echo $donnees['login']; ?></td>
                </tr>
                <tr>
                    <td>Nom</td>
                    <td id="Nom"><?php echo $donnees['Nom']; ?></td>
                </tr>
                <tr>
                    <td>Prenom</td>
                    <td id="Prenom"><?php echo $donnees['Prenom']; ?></td>
                </tr>
                <tr>
                    <td>Téléphone</td>
                    <td id="Tel">0<?php echo $donnees['Tel']; ?></td>
                </tr>
                <tr>
                    <td>Mail</td>
                    <td id="mail">0<?php echo $donnees['Mail']; ?></td>
                </tr>
                <tr>
                    <td>Adresse</td>
                    <td id="adresse"><?php echo $donnees['Adresse']; ?></td>
                </tr>
                <tr>
                    <td>Code postal</td>
                    <td id="CP"><?php echo $donnees2['CP']; ?></td>
                </tr>
                <tr>
                    <td>Ville</td>
                    <td id="Ville"><?php echo $donnees2['Nom_commune']; ?></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<br>
<form action="modifier_profil.php" method="post">
    <div align="center">
        <input type="submit" name="modifier" value="modifier"/>
    </div>
</form>
<?php
mysqli_close($mysqli); //deconnection de mysql
?>
<table>
</body>
</html>