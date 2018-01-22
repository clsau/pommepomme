var app = angular.module('formDisplayProduct', []);

app.controller("formDisplayCtrl", function ($scope, $http) {

    $scope.url = 'http://localhost:63342/pommepomme/Controleur/display_product.php';
    $scope.formsubmit = function (isValid) {
//$http.post($scope.url);

        $http.get($scope.url,).success(function (data) {
            //$scope.contents = data;
            //window.alert($scope.contents);

            $scope.products = data;
        });
//$scope.orderProp = 'age';
    }
});