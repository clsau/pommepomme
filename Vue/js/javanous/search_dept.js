app.controller("formSearchCtrl", function ($rootScope, $scope, $http, myPort) {



    $scope.formsubmit = function (value1, value2) {


        if (value1 == "Département") {
            value1 = "%";
        }

        if (value2 == "Produit") {
            value2="%";
        }

        let chem1 = myPort;
        let chem2 = "Controleur/search.php";
        $scope.url = chem1.concat(chem2);
        window.localStorage.setItem("listeProd","") ;

        $scope.url += "?cboDept="+value1;
        $scope.url += "&categorie="+value2;

        $http.get($scope.url).success(function (data) {
            if (data.length > 0 ) {
                window.localStorage.setItem("listeProd", JSON.stringify(data));
                var p = window.localStorage.getItem("listeProd");
                let chem1 = myPort;
                let chem2 = "Controleur/resultat_recherche.php";
                window.location.replace(chem1.concat(chem2));
            }
            else {
                alert("Aucun produit n'a été trouvé selon vos critères de recherche.");
            }
        });
    }
});