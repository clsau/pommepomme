<?php session_start(); ?>
<!-- Fichier d'affichage du profil de la personne connceter-->
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
    <title>Fruit land an Agriculture Category Bootstrap Responsive Website Template | Home :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">

    <!-- default css files -->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">
    <link href="css/JiSlider.css" rel="stylesheet"> <!-- banner slider css file -->
    <link href="css/simpleLightbox.css" rel="stylesheet" type="text/css"/><!-- gallery css file -->
    <link rel="stylesheet" href="css/font-awesome.min.css"/><!-- Font awesome css file -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <script src="js/javanous/search_dept.js"></script>
    <!-- default css files -->

</head>


<body>

<?php include "header.html"; ?>
</body>

<section class="service-w3ls" id="services" style="margin-top:5px;">
    <!--//about-->
    <?php //Connection avec la BDD.
        $mysqli = mysqli_connect("localhost", "root", "", "pomme");
        $Pseudo = $_SESSION["pseudo"];
        $Requete = mysqli_query($mysqli, "SELECT * FROM users  WHERE user_login = '" . $Pseudo . "'");
        $donnees = mysqli_fetch_array($Requete);
        $Requete2 = mysqli_query($mysqli, "SELECT * FROM users, code_postal  WHERE user_login = '" . $Pseudo . "' AND users.user_code_postal_id = code_postal.code_postal_id");
        $donnees2 = mysqli_fetch_array($Requete2);
    ?>
    <table border="3" align="center" width="75%" style="background-color: #546E7A">
        <tr>
            <td>
                <table align="center">
                    <tr align="center">
                        <th id="Titre" valign="top"><?php
                                $_SESSION['titre'] = $donnees['user_titre'];
                                if ($donnees['user_type'] == 1)
                                    echo $donnees['user_titre']; ?></th>
                    </tr>
                    <tr align="center">
                        <td id="Description"><?php
                                $_SESSION['description'] = $donnees['user_description'];
                                if ($donnees['user_type'] == 1)
                                    echo $donnees['user_description']; ?></td>
                    </tr>
                </table>
            </td>
            <input id="user_id" type="hidden" value='.$donnees[' user_id']'></td>
            <td align="right" width="20%">
                <table border="3" style="background-color: #455A64">
                    <tr>
                        <td>Login</td>
                        <td id="login"><?php echo $donnees['user_login']; ?></td>
                    </tr>
                    <tr>
                        <td>Nom</td>
                        <td id="Nom"><?php echo $donnees['user_nom']; ?></td>
                    </tr>
                    <tr>
                        <td>Prenom</td>
                        <td id="Prenom"><?php echo $donnees['user_prenom']; ?></td>
                    </tr>
                    <tr>
                        <td>Téléphone</td>
                        <?php $_SESSION['tel'] = $donnees['user_tel']; ?>
                        <td id="Tel">0<?php echo $donnees['user_tel']; ?></td>
                    </tr>
                    <tr>
                        <td>Mail</td>
                        <?php $_SESSION['mail'] = $donnees['user_mail']; ?>
                        <td id="mail"><?php echo $donnees['user_mail']; ?></td>
                    </tr>
                    <tr>
                        <td>Adresse</td>
                        <?php $_SESSION['adresse'] = $donnees['user_adresse']; ?>
                        <td id="adresse"><?php echo $_SESSION['adresse']; ?></td>
                    </tr>
                    <tr>
                        <td>Code postal</td>
                        <?php $_SESSION['cp'] = $donnees2['code_postal_id']; ?>
                        <td id="CP"><?php echo $_SESSION['cp']; ?></td>
                    </tr>
                    <tr>
                        <td>Ville</td>

                        <td id="Ville"><?php echo $donnees2['code_postal_commune']; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <form action="modification.php" method="post">
        <div align="center">
            <input type="submit" name="modifier" value="modifier"/>
        </div>
    </form>
    <?php if ($_SESSION['type'] == 1) { ?>
        <form action="display_products.php" method="post">
            <div align="center">
                <input type="submit" name="DisplayProduct" value="Gérer ses  produits"/>
            </div>
        </form>
    <?php } ?>
    <form action="display_order_lines.php" method="post">
        <div align="center">
            <input type="submit" name="DisplayProduct" value="Voir mes commandes"/>
        </div>
    </form>

    <form action="display_order_shipping.php" method="post">
        <div align="center">
            <input type="submit" name="DisplayShipping" value="Voir mes livraisons"/>
        </div>

    </form>
    <form action="favoris.php" method="post">
        <div align="center">
            <input type="submit" name="" value="Favoris"/>
        </div>
    </form>
</section>
<?php include "footer.html"; ?>

</html>