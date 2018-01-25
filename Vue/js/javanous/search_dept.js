app.controller("formSearchCtrl", function ($rootScope, $scope, $http, myPort) {


    $scope.formsubmit = function (value) {
        let chem1 = myPort;
        let chem2 = "Controleur/search.php";
        $scope.url = chem1.concat(chem2);
        window.localStorage.setItem("listeProd","") ;

        //let sent = {
        //	"cboDept": value
        //};
        $scope.url += "?cboDept="+value;

	 	$http.get($scope.url).success(function (data) {
            if (data.length > 0 ) {
                window.localStorage.setItem("listeProd", JSON.stringify(data));
                var p = window.localStorage.getItem("listeProd");
                let chem1 = myPort;
                let chem2 = "Controleur/resultat_recherche.php";
                window.location.replace(chem1.concat(chem2));
            }
            else {
                alert("Pas de producteur trouvé dans ce département");
            }
        });
    }
});