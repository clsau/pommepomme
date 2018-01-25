app.controller("formDisplayCtrl", function ($scope, $http, $window, myPort) {
    $scope.displayProduct = function () {
        let chem1 = myPort;
        let chem2 = "Controleur/display_product.php";
        $scope.url = chem1.concat(chem2);
        let sent = {"produit_id": "null"};
        $http.post($scope.url, sent).success(function (data) {
            $scope.show = false;
            $scope.products = data;
        });
    };
    $scope.update = function () {
        let chem1 = myPort;
        let chem2 = "Controleur/display_product.php";
        $scope.url = chem1.concat(chem2);
        let sent = {
            "produit_id": event.target.id
        };
        $http.post($scope.url, sent).success(function (data) {
            $scope.modif = data;
            $scope.produit_nom = $scope.modif[0].produit_nom;
            $scope.produit_description = $scope.modif[0].produit_description;
            $scope.produit_photo = $scope.modif[0].produit_photo;
            $scope.produit_prix = $scope.modif[0].produit_prix;

            $scope.produit_stock = $scope.modif[0].produit_stock;
            $scope.produit_valeur_unite = $scope.modif[0].produit_valeur_unite;
            $scope.produit_unite = $scope.modif[0].produit_unite;
            $scope.produit_categorie_id = $scope.modif[0].produit_categorie_id;
            $scope.produit_id = $scope.modif[0].produit_id;
            $scope.show = true;
            $window.scrollTo(0, 0);
        });
    };
    $scope.sup = function () {
        let chem1 = myPort;
        let chem2 = "Controleur/sup_product.php";
        $scope.url = chem1.concat(chem2);
        if (confirm('Êtes vous sûr(e) de vouloir supprimer ce produit ?')) {
            let sent = {"produit_id": event.target.id};
            $http.post($scope.url, sent).success(function (data) {
                alert("Produit supprimé !");
                $scope.displayProduct();
            });
        }
    };

    $scope.validate = function () {
        let chem1 = myPort;
        let chem2 = "Controleur/update_product.php";
        $scope.url = chem1.concat(chem2);
        let sent = {
            "produit_nom": $scope.produit_nom,
            "produit_description": $scope.produit_description,
            "produit_prix": $scope.produit_prix,
            "produit_photo": $scope.produit_photo,
            "produit_stock": $scope.produit_stock,
            "produit_valeur_unite": $scope.produit_valeur_unite,
            "produit_unite": $scope.produit_unite,
            "produit_categorie_id": $scope.produit_categorie_id,
            "produit_id": $scope.produit_id
        };
        $http.post($scope.url, sent).success(function (data) {
            alert("Produit modifié !");
            $scope.displayProduct();

        });
    };
});
