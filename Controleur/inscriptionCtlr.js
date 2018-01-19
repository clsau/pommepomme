
app.controller('InscriptionCtrl', function($scope, $http) {
    
	/*
	 $scope.$watch(function(scope) { return scope.data.myVar },
			function(newValue, oldValue) {
				document.getElementById('').innerHTML =
                  
		}
    );	
	
	*/
	
	
	$scope.$watch('item.mail', function(newValue, oldValue){
		$scope.item.verif = false;
	if(newValue === $scope.item.mailconf)
		$scope.item.verif = true;	
	});
	
	$scope.$watch('item.mailconf', function(newValue, oldValue){
		$scope.item.verif = false;
	if(newValue === $scope.item.mail)
		$scope.item.verif = true;	
	});
	
	$scope.item = {};
	
	$scope.myFunc = function() {
       alert($scope.test);
    };
	
	$scope.test ="Initialisation ...";
	//$scope.myFunc();
	
	$scope.init = function(){
		$scope.item.verif = true;
	/*	
		$scope.item.login = "desc";
			$scope.item.pass="desc";
			$scope.item.type= 0;
			$scope.item.nom = "desc";
			$scope.item.prenom = "desc";
			$scope.item.tel = 123456;
			$scope.item.mail="desc@desc";
			$scope.item.mailconf ="desc@desc";
			$scope.item.adresse = "desc"
			$scope.item.ville="desc";
			$scope.item.cp =123;
			$scope.item.titre = "vendeur";
			$scope.item.description ="desc";
	*/
	};
	
	
	$scope.save = function () {
		/*
		var data = {
			"login": "isaac AA",
			"mdp": "miage AA",
			"type": 0,
			"Nom": "Ncho AA",
			"Prenom": "Issac AAA ",
			"Tel": 2626,
			"Mail": "AA@gmail.com",
			"Adresse": "127 COURS",
			"Id_CP": 24470,
			"Titre": "Bon Titre 2",
			"Description": "bon commentaire 2..."
			};
		*/
		var data1 =  {
			"login": $scope.item.login,
			"mdp": $scope.item.pass,
			"type": 1,//$scope.item.type,
			"Nom": $scope.item.nom,
			"Prenom":$scope.item.prenom,
			"Tel": $scope.item.tel,
			"Ville": $scope.item.ville,
			"Mail": $scope.item.mail,
			"Adresse": $scope.item.adresse,
			"Id_CP": $scope.item.cp,
			"Titre": $scope.item.titre,
			"Description": $scope.item.description
        };
		
	
	$http.post('http://localhost:8888/pommepomme/Web_services/create_user.php', data1).then(function (response) {
		if (response)
			$scope.msg = "Inscription réussi avec succès...";
			alert($scope.msg);
		}, function (response) {
			$scope.msg = "Erreur survenue lors de l'inscription...";
			$scope.statusval = response.status;
			$scope.statustext = response.statusText;
			alert($scope.msg);
		});
	};
		
});
