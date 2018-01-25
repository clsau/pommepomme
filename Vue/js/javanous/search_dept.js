

app.controller("formSearchCtrl", function ($rootScope, $scope, $http) {


    $scope.formsubmit = function (value1, value2) {

        if(value1==null){
            value1 = "%";
        }

        if(value2==null){
            value2="%";
        }


        $scope.url = 'http://localhost:8888/pommepomme/Controleur/search.php';
        window.localStorage.setItem("listeProd","") ; 

        /*var sent = {
            "cboDept": value
        };*/
        $scope.url += "?cboDept="+value1;
        $scope.url += "&categorie="+value2;

        $http.get($scope.url).success(function (data) {
            if (data.length > 0 ) {
                window.localStorage.setItem("listeProd", JSON.stringify(data));
                var p = window.localStorage.getItem("listeProd");
                window.location.replace("http://localhost:8888/pommepomme/Controleur/resultat_recherche.php");
            }
            else {
                alert("Aucun produit n'a été trouvé selon vos critères de recherche.");
            }
        });
    }
});