<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <title>Commande</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="livrer-les-tous"/>

    <!-- default css files -->
    <link rel="stylesheet" href="../Vue/css/bootstrap.css" type="text/css" media="all">
    <link href="../Vue/css/JiSlider.css" rel="stylesheet"> <!-- banner slider css file -->
    <link href="../Vue/css/simpleLightbox.css" rel="stylesheet" type="text/css"/><!-- gallery css file -->
    <link rel="stylesheet" href="../Vue/css/font-awesome.min.css"/><!-- Font awesome css file -->
    <link rel="stylesheet" href="../Vue/css/style.css" type="text/css" media="all">
    <!-- default css files -->

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
    <script src="../config/app.js"></script>
    <script src="js/javanous/search_dept.js"></script>
    <script src="js/javanous/add_order_line.js"></script>
    <script type="text/javascript">
        function yesnoCheck() {
            if (document.getElementById('delivChecked').checked) {
                document.getElementById('ifYes').style.display = 'block';
                document.getElementById('ifNo').style.display = 'none';
            }
            else {
                document.getElementById('ifYes').style.display = 'none';
                document.getElementById('ifNo').style.display = 'block';
            }
        }
    </script>

</head>

<body ng-app="AppModule" ng-controller="addLineCtrl">
<?php include "header.html"; ?>

<section class="service-w3ls" id="services" style="margin-top:0;">


    <?php
        $id_com = $_COOKIE['commandePassee'];
        $mysqli = mysqli_connect("localhost", "root", "", "Pomme");
        $mysqli->set_charset("utf8");
        $Requete = mysqli_query($mysqli, "SELECT * FROM produit WHERE (SELECT commande_producteur FROM commande WHERE commande_id = '" . $id_com . "') = produit_user_id");
    ?>
    <table>
        <tr>
            <th>Photo</th>
            <th>Nom Produit</th>
            <th>Prix</th>
            <th>Unité</th>
            <th>Quantité Choisie</th>
        </tr>
        <?php while ($donnees = mysqli_fetch_array($Requete)) { ?>
            <tr>

                <td id="photo"><img style="width:75px;height:75px;" src="../images_prod/uploads/<?php
                        echo $donnees['produit_photo']; ?>"></td>
                <td id="Produit" valign="top"><?php
                        echo $donnees['produit_nom']; ?></td>
                <td id="Prix" valign="top"><?php
                        echo $donnees['produit_prix']; ?></td>
                <td id="Unite" valign="top"><?php
                        echo $donnees['produit_valeur_unite'];
                        echo " ";
                        echo $donnees['produit_unite']; ?></td>
                <td valign="top" style="color:black;">
                    <select id="qt<?php echo $donnees['produit_id']; ?>">
                        <?php for ($i = 1; $i <= $_SESSION['contenance' . $id_com]; $i++) : ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </td>
                <td>
                    <button id=<?php echo $donnees['produit_id']; ?> type="submit" data-ng-click="addLine($e)"
                            class="btn btn-primary">Commander
                    </button>
                </td>
            </tr>

        <?php } ?>
    </table>
    <?php include "footer.html"; ?>

</body>
<!-- //Body -->
</html>
