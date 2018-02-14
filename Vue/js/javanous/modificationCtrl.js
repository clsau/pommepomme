app.controller('ModificationCtrl', function ($scope, $http, myPort) {

    $scope.save = function () {
        if (document.getElementById('titre')) {
            var data1 = {
                "Tel": document.getElementById("telephone").value,
                "Mail": document.getElementById("courriel").value,
                "Adresse": document.getElementById("adresse").value,
                "Titre": document.getElementById("titre").value,
                "Description": document.getElementById("description").value,
                "Nom": document.getElementById("nom").value,
                "Prenom": document.getElementById("prenom").value
            };
        }
        else {
            var data1 = {
                "Tel": document.getElementById("telephone").value,
                "Mail": document.getElementById("courriel").value,
                "Adresse": document.getElementById("adresse").value,
                "Titre": null,
                "Description": null,
                "Nom": document.getElementById("nom").value,
                "Prenom": document.getElementById("prenom").value

            };
        }
        let chem1 = myPort;
        let chem2 = "Controleur/update_user.php";
        let url = chem1.concat(chem2);
        $http.post(url, data1).success(function (response) {
            if (response == "true") {
                alert("Profil bien édité");
                let chem1 = myPort;
                let chem2 = "Controleur/affichage_prod.php";
                window.location.replace(chem1.concat(chem2));
            }
            else {
                alert("Profil non modifié. Vérifiez votre saisie");
            }
        });
    }
});
