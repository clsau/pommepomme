<!DOCTYPE html>
<html lang="en">

<!-- HEAD paramètres de base -->
<head>
    <!-- paramètres de base responsive design -->
    <title>Livrer-les-tous</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Livrer-les-tous"/>
    <!-- paramètres de base responsive design -->

    <!-- default css files -->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">
    <link href="css/JiSlider.css" rel="stylesheet"> <!-- banner slider css file -->
    <link href="css/simpleLightbox.css" rel="stylesheet" type="text/css"/><!-- gallery css file -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <!-- default css files -->

    <!-- incorporation du framework angular, et des javascripts correspondants -->

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="../config/app.js"></script>
    <script src="js/javanous/inscriptionCtlr.js"></script>
    <script src="js/javanous/search_dept.js"></script>
    <script type="text/javascript">
        function rechercher() {
            var codePostal = document.getElementById('CP').value;
            $.ajax({
                type: "POST",
                url: "some.php",
                data: {codePostal: codePostal}, // je passe la variable JS
                success: function (msg) { // je récupère la réponse dans la variable msg
                    $('#Ville').empty();
                    $('#Ville').append(msg);
                }
            });
        }


    </script>
    <!-- incorporation du framework angular, et des javascripts correspondants -->

    <!--web font-->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
          rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Cabin:400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext,vietnamese"
          rel="stylesheet">
    <!--//web font-->

</head>
<!-- HEAD paramètres de base -->

<!-- BODY -->
<body ng-app="AppModule" ng-controller="InscriptionCtrl">

<?php include('header.html'); ?>

<!-- services section -->

<section class="service-w3ls" id="services" style="margin-top:5px;" ng-init="init()">

    <h3 class="heading"> Inscription </h3>
    <script type="text/javascript">
        function yesnoCheck() {
            if (document.getElementById('prodCheck').checked) {
                document.getElementById('ifYes').style.display = 'block';
            }
            else document.getElementById('ifYes').style.display = 'none';
        }
    </script>
    <div class="inscriptionForm">
        <form>

            <div>
                <label class="switch">
                    <input class="switch-input" type="checkbox" id="prodCheck" onclick="yesnoCheck();">
                    <span class="slider round"><span class="on">Producteur</span>
                        <span class="off">Utilisateur</span></span>
                </label>
            </div>
            <br/><br/><br/><br/>
            <div>
                <label>Login :</label>
                <input type="text" id="login" ng-model="item.login" required/><br/><br/>
            </div>
            <div>
                <label>Mot de passe :</label>
                <input type="password" id="mdp" ng-model="item.pass" required/><br/><br/>
            </div>
            <div>
                <label>Nom :</label>
                <input type="text" id="nom" ng-model="item.nom" required/><br/><br/>
            </div>
            <div>
                <label>Prénom :</label>
                <input type="text" id="prenom" ng-model="item.prenom" required/><br/><br/>
            </div>
            <div>
                <label>Adresse mail :</label>
                <input type="email" id="mail" ng-model="item.mail" required/><br/><br/>
            </div>
            <div>
                <label>Confirmer l'adresse mail :</label>
                <input type="email" id="mailconf" ng-model="item.mailconf" required/><br/><br/>
                <div ng-if="!item.verif" style="color:red; font-size=10px;">verifier la saisie de votre mail</div>
            </div>
            <div>
                <label>Adresse postale :</label>
                <input type="text" id="adresse" ng-model="item.adresse" required/><br/><br/>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Entrez votre code postal">
                <label>Code Postal</label>

                <input class="input100" type="text" id="CP" required maxlength="5" placeholder="Code Postal"
                       onkeyup="rechercher()"><br/><br/>
                <span class="focus-input100"></span>
                <p id="text"></p>
            </div>


            <div class="wrap-input100 validate-input" id="ville" data-validate="Entrez votre ville">
                <label>Ville</label>

                <select style="width:162px" class="input100" type="text" id="Ville" required>

                </select><br/><br/>

            </div>


            <div>
                <label>Numéro de téléphone :</label>
                <input type="tel" id="Tel" ng-model="item.tel" required/><br/><br/>
            </div>
            <div style="display:none" id='ifYes'>
                <div>
                    <label>Titre de votre profil producteur :</label>
                    <input type="text" ng-model="item.titre"/><br/><br/>
                </div>
                <div>
                    <label>Description de votre entreprise :</label>
                    <textarea ng-model="item.description"></textarea><br/><br/>
                </div>
            </div>
            <div style="text-align: center;">
                <button ng-click="save()">Inscription</button>
            </div>
        </form>
    </div>


</section>

<!-- services section -->

<?php include "footer.html"; ?>

<script type="text/javascript" language="JavaScript">
    function ChargerRequete() {
        var dept = document.getElementById("ListeDept").value;
        text = "<\?php $request = mysqli_query($mysqli, \"SELECT * FROM code_postal where code_postal_departement_id = " + dept + " order by `code_postal_commune`\"); <\?php ";
        document.getElementById("calqueVille").innerHTML = text;
    }
</script>

</body>
<!-- //Body -->
</html>