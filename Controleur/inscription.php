<!--
    Author: W3layouts
    Author URL: http://w3layouts.com
    License: Creative Commons Attribution 3.0 Unported
    License URL: http://creativecommons.org/licenses/by/3.0/
-->

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
    <link rel="stylesheet" href="../Vue/css/bootstrap.css" type="text/css" media="all">
    <link href="../Vue/css/JiSlider.css" rel="stylesheet"> <!-- banner slider css file -->
    <link href="../Vue/css/simpleLightbox.css" rel="stylesheet" type="text/css"/><!-- gallery css file -->
    <link rel="stylesheet" href="../Vue/css/style.css" type="text/css" media="all">
    <!-- default css files -->

    <!-- incorporation du framework angular, et des javascripts correspondants -->

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
    <script src="../Config/app.js"></script>
    <script src="inscriptionCtlr.js"></script>
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

<!-- header    MENU  -->
<div class="container-fluid">
    <nav class="navbar navbar-default" style=" height: 50px color:#000000">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" style="background-color:orange" >
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
            <div class="logo">
                <a href="index.php"><img src="../Vue/images/logo_litte.png" alt="LOGO"/></a>
            </div>
        </div>

        <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
            <nav >
                <ul class="nav navbar-nav" >
                    <li>
                        <a href="index.php"><?php if (!isset($_SESSION['pseudo'])) echo "Home"; ?></a>
                    </li>
                    <li>
                        <a href="../Vue/identification.html"><?php if (!isset($_SESSION['pseudo'])) echo "Se connecter"; ?></a>
                    </li>
                    <li><a href="affichage_prod.php"><?php if (isset($_SESSION['pseudo'])) echo "Profil"; ?></a>
                    </li>
                    <li>
                        <a href="deconnexion.php"><?php if (isset($_SESSION['pseudo'])) echo "Se deconnecter"; ?></a>
                    </li>
                 </form>
                </ul>
            </nav>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</div>
</body>

<!-- //header A REDUIRE  -->


<!-- services section -->

<section class="service-w3ls" id="services" style="margin-top:5px;" ng-init="init()" >

    <h3 class="heading"> Inscription </h3>

<div class="inscriptionForm">
    <form>
        <div>
            <label>Login :</label>
            <input type="text" id="login" ng-model="item.login" required/><br/><br/>
        </div>
         <div>
            <label>Mot de passe :</label>
            <input type="password" id="mdp" ng-model="item.pass" required/><br/><br/>
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
            <div ng-if="!item.verif" style="color:red; font-size="10px;">verifier la saisie de votre mail</div>
        </div>
        <div>
            <label>Adresse postale :</label>
            <input type="text" id="adresse" ng-model="item.adresse" required/><br/><br/>
        </div>
        <div>
            <label>Code postal :</label>
            <input type="number" id="CP" ng-model="item.cp" required maxlength="5"/><br/><br/>
        </div>
        <div>
            <label>Ville :</label>
            <input type="text" id="Ville" ng-model="item.ville" required/><br/><br/>
        </div>
        <div>
            <label>Numéro de téléphone :</label>
            <input type="tel" id="Tel" ng-model="item.tel" required/><br/><br/>
        </div>
        <div>
            <label>Titre de votre profil producteur :</label>
            <input type="text" id="Titre" ng-model="item.titre" /><br/><br/>
        </div>
        <div>
            <label>Description de votre entreprise :</label>
            <textarea id="Description" ng-model="item.description"></textarea><br/><br/>
        </div>
        <div>
            <center>
            <button  ng-click="save()">Inscription</button>
            </center>
        </div>
    </form>
</div>


</section>

<!-- services section -->


<!-- footer -->
<div class="footer" style="margin-top:1px;">
    <div class="container" style="margin-top:1px;">
        <div class="col-md-6 footernav">
            <div class="agileits-social">
                <ul>
                    <a href="inscription.php"
                       class="scroll"><?php if (!isset($_SESSION['pseudo'])) echo "S'inscrire"; ?></a>
                </ul>
                <ul>
                    <a href="../Vue/identification.html"
                       class="scroll"><?php if (!isset($_SESSION['pseudo'])) echo "Se connecter"; ?></a>
                </ul>
                <ul><a href="affichage_prod.php"
                       class="scroll"><?php if (isset($_SESSION['pseudo'])) echo "Profil"; ?></a>
                </ul>
                <ul>
                    <a href="deconnexion.php"
                       class="scroll"><?php if (isset($_SESSION['pseudo'])) echo "Se deconnecter"; ?></a>
                </ul>
            </div>
        </div>
        <div class="col-md-6 footernav">
            <div class="agileits-social">
                <ul><a href="#home" class="scroll">MENTIONS LEGALES</a></ul>
            </div>
        </div>
        <div class="col-md-6 footernav">
            <div class="agileits-social">
                <ul><a href="#home" class="scroll">CONTACTS</a></ul>
            </div>
        </div>
    </div>
</div>
<!-- //footer -->
<!--//////////////////////////           FIN -->


</body>
<!-- //Body -->
</html>