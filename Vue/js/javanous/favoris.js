app.controller("favorisCrl", function ($rootScope, $scope, $http, myPort) {
var id=document.getElementById("user_id").value;
//alert("test ctrl");
    let chem1 = myPort;
    let chem2 = "Web_Services/get_favoris_by_user_id.php";
    $scope.url = chem1.concat(chem2);
$scope.listeFavoris=[];

    $scope.affiche_favoris = function () {
		 if (id == null) {
            id = "%";
        }
        $scope.url += "?favoris_client=" + id;

        $http.get($scope.url).success(function (data) {
            if (data.length > 0) {
				$scope.listeFavoris=data;
            }
            else {
                alert("Aucun favoris.");
            }
        });
    }
	
	    $scope.displayProfile = function () {

        let value1 = event.target.id;
        let chem1 = myPort;
        let chem2 = "Controleur/affiche_profil.php";
        $scope.url = chem1.concat(chem2);
        $scope.url += "?produit_user_id=" + value1;
        window.location.replace($scope.url);
}

});