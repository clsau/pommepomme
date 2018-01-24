
app.controller("resultSearch", function ($rootScope, $scope, $http) {

		var listeProd = window.localStorage.getItem("listeProd");

		$scope.listeProducteurs = JSON.parse(listeProd);


	});