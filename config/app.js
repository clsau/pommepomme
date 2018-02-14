//Fichier permettant de gerer la difference des ports
// changer le port ligne 10 selon le port de votre odinateur


let app = angular.module('AppModule', ['portApp']);


let portApp = angular.module('portApp', []);
portApp.factory('myPort', function () {
    return "http://localhost:8888/pommepomme/";
});
portApp.controller('otherCtrl', function ($scope, myPort) {
    $scope.shared = myPort;
});