<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<!-- Head -->
<head>
    <title>Livrer les tous</title>
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
    <script src="../Vue/js/javanous/search_dept.js"></script>
</head>

<!-- Body -->
<body ng-app="AppModule" >
<!-- header    MENU  -->
<div class="container-fluid">
    <nav class="navbar navbar-default" style=" height: 150px">
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
            <nav >
                <ul class="nav navbar-nav" >
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
                                <select name="cboDept" ng-model="item.cboDept">
                                <option value="" selected> Département</option>
                                <?php while($donnees = mysqli_fetch_array($request)){?>

                                <option name="departement" value="<?php echo $donnees['departement_id']; ?>"><?php echo $donnees['departement_nom']; ?></option>
                                <?php }?>

                                </select>


                                <select name="categorie" ng-model="item.categorie" hint="Produit" >
                                <option value="" selected> Produit</option>
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


<!-- //header A REDUIRE  -->


<!--  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->


<!--//about-->


<!-- services section -->
<section class="service-w3ls" id="services" >
    <div class="container">
        <h3 class="heading"> Pourquoi aller sur livrer-les-tous ? </h3>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 serv-w3layouts">
            <div class="ch-grid slideanim">
                <div>
                    <div class="ch-item ch-img-1">
                        <div class="ch-info">
                            <h3>Conserver vos produits</h3>
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="slideanim"> Voir les producteurs près de chez vous </h5>


        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 serv-w3layouts">
            <div class="ch-grid slideanim">
                <div>
                    <div class="ch-item ch-img-2">
                        <div class="ch-info">
                            <h3>Affordable prices</h3>
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="slideanim"> Acheter directement chez le producteur </h5>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 serv-w3layouts">
            <div class="ch-grid slideanim">
                <div>
                    <div class="ch-item ch-img-3">
                        <div class="ch-info">
                            <h3>Seasonal Fruits</h3>
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="slideanim"> Manger des produits de qualité </h5>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 serv-w3layouts">
            <div class="ch-grid slideanim">
                <div>
                    <div class="ch-item ch-img-4">
                        <div class="ch-info">
                            <h3>Unseasonal Fruits</h3>
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="slideanim"> Soutenir l'agriculture locale </h5>
            <div class="clearfix"></div>
        </div>
    </div>
</section>

<div style="margin-top:0px;background-color: #A1D067;">
</div>


<!-- footer -->
<div class="footer">
    <div class="container" style="margin-top:5px;">
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

<!-- bootstrap-pop-up -->
<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Fruit land</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div>
                <div class="modal-body">
                    <img src="../Vue/images/banana.png" alt=" " class="img-responsive"/>
                    <p>Ut enim ad minima veniam, quis nostrum
                        exercitationem ullam corporis suscipit laboriosam,
                        nisi ut aliquid ex ea commodi consequatur? Quis autem
                        vel eum iure reprehenderit qui in ea voluptate velit
                        e.
                        <i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit
                            esse quam nihil molestiae consequatur.</i></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //bootstrap-pop-up -->

<!-- Default-JavaScript-File -->
<script type="text/javascript" src="../Vue/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../Vue/js/bootstrap.js"></script>
<!-- //Default-JavaScript-File -->

<!-- Banner Slider js script file-->
<script src="../Vue/js/JiSlider.js"></script>
<script>
    $(window).load(function () {
        $('#JiSlider').JiSlider({color: '#fff', start: 3, reverse: false}).addClass('ff')
    })
</script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

</script>
<!-- //Banner Slider js script file-->

<!-- required-js-files-->
<link href="../Vue/css/owl.carousel.css" rel="stylesheet">
<script src="../Vue/js/owl.carousel.js"></script>
<script>
    $(document).ready(function () {
        $("#owl-demo").owlCarousel({
            items: 1,
            lazyLoad: true,
            autoPlay: true,
            navigation: false,
            navigationText: false,
            pagination: true,
        });
    });
</script>
<!--//required-js-files-->

<!-- Light box js-file-->
<script src="../Vue/js/simpleLightbox.js"></script>
<script>
    $('.w3layouts_gallery_grid a').simpleLightbox();
</script>
<!-- //Light box js-file-->

<!-- clients js file-->
<script src="../Vue/js/jquery.wmuSlider.js"></script>
<script>
    $('.example1').wmuSlider();
</script>
<!-- //clients js file -->

<!-- scrolling script -->
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
    });
</script>
<!-- //scrolling script -->

<!-- Stars scrolling script -->
<script src="../Vue/js/SmoothScroll.min.js"></script>
<script type="text/javascript" src="../Vue/js/move-top.js"></script>
<script type="text/javascript" src="../Vue/js/easing.js"></script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function () {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
        */

        $().UItoTop({easingType: 'easeOutQuart'});

    });
</script>
<!-- //here ends scrolling icon -->
<!-- //Ends scrolling script -->

</body>
<!-- //Body -->
</html>