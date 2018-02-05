app.controller("order_lines_ctrl", function ($scope, $http, $window, myPort) {
    let user_id = window.localStorage.getItem("session_user_id");
    let sent = {"ligne_user_id": user_id};
    $scope.listLigneCommandes = [];
    $scope.item = {};
    let chem1 = myPort;
    let chem2 = "Controleur/get_ligne_by_user_id.php";
    $scope.url = chem1.concat(chem2);
    $http.post($scope.url, sent).success(function (data) {
        if (data.length == 0) {
            $scope.item.nodata = true;
        }
        else {
            $scope.item.nodata = false;
            $scope.listLigneCommandes = data;
        }
    });


});