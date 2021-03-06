<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" ng-app="AppModule">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          type="text/css"/>
    <title>Afficher les produits</title>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
    <script src="../config/app.js"></script>
    <script src="js/javanous/display_product.js"></script>
    <script type="text/javascript">
        function addid(clicked_id) {
            document.cookie = "cookieName=" + clicked_id;
            window.location.replace("../Vue/add_picture.php");
        }
    </script>
</head>
<body>
<div ng-app="AppModule" ng-controller="formDisplayCtrl" class="container">
    <h2 class="text-center text-primary">Gestion des produits
        <form class="form-horizontal well form-search" action="affichage_prod.php" method="post"><input
                    class="btn btn-primary" type="submit" name="Accueil" value="Retour"/></form>
    </h2>

    <hr>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <table>
                <tr>
                    <td width="700" align="center">
                        <form class="form-horizontal well form-search">
                            <input type="button" class="btn btn-primary" ng-click="displayProduct()"
                                   value="Gérer les produits existant"/>
                        </form>
                    </td>
                    <td width="700" align="center">
                        <form class="form-horizontal well form-search" action="create_product.php"
                              method="post">

                            <input class="btn btn-primary" type="submit" name="AjouterProduit"
                                   value="Ajouter un produit"/>

                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <table>
        <tr>
            <td>
                <table>
                    <tbody ng-repeat="i in products">
                    <tr>
                        <th>Nom</th>
                        <th>{{i.produit_nom}}</th>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{i.produit_description}}</td>
                    </tr>
                    <tr>
                        <td>Photo</td>
                        <td>{{i.produit_photo}}</td>
                    </tr>
                    <tr>
                        <td>Prix</td>
                        <td>{{i.produit_prix}} le {{i.produit_unite}}</td>
                    </tr>
                    <tr>
                        <td>Stock</td>
                        <td>{{i.produit_stock}} {{i.produit_unite}}</td>
                    </tr>
                    <tr>
                        <td>Taille du lot</td>
                        <td>{{i.produit_valeur_unite}} {{i.produit_unite}}</td>
                    </tr>
                    <tr>
                        <td>Categorie</td>
                        <td>{{i.produit_categorie_id}}</td>
                    </tr>
                    <tr>
                        <td>
                            <form name="updateProductForm" class="form-horizontal well form-search">
                                <button id={{i.produit_id}} type="submit" data-ng-click="update($e)"
                                        ng-disabled="updateProductForm.$invalid"
                                        class="btn btn-primary">Modifier
                                </button>
                            </form>
                        </td>

                        <td>
                            <form name="updateProductForm"
                                  class="form-horizontal well form-search">
                                <button id={{i.produit_id}} onclick="addid(this.id)" type="submit"
                                        class="btn btn-primary">Modifier l'image
                                </button>
                            </form>
                        </td>
                        <td>
                            <form name="updateProductForm" class="form-horizontal well form-search">
                                <button id={{i.produit_id}} type="submit" data-ng-click="sup($e)"
                                        ng-disabled="updateProductForm.$invalid"
                                        class="btn btn-primary">Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td valign="top">
                <form ng-show="show" class="form-horizontal well form-search">
                    <table>
                        <tbody>
                        <tr>
                            <th>Nom</th>
                            <th><input ng-model="produit_nom">
                            </th>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td><input ng-model="produit_description"></td>
                        </tr>
                        <tr>
                            <td>Photo</td>
                            <td><input ng-model="produit_photo"></td>
                        </tr>
                        <tr>
                            <td>Prix</td>
                            <td><input ng-model="produit_prix"></td>
                        </tr>
                        <tr>
                            <td>Stock</td>
                            <td><input ng-model="produit_stock"></td>
                        </tr>
                        <tr>
                            <td>Taille du lot</td>
                            <td><input ng-model="produit_valeur_unite"></td>
                        </tr>
                        <tr>
                            <td>Unite du lot</td>
                            <td><input ng-model="produit_unite"></td>
                        </tr>
                        <tr>
                            <td>Categorie</td>
                            <td><input ng-model="produit_categorie_id"></td>
                        </tr>
                        <tr>
                            <td>
                                <button type="submit" data-ng-click="validate($event)"
                                        ng-disabled="updateProductForm.$invalid"
                                        class="btn btn-primary">Valider
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </td>
        </tr>
    </table>
</div>
</body>
</html>