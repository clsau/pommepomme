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

        var data1 = {
            "login": $scope.item.login,
            "mdp": $scope.item.pass,
            "type": 1,//$scope.item.type,
            "Nom": $scope.item.nom,
            "Prenom": $scope.item.prenom,
            "Tel": $scope.item.tel,
            "Ville": $scope.item.ville,
            "Mail": $scope.item.mail,
            "Adresse": $scope.item.adresse,
            "Id_CP": $scope.item.cp,
            "Titre": $scope.item.titre,
            "Description": $scope.item.description
        };

        let chem1 = myPort;
        let chem2 = "Controleur/create_user.php";
        $scope.url = chem1.concat(chem2);
        $http.post($scope.url, data1).then(function (response) {
            if (response)
                $scope.msg = "Inscription réussie avec succès...";
            alert($scope.msg);
        }, function (response) {
            $scope.msg = "Erreur survenue lors de l'inscription...";
            $scope.statusval = response.status;
            $scope.statustext = response.statusText;
            alert($scope.msg);
        });
    };

});
