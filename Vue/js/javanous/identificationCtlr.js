app.controller('IdentificationCtrl', function ($rootScope, $scope, $http) {
    $scope.url = 'http://localhost/pommepomme/Controleur/identification_user.php';
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
        $http({
            method: 'POST',
            url: 'http://localhost:63342/pommepomme/Controleur/identification_user.php',
            dataType: 'json',
            data: data,
            headers: {'Content-Type': 'application/json; charset=UTF-8'}
        }).success(function (reponse) {
            $rootScope.user = reponse;
            //alert($rootScope.user.user_prenom);
            window.location.replace("http://localhost:63342/pommepomme/Controleur/index.php");

        }).error(function (reponse) {
            alert(data);
        });


    };


});
