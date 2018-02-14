<!DOCTYPE html>
<html lang="fr" ng-app="AppModule">
<head>
    <title>Ajouter un produit</title>

    <!-- default css files -->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">
    <link href="css/JiSlider.css" rel="stylesheet"> <!-- banner slider css file -->
    <link href="css/simpleLightbox.css" rel="stylesheet" type="text/css"/><!-- gallery css file -->
    <link rel="stylesheet" href="css/font-awesome.min.css"/><!-- Font awesome css file -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <!-- default css files -->

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
    <script src="../config/app.js"></script>
    <script src="js/javanous/search_dept.js"></script>
    <script src="js/javanous/create_product.js"></script>
    <meta charset="utf-8">
</head>
<?php include "header.html"; ?>
<body ng-app="AppModule">
<div class="container">
    <div ng-controller="formCtrl">
        <h2 class="text-center text-primary">Ajouter produit</h2>
        <hr>
        <form name="createProductForm" class="form-horizontal well form-search">
            <div class="form-group">
                <label for="produit_nom" class="col-sm-2 control-label" style="color: black">Nom du produit</label>
                <div class="col-sm-10">
                    <input ng-model="produit_nom" type="text" class="form-control" id="produit_nom" required>
                </div>
            </div>
            <div class="form-group">
                <label style="color: black" for="produit_description" class="col-sm-2 control-label">Description du
                    produit</label>
                <div class="col-sm-10">
                    <textarea ng-model="produit_description" class="form-control" id="produit_description" rows="3"
                              required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label style="color: black" for="produit_prix" class="col-sm-2 control-label">Prix du produit</label>
                <div class="col-sm-10">
                    <input ng-model="produit_prix" type="number" id="produit_prix" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label style="color: black" for="produit_stock" class="col-sm-2 control-label">Stock</label>
                <div class="col-sm-10">
                    <input ng-model="produit_stock" type="number" id="produit_stock" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <table>
                    <tr>
                        <td>
                            <label style="color: black" for="produit_valeur_unite" class="col-sm-2 control-label">Quantité
                                de chaque
                                lot</label>
                        </td>
                        <td>
                            <input ng-model="produit_valeur_unite" type="number" id="produit_valeur_unite"
                                   placeholder="1, 2..." required>
                        </td>
                        <td>
                            <label style="color: black" for="produit_unite" class="col-sm-2 control-label">Unité du
                                produit</label>
                        </td>
                        <td>
                            <input ng-model="produit_unite" type="text" id="produit_unite"
                                   placeholder="Kg, L, barquette..." required>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-sm-10">
                <?php //Connection avec la BDD.
                $mysqli = mysqli_connect("localhost", "root", "", "Pomme");
                $request0 = mysqli_query($mysqli, "SET CHARACTER SET utf8");
                $request = mysqli_query($mysqli, "SELECT * FROM categorie order by `categorie_nom`");

                ?>
                <label style="color: black" for="produit_categorie_id" class="col-sm-2 control-label">
                    Catégorie du produit
                </label>
                <select style="width:168px" class="form-control" name="produit_categorie_id"
                        ng-model="produit_categorie_id" id="produit_categorie_id">
                    <?php while ($donnees = mysqli_fetch_array($request)) { ?>
                        <option name="produit_cat"
                                value="<?php echo $donnees['categorie_id']; ?>"><?php echo $donnees['categorie_nom']; ?></option>
                    <?php } ?>
                </select>
                <?php mysqli_close($mysqli); //deconnection de mysql ?>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" ng-click="formsubmit(createProductForm.$valid)"
                            ng-disabled="createProductForm.$invalid"
                            class="btn btn-primary">Ajouter
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
<?php include "footer.html"; ?>
</html>