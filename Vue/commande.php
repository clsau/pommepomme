<?php session_start(); ?>
<!-- page d'affichage du formulaire permettant la commande -->

<!DOCTYPE html>
<html lang="fr">

<head>

    <title>Commande</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="livrer-les-tous"/>

    <!-- default css files -->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">
    <link href="css/JiSlider.css" rel="stylesheet"> <!-- banner slider css file -->
    <link href="css/simpleLightbox.css" rel="stylesheet" type="text/css"/><!-- gallery css file -->
    <link rel="stylesheet" href="css/font-awesome.min.css"/><!-- Font awesome css file -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <!-- default css files -->

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
    <script src="../config/app.js"></script>
    <script src="js/javanous/commandeCtrl.js"></script>
    <script src="js/javanous/search_dept.js"></script>

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

<body ng-app="AppModule" ng-controller="commandeCtrl">

<?php include "header.html"; ?>


<section class="service-w3ls" id="services" style="margin-top:0;">


    <?php

        $id_produit = $_GET["produit_id"];
        $_SESSION['id_produit'] = $id_produit;
        $mysqli = mysqli_connect("localhost", "root", "", "Pomme");
        $mysqli->set_charset("utf8");
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

                <td id="quantiteligne" valign="top" style="color:black;">
                    <select ng-model="quantite">
                        <option selected="selected">1</option>
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
        <form style="margin-top: 5px; width: 30%;">
            <label class="switch" style="margin-top: 25px;">
                <input class="switch-input" type="checkbox" id="delivChecked" onclick="yesnoCheck();">
                <span class="slider round">
                    <span class="on">Je livre</span>
                    <span class="off">Je ne livre pas</span>
                </span>
            </label>
        </form>
        <br><br><br><br><br><br>


        <form name="createOrderForm">
            <fieldset>
                <div id="ifNo">
                    <label for="daterecup">Date de récupération</label>
                    <input type="date" id="datelivraison" ng-model="commande_date_recup"/><br/><br/>
                </div>
                <div id="ifYes" style="display:none">
                    <div>
                        <label for="datelivraison">Date de livraison</label>
                        <input type="date" id="datelivraison" ng-model="commande_date_livraison"/><br/><br/>
                    </div>
                    <div>
                        <label for="lieulivraison">Lieu de livraison :</label>
                        <input type="text" id="lieulivraison" ng-model="commande_lieu_livraison"/><br/><br/>
                    </div>
                    <div>
                        <label for="commande_description">Informations relatives à votre livraison (lieu, heure...)
                            :</label>
                        <input type="text" id="commande_description" ng-model="commande_description"/><br/><br/>
                    </div>
                    <div>
                        <label for="contenance">Capacité de livraison :</label>
                        <input type="number" ng-model="commande_contenance"/><br/><br/> <br/>
                    </div>
                </div>
                <div style="margin-left:50%; margin-top:30px">
                    <button type="submit" ng-click="createOrder()" class="btn btn-primary">Valider
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="container">
        <br>
        <h3>
            Les autres produits de ce producteur...
        </h3>
        <br>
    </div>

    <table>
        <tr>
            <th>Photo</th>
            <th>Nom Produit</th>
            <th>Description produit</th>
            <th>Prix</th>
            <th>Unité</th>
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

            </tr>
        <?php } ?>
    </table>


</section>


<?php include "footer.html"; ?>


</body>
<!-- //Body -->
</html>