app.controller("commandeCtrl", function ($scope, $http, myPort) {
    let chem1 = myPort;
    let chem2 = "Controleur/ajout_commande.php";
    $scope.url = chem1.concat(chem2);

    $scope.createOrder = function () {

        let sent = {
            "commande_statut": "en cours",
            "commande_date_livraison": $scope.commande_date_livraison,
            "commande_lieu_livraison": $scope.commande_lieu_livraison,
            "commande_description": $scope.commande_description,
            "commande_contenance": $scope.commande_contenance
        };

        $http.post($scope.url, sent).success(function (response) {

            if (response.message == "true") {

                let chem3 = "Controleur/orderLineModel.php";
                $scope.url1 = chem1.concat(chem3);
                var sent_ligne = {
                    "ligne_produit_id": $scope.id_produit,
                    "ligne_user_id": $scope.user_id,
                    "ligne_quantite": $scope.quantite,
                    "ligne_commande_id": response.commande_id
                }
                $http.post($scope.url1, sent_ligne).success(function (response_ligne) {
                    alert("Commande validée");
                    let chem1 = myPort;
                    let chem2 = "Controleur/affichage_prod.php";
                    window.location.replace(chem1.concat(chem2));
                });
            }
            else {
                alert("Commande non ajoutée. Vérifiez votre saisie");
            }
        });
    }
});