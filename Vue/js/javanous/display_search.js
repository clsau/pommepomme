app.controller("resultSearch", function ($rootScope, $scope, myPort, $window) {

		var listeProd = window.localStorage.getItem("listeProd");

		$scope.listeProducteurs = JSON.parse(listeProd);

    $scope.displayProfile = function () {

        let value1 = event.target.id;
        let chem1 = myPort;
        let chem2 = "Controleur/affiche_profil.php";
        $scope.url = chem1.concat(chem2);
        $scope.url += "?produit_user_id=" + value1;
        window.location.replace($scope.url);
    };

    $scope.commande = function () {

        let value1 = event.target.id;
        let chem1 = myPort;
        let chem2 = "Controleur/commande.php";
        $scope.url = chem1.concat(chem2);
        $scope.url += "?produit_id=" + value1;
        window.location.replace($scope.url);
    };

});