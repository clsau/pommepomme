<!-- Cette page permet d'afficher la liste des commandes devant être livrées avec les lignes correspondantes . On y calcule également le montant total dû pour chaque commande en cours -->

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

</head>

<body ng-app="AppModule" ng-controller="order_shipping_ctrl">

<!-- header    MENU  -->

<div class="container-fluid">
    <nav class="navbar navbar-default" style="background-color: #FFFFFF; height: 0">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="logo">
                <a href="index.php"><img src="images/logo_litte.png" alt="LOGO"/></a>
            </div>
        </div>

        <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
            <nav>
                <ul class="nav navbar-nav">
                    <li>
                        <a href="affichage_prod.php">Profil</a>
                    </li>
                    <li>
                        <a href="../Controleur/deconnexion.php">Se déconnecter</a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</div>


<section class="service-w3ls" id="services">

    <div class="container" align="center">
        <h1>
            Livraisons en cours
        </h1>
    </div>
    <br><br><br><br>

    <?php
        $mysqli = mysqli_connect("localhost", "root", "", "Pomme");
        mysqli_set_charset($mysqli, "utf8");
        $req_cmd = mysqli_query($mysqli, "SELECT * FROM commande WHERE commande_client =" . $_SESSION['user_id'] . " ORDER BY commande_date_livraison");
        while ($donnees_cmd = mysqli_fetch_array($req_cmd)) {
            $today = date("Y-m-d H:i:s");
            mysqli_set_charset($mysqli, "utf8");
            if ($donnees_cmd['commande_date_livraison'] >= $today) {
                $req_prod = mysqli_query($mysqli, "SELECT * FROM users WHERE user_id =" . $donnees_cmd['commande_producteur']);
                $donnees_prod = mysqli_fetch_array($req_prod); ?>
                <table style="background-color: rgba(255,255,255,0.15)">

                    <tr>
                        <th colspan="2">Nom du producteur</th>
                        <th>Numéro de téléphone</th>
                        <th>Adresse mail</th>
                        <th colspan="2">Date</th>
                    </tr>
                    <tr>
                        <td colspan="2"><?php echo $donnees_cmd['commande_id'] . $donnees_prod['user_prenom'] . ' ' . $donnees_prod['user_nom']; ?></td>

                        <td><?php echo "0" . $donnees_prod['user_tel']; ?></td>

                        <td><?php echo $donnees_prod['user_mail']; ?></td>

                        <td colspan="2"><?php echo $donnees_cmd['commande_date_livraison']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="6"><b>Produits à livrer</b></td>
                    </tr>
                    <tr>
                        <th>Nom du destinataire</th>
                        <th>Numéro de téléphone</th>
                        <th>Adresse mail</th>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                    </tr>
                    <?php
                        $mysqli = mysqli_connect("localhost", "root", "", "Pomme");
                        mysqli_set_charset($mysqli, "utf8");
                        $req_lines = mysqli_query($mysqli, "SELECT * FROM ligne WHERE ligne_commande_id =" . $donnees_cmd['commande_id'] . " ORDER BY ligne_user_id");
                        $prix_tot = 0;
                        while ($donnees_lignes = mysqli_fetch_array($req_lines)) {
                            $req_clt = mysqli_query($mysqli, "SELECT * FROM users WHERE user_id =" . $donnees_lignes['ligne_user_id']);
                            $donnees_clt = mysqli_fetch_array($req_clt);
                            if ($donnees_lignes['ligne_user_id'] == $_SESSION['user_id'])
                                $color = "#ec971f";
                            else
                                $color = "#7acbd6";
                            ?>
                            <tr>
                                <td style="color: <?php echo $color; ?>;"><?php echo $donnees_clt['user_prenom'] . ' ' . $donnees_clt['user_nom']; ?></td>

                                <td style="color: <?php echo $color; ?>;"><?php echo "0" . $donnees_clt['user_tel']; ?></td>

                                <td style="color: <?php echo $color; ?>;"><?php echo $donnees_clt['user_mail']; ?></td>

                                <td style="color: <?php echo $color; ?>;"><?php echo $donnees_lignes['ligne_nom_produit']; ?></td>

                                <td style="color: <?php echo $color; ?>;"><?php echo $donnees_lignes['ligne_quantite']; ?></td>

                                <td style="color: <?php echo $color; ?>;"><?php $prix = $donnees_lignes['ligne_prix'] * $donnees_lignes['ligne_quantite'];
                                        $prix_tot += $prix;
                                        echo $prix . " €"; ?></td>
                            </tr>
                        <?php } ?>
                    <tr>
                        <td colspan="4">Prix total</td>

                        <td colspan="2"><?php echo $prix_tot . " €"; ?></td>
                    </tr>
                </table>
                <br><br><br><br>
            <?php } ?>
        <?php } ?>

</section>

<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="col-md-6 footernav">
            <div class="agileits-social">
                <ul>
                    <a href="inscription.php"
                       class="scroll">S'inscrire</a>
                </ul>
                <ul><a href="affichage_prod.php"
                       class="scroll">Profil</a>
                </ul>
                <ul>
                    <a href="../Controleur/deconnexion.php"
                       class="scroll">se déconnecter</a>
                </ul>
            </div>
        </div>
        <div class="col-md-6 footernav">
            <div class="agileits-social">
                <ul><a href="#home" class="scroll">MENTIONS LEGALES</a></ul>
            </div>
        </div>
        <div class="col-md-6 footernav">
            <div class="agileits-social">
                <ul><a href="#home" class="scroll">CONTACTS</a></ul>
            </div>
        </div>
    </div>
</div>


<!-- //footer -->
<!--//////////////////////////           FIN -->

</body>
<!-- //Body -->
</html>