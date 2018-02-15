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
    <script src="../Vue/js/javanous/display_order_lines.js"></script>
    <script src="js/javanous/search_dept.js"></script>

</head>

<body ng-app="AppModule" ng-controller="order_lines_ctrl">

<?php include "header.html"; ?>


<section class="service-w3ls" id="services">

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>


    <div class="container">
        <h1>
            Commandes passées
        </h1>

    </div>


    <table>
        <tr>
            <th>Produit</th>
            <th>Information sur la commande</th>
            <th>Votre livreur</th>
            <th>Producteur</th>
        </tr>
        <tr ng-repeat="i in listLigneCommandes">
            <td>
                <table class="sous_tab">
                    <tr class="sous_tab">
                        <td class="sous_tab">Nom :</td>
                        <td class="sous_tab">{{i.ligne_nom_produit}}</td>
                    </tr>
                    <tr class="sous_tab">
                        <td class="sous_tab">Prix :</td>
                        <td class="sous_tab">{{i.ligne_prix}}</td>
                    </tr>
                    <tr class="sous_tab">
                        <td class="sous_tab">Quantité :</td>
                        <td class="sous_tab">{{i.ligne_quantite}}</td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="sous_tab">
                    <tr class="sous_tab">
                        <td class="sous_tab">statut :</td>
                        <td class="sous_tab">{{i.commande_statut}}</td>
                    </tr>
                    <tr class="sous_tab">
                        <td class="sous_tab">date de livraison :</td>
                        <td class="sous_tab">{{i.commande_date_livraison}}</td>
                    </tr>
                    <tr class="sous_tab">
                        <td class="sous_tab">lieu de livraison :</td>
                        <td class="sous_tab">{{i.commande_lieu}}</td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="sous_tab">
                    <tr class="sous_tab">
                        <td class="sous_tab">Nom :</td>
                        <td class="sous_tab">{{i.livreur_nom}}</td>
                    </tr>
                    <tr class="sous_tab">
                        <td class="sous_tab">Prenom :</td>
                        <td class="sous_tab">{{i.livreur_prenom}}</td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="sous_tab">
                    <tr class="sous_tab">
                        <td class="sous_tab">nom :</td>
                        <td class="sous_tab">{{i.prod_nom}}</td>
                    </tr>
                    <tr class="sous_tab">
                        <td class="sous_tab">Prénom :</td>
                        <td class="sous_tab">{{i.prod_prenom}}</td>
                    </tr>
                    <tr class="sous_tab">
                        <td class="sous_tab">Tel:</td>
                        <td class="sous_tab">{{i.prod_tel}}</td>
                    </tr>
                    <tr class="sous_tab">
                        <td class="sous_tab">Mail :</td>
                        <td class="sous_tab">{{i.prod_mail}}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>


</section>


</body>
<?php include "footer.html"; ?>
<!-- //Body -->
</html>