var app = angular.module('formCreateProduct', []);

app.controller("formCtrl", ['$scope', '$http', function ($scope, $http) {
    $scope.url = 'http://localhost:63342/pommepomme/Controleur/create_product.php';
    $scope.formsubmit = function (isValid) {
        let sent = {
                "produit_nom": $scope.produit_nom,
                "produit_description": $scope.produit_description,
                "produit_prix": $scope.produit_prix,
                "produit_photo": $scope.produit_photo,
                "produit_stock": $scope.produit_stock,
                "produit_valeur_unite": $scope.produit_valeur_unite,
                "produit_unite": $scope.produit_unite,
                "produit_categorie_id": $scope.produit_categorie_id
            };
        $http.post($scope.url, sent).success(function (response) {
            if (response.message == "true") {
                alert("Produit bien ajouté");
                window.location.replace("http://localhost:63342/pommepomme/Vue/display_products.html");
            }
            else {
                alert("produit non ajouté. Vérifiez votre saisie");
            }
        });
        //$scope.orderProp = 'age';
    }
}]);
