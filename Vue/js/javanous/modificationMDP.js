app.controller('modificationMDP', function ($scope, $http, myPort) {
    $scope.item = {};
    $scope.myFunc = function () {
        alert($scope.test);
    };
    $scope.test = "Modification mot de passe ...";

    $scope.save = function () {

        let data1 = {
            "login": $scope.item.login,
            "mdp": $scope.item.mdp,
        };
        let chem1 = myPort;
        let chem2 = "Controleur/modificationMDP.php";
        let url = chem1.concat(chem2);
        $http.post(url, data1).success(function (response) {
            if (response == "true") {
                alert("Votre mot de passe a été modifié");
                let chem1 = myPort;
                let chem2 = "Vue/identification.php";
                window.location.replace(chem1.concat(chem2));
            }
            else {
                alert("Mdp non modifié");
            }
        });
        //$scope.orderProp = 'age';
    }
});
