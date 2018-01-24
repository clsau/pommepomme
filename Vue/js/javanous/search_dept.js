

app.controller("formSearchCtrl", function ($rootScope, $scope, $http) {


    $scope.formsubmit = function (value) {

        $scope.url = 'http://localhost:8888/pommepomme/Controleur/search.php';
        window.localStorage.setItem("listeProd","") ; 

    	var sent = {
         	"cboDept": value
    	};
        $scope.url += "?cboDept="+value;

	 	$http.get($scope.url).success(function (data) {
            if (data.length > 0 ) {
                window.localStorage.setItem("listeProd", JSON.stringify(data));
                var p = window.localStorage.getItem("listeProd");
                window.location.replace("http://localhost:8888/pommepomme/Controleur/resultat_recherche.php");
            }
            else {
                alert("Pas de producteur trouvé dans ce département");
            }
        });
    }
});