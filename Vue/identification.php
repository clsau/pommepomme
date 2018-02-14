<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
    <title>Livrer-les-tous</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Livraison de produits agricoles participative"/>

    <!-- default css files -->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">
    <link href="css/simpleLightbox.css" rel="stylesheet" type="text/css"/><!-- gallery css file -->
    <link rel="stylesheet" href="css/font-awesome.min.css"/><!-- Font awesome css file -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <!-- default css files -->

    <!-- incorporation du framework angular, et des javascripts correspondants -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
    <script src="../config/app.js"></script>
    <script src="js/javanous/identificationCtlr.js"></script>
    <script src="js/javanous/search_dept.js"></script>

    <!--web font-->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
          rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Cabin:400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext,vietnamese"
          rel="stylesheet">
    <!--//web font-->

</head>
<?php include "header.html"; ?>


<body ng-app="AppModule" ng-controller="IdentificationCtrl" style="height:100vh;">

<section class="service-w3ls" id="services" style="height: 85%; width: 100%;">
    <h3 class="heading"> Identification </h3>
    <form>
        <div style="margin-left:35%; margin-top:50px;">
            <label>Login :</label>
            <input type="text" name="login" ng-model="item.login"/>
        </div>
        <div style="margin-left:35%;margin-top:10px;">
            <label>Mot de passe :</label>
            <input type="password" name="mdp" ng-model="item.pass"/>
        </div>
        <div align="center" style=" margin-top:10px;">
            <input type="button" class="btn btn-primary" name="connexion" ng-click="connexion()" value="Connexion"/>
        </div>
    </form>
</section>
<?php include "footer.html"; ?>

</body>
</html>