app.controller('ModificationCtrl', function ($scope, $http, myPort) {
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
