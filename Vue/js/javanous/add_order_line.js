app.controller("addLineCtrl", function ($scope, $http, myPort) {
    $scope.addLine = function (isValid) {
        let chem1 = myPort;
        let chem3 = "Controleur/ajout_ligne_commande.php";
        var b = document.cookie.match('(^|;)\\s*' + "commandePassee" + '\\s*=\\s*([^;]+)');
        var id_qte = "qt" + event.target.id;
        var qte = document.getElementById(id_qte).value;
        $scope.url1 = chem1.concat(chem3);
        var sent_ligne = {
            "ligne_id_produit": event.target.id,
            "ligne_quantite": qte,
            "ligne_commande_id": b.pop()
        };
        $http.post($scope.url1, sent_ligne).success(function (response_ligne) {
            if (response_ligne.message == "place") {
                if (confirm('Produit ajouté, voulez-vous ajouter un autre produit ?')) {
                    var chem1 = myPort;
                    var chem2 = "Vue/add_product_to_order.php";
                }
                else {
                    document.cookie = 'commandePassee=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                    var chem1 = myPort;
                    var chem2 = "Controleur/index.php";
                }
            }
            else {
                alert('Produit ajouté !');
                var chem1 = myPort;
                var chem2 = "Controleur/index.php";
            }
            window.location.replace(chem1.concat(chem2));
        });
    };
});

