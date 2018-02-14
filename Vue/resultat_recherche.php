<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<!-- Head -->
<head>

    <title>Résultat de recherche</title>
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
    <script src="js/javanous/display_search.js"></script>
    <script src="js/javanous/search_dept.js"></script>


</head>
<!-- Body -->
<body ng-app="AppModule" ng-controller="resultSearch">


<?php include "header.html"; ?>


<section class="service-w3ls" id="services" style="margin-top:0;">

    <!--Fin du header -->

    <table ng-controller="resultSearch">
        <tr>
            <th>photo</th>
            <th>Nom du produit</th>
            <th>Description du produit</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>CP</th>
            <th>Commune</th>
            <th>Prix</th>
            <th>Unite</th>
            <th></th>
            <th></th>
        </tr>
        <tr ng-repeat="i in listeProducteurs">
            <td><img src="../images_prod/uploads/{{i.produit_photo}}"/></td>
            <td> {{i.Produit}}</td>
            <td> {{i.produit_description}}</td>
            <td> {{i.Nom}}</td>
            <td> {{i.Prenom}}</td>
            <td> {{i.CP}}</td>
            <td> {{i.Commune}}</td>
            <td> {{i.Prix}}</td>
            <td> {{i.unite}}</td>
            <td>
                <?php if (isset($_SESSION['pseudo'])) { ?>
                    <form>
                        <button id={{i.produit_id}} type="submit" data-ng-click="commande($event)"
                                class="btn btn-primary">Commander
                        </button>
                    </form>
                <?php } else { ?>
                    <a href="../Vue/identification.html">
                        <input type="button" value="Se connecter pour Commander" class="btn btn-primary">
                    </a>
                <?php } ?>

            </td>
            <td>
                <form>
                    <button id={{i.produit_user_id}} type="submit" data-ng-click="displayProfile($event)"
                            class="btn btn-primary">Voir le profil
                    </button>
                </form>
            </td>
        </tr>
    </table>

</section>
<?php include "footer.html"; ?>

</body>
</html>