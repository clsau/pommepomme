app.controller("formSearchCtrl", function ($rootScope, $scope, $http, myPort) {


<<<<<<< HEAD
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
=======
    $scope.formsubmit = function (value) {
        let chem1 = myPort;
        let chem2 = "Controleur/search.php";
        $scope.url = chem1.concat(chem2);
        window.localStorage.setItem("listeProd","") ;

        //let sent = {
        //	"cboDept": value
        //};
        $scope.url += "?cboDept="+value;
>>>>>>> 90ea0420bec29e62246cd8149cdf50426798d533

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