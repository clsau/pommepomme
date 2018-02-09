let app = angular.module('AppModule', ['portApp']);


let portApp = angular.module('portApp', []);
portApp.factory('myPort', function () {
    return "http://localhost/pommepomme/";
});
portApp.controller('otherCtrl', function ($scope, myPort) {
    $scope.shared = myPort;
});