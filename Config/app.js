let app = angular.module('AppModule', ['portApp']);


let portApp = angular.module('portApp', []);
portApp.factory('myPort', function () {
    return "http://localhost:8888/pommepomme/";
});
portApp.controller('otherCtrl', function ($scope, myPort) {
    $scope.shared = myPort;
});