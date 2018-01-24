//var app = angular.module('formUpdateProduct', []);

app.controller("formDisplayCtrl", function ($scope, $http) {
    $scope.update = function (isValid) {
//$http.post($scope.url);
        console.log('hey');
        console.log(this.id);
        /*$http.get($scope.url,).success(function (data) {
            //$scope.contents = data;
            //window.alert($scope.contents);

        });*/
    }
});