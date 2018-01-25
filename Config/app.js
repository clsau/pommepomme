var app = angular.module('AppModule', ['portApp']);


var portApp = angular.module('portApp', []);
portApp.factory('myPort', function () {
    var myPort = "http://localhost:8888/pommepomme/";
    return myPort;
});
portApp.controller('otherCtrl', function ($scope, myPort) {
    $scope.shared = myPort;
});