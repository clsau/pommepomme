<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<!-- Head -->
<head>

    <title>Résultat de recherche</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="livrer-les-tous"/>

    <!-- default css files -->
    <link rel="stylesheet" href="../Vue/css/bootstrap.css" type="text/css" media="all">
    <link href="../Vue/css/JiSlider.css" rel="stylesheet"> <!-- banner slider css file -->
    <link href="../Vue/css/simpleLightbox.css" rel="stylesheet" type="text/css"/><!-- gallery css file -->
    <link rel="stylesheet" href="../Vue/css/font-awesome.min.css"/><!-- Font awesome css file -->
    <link rel="stylesheet" href="../Vue/css/style.css" type="text/css" media="all">
    <!-- default css files -->

    <!--web font-->
    <link href="../Vue/fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
          rel="stylesheet">
    <link href="../Vue/fonts.googleapis.com/css?family=Cabin:400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext,vietnamese"
          rel="stylesheet">
    <!--//web font-->

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
    <script src="../Config/app.js"></script>
    <script src="../Vue/js/javanous/display_search.js"></script>
    <script src="../Vue/js/javanous/search_dept.js"></script>


</head>
<!-- Body -->
<body ng-app="AppModule" ng-controller="resultSearch" >

<!-- header    MENU  -->

<div class="container-fluid">
    <nav class="navbar navbar-default" style="background-color: #FFFFFF; height: 0px">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
            <div class="logo">
                <a href="index.php"><img src="../Vue/images/logo_litte.png" alt="LOGO"/></a>
            </div>
        </div>

        <div class="collapse navbar-collapse nav-wil" ng-controller="formSearchCtrl" id="bs-example-navbar-collapse-1">
            <nav>
                <ul class="nav navbar-nav">
                    <li>
                        <a href="inscription.php"><?php if (!isset($_SESSION['pseudo'])) echo "S'inscrire"; ?></a>
                    </li>
                    <li>
                        <a href="../Vue/identification.html"><?php if (!isset($_SESSION['pseudo'])) echo "Se connecter"; ?></a>
                    </li>
                    <li><a href="affichage_prod.php"><?php if (isset($_SESSION['pseudo'])) echo "Profil"; ?></a>
                    </li>
                    <li>
                        <a href="deconnexion.php"><?php if (isset($_SESSION['pseudo'])) echo "Se deconnecter"; ?></a>
                    </li>
                     <li style="margin-top:15px;">  
                            <?php //Connection avec la BDD.
                            $mysqli = mysqli_connect("localhost", "root", "", "Pomme");
                            $request = mysqli_query($mysqli, "SELECT * FROM departement");
                            $request1 = mysqli_query($mysqli, "SELECT * FROM categorie");
                            ?>

                            <form name = "SearchForm">
                                <select name="cboDept" ng-model="item.cboDept" >
                                <?php while($donnees = mysqli_fetch_array($request)){?>
                                <option name="departement" value="<?php echo $donnees['departement_id']; ?>"><?php echo $donnees['departement_nom']; ?></option>
                                <?php }?>
                                </select>


                                <select name="categorie" ng-model="item.categorie" >
                                <?php while($donnees = mysqli_fetch_array($request1)){?>
                                <option name="categorie" value="<?php echo $donnees['categorie_id']; ?>"><?php echo $donnees['categorie_nom']; ?></option>
                                <?php }?>
                                </select>
                            <?php
                        mysqli_close($mysqli); //deconnection de mysql ?>
                        </li>
                        <li style="margin-top:15px;margin-left:10px;"> 
                         <button type="button" ng-click="formsubmit(item.cboDept,item.categorie)" ng-disabled="SearchForm.$invalid" class="btn btn-primary">Recherche
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





<!-- Fin du header -->

<!--  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->


<!--//about-->


<!-- services section -->
<section class="service-w3ls" id="services" style="margin-top:0px;">

<!--Fin du header -->

    <table>
    <tr>
        
       <th>Nom</th>
       <th>Prenom</th>
       <th>CP</th>
       <th>Commune</th>
       <th>Produit</th>
       <th>Prix</th>
       
    </tr> 

    <tr ng-repeat="i in listeProducteurs" >
       <td> {{i.Nom}} </td>
       <td> {{i.Prenom}} </td>
       <td> {{i.CP}} </td>
       <td> {{i.Commune}} </td>
       <td> {{i.Produit}} </td>
       <td> {{i.Prix}} </td>
    </tr>
    
    </table>

</section>

<!-- footer -->
<div class="footer" style="margin-top:0px;">
    <div class="container" style="margin-top:100px;">
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