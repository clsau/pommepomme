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
    <script src="../Vue/js/javanous/commandeCtrl.js"></script>

</head>

<body ng-app="AppModule" ng-controller="commandeCtrl">

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
                        <a href="../Vue/identification.html"><?php if (!isset($_SESSION['pseudo'])) echo "Se connecter"; ?></a>
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

        $id_produit = $_GET["produit_id"];
        $_SESSION['id_produit'] = $id_produit;
        $mysqli = mysqli_connect("localhost", "root", "", "Pomme");
        $Requete = mysqli_query($mysqli, "SELECT * FROM produit, users WHERE produit.produit_id = '" . $id_produit . "' AND produit.produit_user_id = users.user_id");
        $Requete2 = mysqli_query($mysqli, "SELECT * FROM produit, users WHERE produit.produit_id = '" . $id_produit . "' AND produit.produit_user_id = users.user_id");
        $Requete3 = mysqli_query($mysqli, "SELECT P1.* FROM produit P1, produit P2 WHERE P1.produit_id != '" . $id_produit . "' AND P2.produit_id = '" . $id_produit . "'  AND P2.produit_user_id = P1.produit_user_id");
    ?>

    <!--Fin du header -->

    <div class="container">

        <h1>
            <?php while ($donnees2 = mysqli_fetch_array($Requete2)) {
                echo "Commande chez le producteur  ";
                echo $donnees2['user_prenom'];
                echo " ";
                echo $donnees2['user_nom'];
                echo " ( ";
                echo $donnees2['user_titre'];
                echo " ) ";
                $_SESSION['producteur_id'] = $donnees2['user_id'];
            } ?>
        </h1>
        <br>
    </div>

    <input type="hidden" ng-model="id_produit" value="<?php echo $id_produit; ?>">
    <input type="hidden" ng-model="producteur_id" value="<?php echo $_SESSION['producteur_id']; ?>">
    <input type="hidden" ng-model="user_id" value="<?php echo $_SESSION['user_id'] ?>">


    <table>
        <tr>
            <th>Photo</th>
            <th>Nom Produit</th>
            <th>Prix</th>
            <th>Unite</th>
            <th>Quantite Choisie</th>
        </tr>

        <?php while ($donnees = mysqli_fetch_array($Requete)) { ?>

            <tr>

                <td id="photo"><?php
                        echo $donnees['produit_photo']; ?></td>

                <td id="Produit" valign="top"><?php
                        echo $donnees['produit_nom']; ?></td>

                <td id="Prix" valign="top"><?php
                        echo $donnees['produit_prix']; ?></td>

                <td id="Unite" valign="top"><?php
                        echo $donnees['produit_valeur_unite'];
                        echo " ";
                        echo $donnees['produit_unite']; ?></td>

                <td id="quantiteligne" valign="top" style="color:black;">
                    <select ng-model="quantite">
                        <option value=1>1</option>
                        <option value=2>2</option>
                        <option value=3>3</option>
                        <option value=4>4</option>
                        <option value=5>5</option>
                        <option value=6>6</option>
                        <option value=7>7</option>
                        <option value=8>8</option>
                        <option value=9>9</option>
                        <option value=10>10</option>
                        <option value=11>12</option>
                        <option value=13>13</option>
                        <option value=14>14</option>
                        <option value=15>15</option>
                        <option value=16>16</option>
                        <option value=17>17</option>
                        <option value=18>18</option>
                        <option value=19>19</option>
                        <option value=20>20</option>
                    </select>
                </td>

            </tr>
        <?php } ?>
    </table>

    <div class="container">
        <br>
        <h3>
            Voulez-vous également commander d'autres produits du même producteur ?
        </h3>
        <br>
    </div>

    <table>
        <tr>
            <th>Photo</th>
            <th>Nom Produit</th>
            <th>Description produit</th>
            <th>Prix</th>
            <th>Unite</th>
            <th>Quantite Choisie</th>
        </tr>

        <?php while ($donnees3 = mysqli_fetch_array($Requete3)) { ?>

            <tr>

                <td id="photo"><img style="width:75px;height:75px;" src="../images_prod/uploads/<?php
                        echo $donnees3['produit_photo']; ?>"></td>

                <td id="Produit" valign="top"><?php
                        echo $donnees3['produit_nom']; ?></td>

                <td id="Produit" valign="top"><?php
                        echo $donnees3['produit_description']; ?></td>

                <td id="Prix" valign="top"><?php
                        echo $donnees3['produit_prix']; ?></td>

                <td id="Unite" valign="top"><?php
                        echo $donnees3['produit_valeur_unite'];
                        echo " ";
                        echo $donnees3['produit_unite']; ?></td>

                <td id="Quantite" valign="top" style="color:black;">
                    <select>
                        <option value=0>0</option>
                        <option value=1>1</option>
                        <option value=2>2</option>
                        <option value=3>3</option>
                        <option value=4>4</option>
                        <option value=5>5</option>
                        <option value=6>6</option>
                        <option value=7>7</option>
                        <option value=8>8</option>
                        <option value=9>9</option>
                        <option value=10>10</option>
                        <option value=11>12</option>
                        <option value=13>13</option>
                        <option value=14>14</option>
                        <option value=15>15</option>
                        <option value=16>16</option>
                        <option value=17>17</option>
                        <option value=18>18</option>
                        <option value=19>19</option>
                        <option value=20>20</option>
                    </select>
                </td>

            </tr>
        <?php } ?>
    </table>


    <div align="center" style="background-color: rgba(127,241,190,0.28); margin:auto; width: 70%; margin-top: 30px">
    <form style="margin:auto; width: 30%;">
        <label for="choix_livraison">Proposer la livraison</label>
        <input type="checkbox" id="choix_livraison" name="choix_livraison" value="choix_livraison" checked>
    </form>


        <form name="createOrderForm">
            <fieldset>
                <div>
                    <label for="datelivraison">Date de livraison</label>
                    <input type="date" id="datelivraison" ng-model="commande_date_livraison"/><br/><br/>
                </div>
                <div>
                    <label for="lieulivraison">Lieu de livraison :</label>
                    <input type="text" id="lieulivraison" ng-model="commande_lieu_livraison"/><br/><br/>
                </div>
                <div>
                    <label for="commande_description">Description :</label>
                    <input type="text" id="commande_description" ng-model="commande_description"/><br/><br/>
                </div>
                <div>
                    <label for="contenance">Capacité de livraison :</label>
                    <input type="text" id="contenance" ng-model="commande_contenance"/><br/><br/> <br/>
                </div>
                <div style="margin-left:50%; margin-top:30px">
                    <button type="submit" ng-click="createOrder()" class="btn btn-primary">Valider
                    </button>
                </div>
            </fieldset>
        </form>


</section>

<!-- footer -->
<div class="footer" style="margin-top:0px;">
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


<!-- //footer -->
<!--//////////////////////////           FIN -->

</body>
<!-- //Body -->
</html>