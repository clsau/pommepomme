app.controller("SearchProfile", function ($rootScope, $scope, $http, myPort) {

    let chem1 = myPort;
    let chem2 = "Controleur/earchProfile.php";
    $scope.url = chem1.concat(chem2);
    window.localStorage.setItem("listeProd", "");

    $scope.commande = function () {
        let value1 = event.target.id;
        let chem1 = myPort;
        let chem2 = "Vue/commande.php";
        $scope.url = chem1.concat(chem2);
        $scope.url += "?produit_id=" + value1;
        window.location.replace($scope.url);
    };
    $scope.formsubmit = function (value1, value2) {


        if (value1 == null) {
            value1 = "%";
        }

        if (value2 == null) {
            value2 = "%";
        }


        $scope.url += "?cboDept=" + value1;
        $scope.url += "&categorie=" + value2;

        $http.get($scope.url).success(function (data) {
            if (data.length > 0) {
                window.localStorage.setItem("listeProd", JSON.stringify(data));
                var p = window.localStorage.getItem("listeProd");
                let chem1 = myPort;
                let chem2 = "Vue/resultat_recherche.php";
                window.location.replace(chem1.concat(chem2));
            }
            else {
                alert("Aucun produit n'a été trouvé selon vos critères de recherche.");
            }
        });
    }
});