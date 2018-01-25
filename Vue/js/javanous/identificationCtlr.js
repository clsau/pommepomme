app.controller('IdentificationCtrl', function ($rootScope, $scope, $http, myPort) {
    let chem1 = myPort;
    let chem2 = "Controleur/identification_user.php";
    $scope.url = chem1.concat(chem2);
    $scope.init = function () {
        $rootScope.item = {};
        $scope.item = {};
    };
    $scope.init();
    $scope.connexion = function () {
        var data = {
            "login": $scope.item.login,
            "mdp": $scope.item.pass
        };
        let chem1 = myPort;
        let chem2 = "Controleur/identification_user.php";
        let url = chem1.concat(chem2);
        $http({
            method: 'POST',
            url: url,
            dataType: 'json',
            data: data,
            headers: {'Content-Type': 'application/json; charset=UTF-8'}
        }).success(function (reponse) {
            $rootScope.user = reponse;
            let chem1 = myPort;
            let chem2 = "Controleur/index.php";
            window.location.replace(chem1.concat(chem2));

        }).error(function (reponse) {
            alert(data);
        });


    };


});
