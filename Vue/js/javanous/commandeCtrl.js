app.controller("commandeCtrl", function ($scope, $http, myPort) {
    let chem1 = myPort;
    let chem2 = "Controleur/ajout_commande.php";
    $scope.url = chem1.concat(chem2);
    $scope.createOrder = function () {
        if (document.getElementsByClassName("switch-input")[0].checked ? 'yes' : 'no' == "yes") {
            var sent = {
                "commande_statut": "Ouverte",
                "commande_date_livraison": $scope.commande_date_livraison,
                "commande_lieu_livraison": $scope.commande_lieu_livraison,
                "commande_description": $scope.commande_description,
                "commande_contenance": $scope.commande_contenance
            };
        }
        else {
            $cont = 0;
            var sent = {
                "commande_statut": "Fermée",
                "commande_date_livraison": $scope.commande_date_recup,
                "commande_contenance": $cont
            };
        }
        $http.post($scope.url, sent).success(function (response) {
            if (response.message == "true") {
                let chem3 = "Controleur/ajout_ligne_commande.php";
                $scope.url1 = chem1.concat(chem3);
                if ($scope.quantite == null)
                    $scope.quantite = 1;
                var sent_ligne = {
                    "ligne_quantite": $scope.quantite,
                    "ligne_commande_id": response.id,
                    'ligne_id_produit': response.produit
                };
                $http.post($scope.url1, sent_ligne).success(function (response_ligne) {
                    if (confirm('Commande validée, voulez-vous ajouter un autre produit ?')) {
                        document.cookie = "commandePassee=" + response.id + "; domain=;path=/";
                        var chem1 = myPort;
                        var chem2 = "Vue/add_product_to_order.php";
                    }
                    else {
                        var chem1 = myPort;
                        var chem2 = "Controleur/index.php";
                    }
                    window.location.replace(chem1.concat(chem2));
                });
            }
            else {
                alert("Commande non ajoutée. Vérifiez votre saisie");
            }
        });
    }
})
;