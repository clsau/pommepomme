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
    <script src="../Config/app.js"></script>
    <script src="../Vue/js/javanous/add_order_line.js"></script>
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
<?php include "header.html";?>

<!-- header    MENU  

<div class="container-fluid">

    <nav class="navbar navbar-default" style="background-color: #FFFFFF; height: 0">
        <!-- Brand and toggle get grouped for better mobile display 
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="logo">
                <a href="index.php"><img src="../Vue/images/logo_litte.png" alt="LOGO"/></a>
            </div>
        </div>

        <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
            <nav>
                <ul class="nav navbar-nav">
                    <li>
                        <a href="inscription.php"><?php if (!isset($_SESSION['pseudo'])) echo "S'inscrire"; ?></a>
                    </li>
                    <li>
                        <a href="../Vue/identification.php"><?php if (!isset($_SESSION['pseudo'])) echo "Se connecter"; ?></a>
                    </li>
                    <li><a href="affichage_prod.php"><?php if (isset($_SESSION['pseudo'])) echo "Profil"; ?></a>
                    </li>
                    <li>
                        <a href="deconnexion.php"><?php if (isset($_SESSION['pseudo'])) echo "Se deconnecter"; ?></a>
                    </li>
                    <li style="margin-top:15px;">
                        <?php //Connection avec la BDD.
                            $mysqli = mysqli_connect("localhost", "root", "", "Pomme");
                            $request = mysqli_query($mysqli, "SELECT * FROM departement");
                            $request1 = mysqli_query($mysqli, "SELECT * FROM categorie");
                        ?>

                        <form name="SearchForm">
                            <select name="cboDept" ng-model="item.cboDept">
                                <?php while ($donnees = mysqli_fetch_array($request)) { ?>
                                    <option name="departement"
                                            value="<?php echo $donnees['departement_id']; ?>"><?php echo $donnees['departement_nom']; ?></option>
                                <?php } ?>
                            </select>


                            <select name="categorie" ng-model="item.categorie">
                                <?php while ($donnees = mysqli_fetch_array($request1)) { ?>
                                    <option name="categorie"
                                            value="<?php echo $donnees['categorie_id']; ?>"><?php echo $donnees['categorie_nom']; ?></option>
                                <?php } ?>
                            </select>
                            <?php
                                mysqli_close($mysqli); //deconnection de mysql ?>
                    </li>
                    <li style="margin-top:15px;margin-left:10px;">
                        <button type="button" ng-click="formsubmit(item.cboDept,item.categorie)"
                                ng-disabled="SearchForm.$invalid" class="btn btn-primary">Recherche
                        </button>
                    </li>
                    </form>
                </ul>
            </nav>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

</div>


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
    <div class="footer" style="margin-top:10px;">
        <div class="container" style="margin-top:100px;">
            <div class="col-md-6 footernav">
                <div class="agileits-social">
                    <ul>
                        <a href="inscription.php"
                           class="scroll"><?php if (!isset($_SESSION['pseudo'])) echo "S'inscrire"; ?></a>
                    </ul>
                    <ul>
                        <a href="../Vue/identification.html"
                           class="scroll"><?php if (!isset($_SESSION['pseudo'])) echo "Se connecter"; ?></a>
                    </ul>
                    <ul><a href="affichage_prod.php"
                           class="scroll"><?php if (isset($_SESSION['pseudo'])) echo "Profil"; ?></a>
                    </ul>
                    <ul>
                        <a href="deconnexion.php"
                           class="scroll"><?php if (isset($_SESSION['pseudo'])) echo "Se deconnecter"; ?></a>
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

</body>
<!-- //Body -->
</html>
