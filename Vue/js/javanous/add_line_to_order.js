app.controller("goToAddLineCtrl", function ($scope, $http, myPort) {
    $scope.go_to_add = function (isValid) {
        let chem1 = myPort;
        let chem3 = "Vue/add_product_to_order.php";
        document.cookie = "commandePassee=" + event.target.id + "; domain=;path=/";
        $scope.url1 = chem1.concat(chem3);
        window.location.replace($scope.url1);
    };
});

