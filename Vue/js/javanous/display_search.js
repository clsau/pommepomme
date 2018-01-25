app.controller("resultSearch", function ($rootScope, $scope) {

		var listeProd = window.localStorage.getItem("listeProd");

		$scope.listeProducteurs = JSON.parse(listeProd);


	});