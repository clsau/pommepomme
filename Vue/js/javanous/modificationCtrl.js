app.controller('ModificationCtrl', function ($scope, $http, myPort) {
    $scope.item = {};
    $scope.myFunc = function () {
        alert($scope.test);
    };
    $scope.test = "Initialisation Traitement modification ...";
	
	$scope.save = function () {
$scope.user_nom = document.getElementById("nom").value;
	$scope.user_prenom = document.getElementById("prenom").value;
	$scope.user_mail = document.getElementById("courriel").value;
	$scope.user_tel = document.getElementById("telephone").value;
	$scope.user_adresse = document.getElementById("adresse").value;
	$scope.user_code_postal_id = document.getElementById("Ville").value;
	$scope.user_titre	= document.getElementById("titre").value;
	$scope.user_description = document.getElementById("description").value;
	//$scope.user_mail = document.getElementById("courriel").value;
	//alert(document.getElementById("adresse").value);

        let data1 = {
			"Nom" : $scope.user_nom,
			"Prenom" : $scope.user_prenom,
            "Tel": $scope.user_tel,
            "Mail": $scope.user_mail,
            "Adresse": $scope.user_adresse,
            "Id_CP": $scope.user_code_postal_id,
            "Titre": $scope.user_titre,
            "Description": $scope.user_description
        };
        let chem1 = myPort;
        let chem2 = "Controleur/update_user.php";
        let url = chem1.concat(chem2);
        $http.post(url, data1).success(function (response) {
            if (response.message == "true") {
                alert("Profil bien édité");
                let chem1 = myPort;
                let chem2 = "Controleur/affichage_prod.php";
                window.location.replace(chem1.concat(chem2));
            }
            else {
                alert("Profil non modifié. Vérifiez votre saisie");
            }
        });
        //$scope.orderProp = 'age';
    }
});
