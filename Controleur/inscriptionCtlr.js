app.controller('InscriptionCtrl', function ($scope, $http, myPort) {

    $scope.$watch('item.mail', function (newValue, oldValue) {
        $scope.item.verif = false;
        if (newValue === $scope.item.mailconf)
            $scope.item.verif = true;
    });

    $scope.$watch('item.mailconf', function (newValue, oldValue) {
        $scope.item.verif = false;
        if (newValue === $scope.item.mail)
            $scope.item.verif = true;
    });

    $scope.item = {};

    $scope.myFunc = function () {
        alert($scope.test);
    };


    $scope.test = "Initialisation ...";


    $scope.init = function () {
        $scope.item.verif = true;
    };

    $scope.save = function () {
        var codePostal_id = document.getElementById('Ville').value;
        if (document.getElementsByClassName("switch-input")[0].checked ? 'yes' : 'no' == "yes") {
            $type = 1;
            var data1 = {
                "login": $scope.item.login,
                "mdp": $scope.item.pass,
                "type": $type,
                "Nom": $scope.item.nom,
                "Prenom": $scope.item.prenom,
                "Tel": $scope.item.tel,
                "Mail": $scope.item.mail,
                "Adresse": $scope.item.adresse,
                "Id_CP": codePostal_id,
                "Titre": $scope.item.titre,
                "Description": $scope.item.description
            };
        }
        else {
            $type = 0;
            var data1 = {
                "login": $scope.item.login,
                "mdp": $scope.item.pass,
                "type": $type,
                "Nom": $scope.item.nom,
                "Prenom": $scope.item.prenom,
                "Tel": $scope.item.tel,
                "Mail": $scope.item.mail,
                "Adresse": $scope.item.adresse,
                "Id_CP": codePostal_id,
            };
        }
        let chem1 = myPort;
        let chem2 = "Controleur/create_user.php";
        $scope.url = chem1.concat(chem2);
        $http.post($scope.url, data1).success(function (response) {
            if (response == "true") {
                alert("Inscription réussie");
                let chem1 = myPort;
                let chem2 = "Controleur/index.php";
                window.location.replace(chem1.concat(chem2));
            }
            else {
                if (response.message == "double") { // else if message == "double"
                    alert("pseudo déjà utilisé");
                } else
                alert("Problème d'inscription");

            }
        });
    };
});
