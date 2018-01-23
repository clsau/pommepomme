app.controller('ModificationCtrl', function ($scope, $http) {
    $scope.item = {};
    $scope.myFunc = function () {
        alert($scope.test);
    };
    $scope.test = "Initialisation Traitement modification ...";

    $scope.save = function () {

        let data1 = {
            "type": 1,
            "Tel": $scope.item.tel,
            "Ville": $scope.item.ville,
            "Mail": $scope.item.mail,
            "Adresse": $scope.item.adresse,
            "Id_CP": $scope.item.cp,
            "Titre": $scope.item.titre,
            "Description": $scope.item.description
        };

        $http.post('http://localhost:63342/pommepomme/controleur/update_user.php', data1).success(function (response) {
            if (response.message == "true") {
                alert("Profil bien édité");
            }
            else {
                alert("Profil non modifié. Vérifiez votre saisie");
            }
        });
        //$scope.orderProp = 'age';
    }
});
