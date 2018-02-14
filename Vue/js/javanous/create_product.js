app.controller("formCtrl", function ($scope, $http, myPort) {
    let chem1 = myPort;
    let chem2 = "Controleur/create_product.php";
    $scope.url = chem1.concat(chem2);
    $scope.formsubmit = function (isValid) {

        let sent = {
                "produit_nom": $scope.produit_nom,
                "produit_description": $scope.produit_description,
                "produit_prix": $scope.produit_prix,
                "produit_stock": $scope.produit_stock,
                "produit_valeur_unite": $scope.produit_valeur_unite,
                "produit_unite": $scope.produit_unite,
                "produit_categorie_id": $scope.produit_categorie_id
            };
        $http.post($scope.url, sent).success(function (response) {
            if (response == null) {
                alert("produit non ajouté. Vérifiez votre saisie");
            }
            else {
                if (confirm('Produit bien ajouté ! Voulez-vous ajouter une photo de ce produit ?')) {
                    $scope.produit_id = response;
                    let chem1 = myPort;
                    let chem2 = "Vue/add_picture_from_order.php";
                    window.location.replace(chem1.concat(chem2));
                } else {

                    let chem1 = myPort;
                    let chem2 = "Vue/display_products.php";
                    window.location.replace(chem1.concat(chem2));
                }
            }
        });
    }
});
