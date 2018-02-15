<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
    <title>Livrer-les-tous</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Fruit land a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>

    <!-- default css files -->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">
    <link href="css/simpleLightbox.css" rel="stylesheet" type="text/css"/><!-- gallery css file -->
    <link rel="stylesheet" href="css/font-awesome.min.css"/><!-- Font awesome css file -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/page.css" type="text/css" media="all">
    <!-- default css files -->

    <!-- incorporation du framework angular, et des javascripts correspondants -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
    <script src="../Config/app.js"></script>
    <script src="js/javanous/identificationCtlr.js"></script>


    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
          rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Cabin:400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext,vietnamese"
          rel="stylesheet">


</head>

<body>
<div class="container-fluid">
    <nav class="navbar navbar-default" style=" height: 50px color:#000000">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" style="background-color: #c4e3f3">Menu
            </button>
            <div class="logo">
                <h1><a class="navbar-brand" href="index.php"><img src="../Vue/images/logo_litte.png" alt="LOGO"/></a>
                </h1>
            </div>
        </div>

        <div class="collapse navbar-collapse nav-wil" ng-controller="formSearchCtrl" id="bs-example-navbar-collapse-1">
            <nav>
                <ul class="nav navbar-nav">
                    <li>
                        <a href="inscription.php"><?php if (!isset($_SESSION['pseudo'])) echo "S'inscrire"; ?></a>
                    </li>
                    <li>
                        <a href="../Vue/identification.php"><?php if (!isset($_SESSION['pseudo'])) echo "Se connecter"; ?></a>
                    </li>
                    <li><a href="affichage_prod.php"><?php if (isset($_SESSION['pseudo'])) echo "Profil"; ?></a>
                    </li>
                    <li>
                        <a href="deconnexion.php"><?php if (isset($_SESSION['pseudo'])) echo "Se deconnecter"; ?></a>
                    </li>

                    <li style="margin-top:15px;">
                        <?php //Connection avec la BDD.
                        $mysqli = mysqli_connect("localhost", "root", "", "Pomme");
                        mysqli_set_charset($mysqli, "utf8");
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

</body>

<div style="border-style:ridge;margin-top:2%;margin-left:10%;width:80%;height:400px;">
    <h2 style="color:black;margin-top:5%;margin-left:35%;">Modifiez votre mot de passe</h2>
    <section ng-init="init()" style="margin-top:8%;margin-left:30%;">


        <form id="recup" action="../Controleur/recuperation.php" method="post" style="margin-top:50px;">
            <!--<form id="recup">-->

            <p>
                <label> Saisissez votre mail :</label>


                <input type="text" id="mail" name="mail" ng-model="item.mail" required/><br/><br/>

                <input style="border:none;padding:6px 0 6px 0;border-radius:2px; box-shadow:2px 2px 5px #aaa;background:#A9B096;font:bold 13px Arial;color:#555; color:black; height:35px;width:23%;margin-left:250px;"
                       type="submit" name="send_mail" value="Envoyer" id="buton"/>
            </p>

        </form>

    </section>
</div>

<div style="margin-top:8%;width:99; height:200px;background-color:#ECDAC3;">
    <div style="margin-top:10px;width:70; height:200px;">
        <div class="col-md-6 footernav">
            <div class="agileits-social" style="color:black;">
                <ul>
                    <a href="inscription.php"
                       class="scroll"
                       style="color:black;"><?php if (!isset($_SESSION['pseudo'])) echo "S'inscrire"; ?></a>
                </ul>
                <ul>
                    <a href="../Vue/identification.php"
                       class="scroll"
                       style="color:black;"><?php if (!isset($_SESSION['pseudo'])) echo "Se connecter"; ?></a>
                </ul>
                <ul>
                    <a href="#" style="color:black;">
                        <li> produits</li>
                    </a>
                </ul>
                <ul>
                </ul>
            </div>
        </div>
        <div class="col-md-6 footernav">
            <div class="agileits-social">
                <ul><a href="index.php" class="scroll" style="color:black;">Mentions légales</a></ul>
            </div>
        </div>
        <div class="col-md-6 footernav">
            <div class="agileits-social">
                <ul><a href="index.php" class="scroll" style="color:black;">Contact</a></ul>
            </div>
        </div>
    </div>
</div>


