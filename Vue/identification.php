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
    <script src="../Config/app.js"></script>
    <script src="js/javanous/identificationCtlr.js"></script>
    <script src="js/javanous/search_dept.js"></script>

    <!--web font-->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
          rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Cabin:400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext,vietnamese"
          rel="stylesheet">
    <!--//web font-->

</head>
<?php include "../Controleur/header.html";?>


<body ng-app="AppModule" ng-controller="IdentificationCtrl" style="height:100vh;">
<!-- header    MENU 

<div class="container-fluid" style="height= 20%;">
    <nav class="navbar navbar-default" style="color:#000000; height: 100px">
        <!-- Brand and toggle get grouped for better mobile display 
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" style="background-color: #c4e3f3">Menu
            </button>
            <div class="logo" id="LeLogo">
                <a href="../Controleur/index.php"><img src="images/logo_litte.png" alt="LOGO"/></a>
            </div>
        </div>

        <div class="collapse navbar-collapse nav-wil" ng-controller="formSearchCtrl" id="bs-example-navbar-collapse-1">
            <nav>
                <ul class="nav navbar-nav">
                    <li>
                        <a href="../Controleur/inscription.php">S'inscrire</a>
                    </li>
                    <li style="margin-top:15px;">
                        <?php //Connection avec la BDD.
                        $mysqli = mysqli_connect("localhost", "root", "", "Pomme");
                        $request = mysqli_query($mysqli, "SELECT * FROM departement");
                        $request1 = mysqli_query($mysqli, "SELECT * FROM categorie");
                        ?>

                        <form name="SearchForm">
                            <select name="cboDept" ng-model="item.cboDept">
                                <option value="" selected> Département</option>
                                <?php while ($donnees = mysqli_fetch_array($request)) { ?>

                                    <option name="departement"
                                            value="<?php echo $donnees['departement_id']; ?>"><?php echo $donnees['departement_nom']; ?></option>
                                <?php } ?>
                            </select>
                            <select name="categorie" ng-model="item.categorie" hint="Produit">
                                <option value="" selected> Produit</option>
                                <?php while ($donnees = mysqli_fetch_array($request1)) { ?>
                                    <option name="categorie"
                                            value="<?php echo $donnees['categorie_id']; ?>"><?php echo $donnees['categorie_nom']; ?></option>
                                <?php } ?>
                            </select>
                            <?php
                            mysqli_close($mysqli); //deconnection de mysql ?>
                    </li>
                    <li style="margin-top:15px;margin-left:10px;">
                        <button type="button" ng-click="formsubmit(item.cboDept,item.categorie)"
                                ng-disabled="SearchForm.$invalid" class="btn btn-primary">Recherche
                        </button>
                    </li>
                    </form>
                </ul>
            </nav>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</div>
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
<?php include "../Controleur/footer.html";?>

<!--
<div class="footer" style="height= 0%;">
    <div class="container" style="margin-top:1px;">
        <div class="col-md-6 footernav">
            <div class="agileits-social">
                <ul><a href="../Controleur/index.php" class="scroll">Accueil</a></ul>
                <ul><a href="../Controleur/inscription.php" class="scroll">S'inscrire</a></ul>
            </div>
        </div>
        <div class="col-md-6 footernav">
            <div class="agileits-social">
                <ul><a href="../Controleur/index.php" class="scroll">Mentions légales</a></ul>
            </div>
        </div>
        <div class="col-md-6 footernav">
            <div class="agileits-social">
                <ul><a href="../Controleur/index.php" class="scroll">Contact</a></ul>
            </div>
        </div>
    </div>
</div>
-->
</body>
</html>