<!--
    Author: W3layouts
    Author URL: http://w3layouts.com
    License: Creative Commons Attribution 3.0 Unported
    License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
    <link rel="stylesheet" href="../Vue/css/bootstrap.css" type="text/css" media="all">
    <link href="../Vue/css/JiSlider.css" rel="stylesheet"> <!-- banner slider css file -->
    <link href="../Vue/css/simpleLightbox.css" rel="stylesheet" type="text/css"/><!-- gallery css file -->
    <link rel="stylesheet" href="../Vue/fonts/font-awesome.min.css"/><!-- Font awesome css file -->
    <link rel="stylesheet" href="../Vue/css/style.css" type="text/css" media="all">
    <!-- default css files -->

    <script src="../angular-1.6.6/angular.min.js"></script>
    <script src="../Config/app.js"></script>
    <script src="inscriptionCtlr.js"></script>

    <!--web font-->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
          rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Cabin:400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext,vietnamese"
          rel="stylesheet">
    <!--//web font-->


</head>

<!-- Body -->
<body ng-app="AppModule" ng-controller="InscriptionCtrl">
<!-- header    MENU  -->

<div class="container-fluid">
    <nav class="navbar navbar-default" style="background-color: #FFFFFF; height: 100px">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

            <div class="logo" id="LeLogo">
                <a href="index.php"><img src="../Vue/images/logo_litte.png" alt="LOGO"/></a>
            </div>
        </div>

        <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
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
                    <li style="margin-top:15px;"><select name="departement" size="1">
                            <option value="departement" selected>Departement</option>
                            <option value="33">Gironde - 33</option>
                            <option value="17">Charente-Maritime - 17</option>
                            <option value="16">Charente -16</option>
                            <option value="40">Landes - 40</option>
                        </select>
                    </li>
                    <li style="margin-top:15px;margin-left:10px;"><input type='submit'
                                                                         value='Rechercher des producteurs'
                                                                         align="center">
                    </li>
                </ul>
            </nav>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</div>

</body>


<!-- services section -->

<section class="service-w3ls" id="services" style="margin-top:5px;" ng-init="init()" >
    <h3 class="heading"> Inscription </h3>
    <form>
        <div>
            <label>login :</label>
            <input type="text" id="login" ng-model="item.login" required/>
        </div>
         <div>
            <label>Mot de passe :</label>
            <input type="password" id="mdp" ng-model="item.pass" required/>
        <div>
            <label>Nom :</label>
            <input type="text" id="nom" ng-model="item.nom" required/>
        </div>
        <div>
            <label>Prénom :</label>
            <input type="text" id="prenom" ng-model="item.prenom" required/>
        </div>
        <div>
            <label>Adresse mail :</label>
            <input type="email" id="mail" ng-model="item.mail" required/>
        </div>
        <div>
            <label>Confirmer l'adresse mail :</label>
            <input type="email" id="mailconf" ng-model="item.mailconf" required/>
            <div ng-if="!item.verif" style="color:red; font-size="10px;">verifier la saisie de votre mail</div>
        </div>
        <div>
            <label>Adresse postale :</label>
            <input type="text" id="adresse" ng-model="item.adresse" required/>
        </div>
        <div>
            <label>Code postal :</label>
            <input type="number" id="CP" ng-model="item.cp" required maxlength="5"/>
            <label>Ville :</label>
            <input type="text" id="Ville" ng-model="item.ville" required/>
        </div>
        <div>
            <label>Numéro de téléphone :</label>
            <input type="tel" id="Tel" ng-model="item.tel" required/>
        </div>
        <div>
            <label>Titre de votre profil producteur :</label>
            <input type="text" id="Titre" ng-model="item.titre" />
        </div>
        <div>
            <label>Description de votre entreprise :</label>
            <input type="text" id="Description" ng-model="item.Description"/>
        </div>
        <div>
            <button  ng-click="save()">Inscription</button>
        </div>

    </form>
</section>


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


<!-- bootstrap-pop-up -->
<!--

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
                    <img src="images/banana.png" alt=" " class="img-responsive"/>
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
<!--
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
<!-- //Default-JavaScript-File -->

<!-- Banner Slider js script file-->
<!--
<script src="../js/JiSlider.js"></script>
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
<!--
<link href="../css/owl.carousel.css" rel="stylesheet">
<script src="../js/owl.carousel.js"></script>
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
<!--
<script src="../js/simpleLightbox.js"></script>
<script>
    $('.w3layouts_gallery_grid a').simpleLightbox();
</script>
<!-- //Light box js-file-->

<!-- clients js file-->
<!--
<script src="../js/jquery.wmuSlider.js"></script>
<script>
    $('.example1').wmuSlider();
</script>
<!-- //clients js file -->

<!-- scrolling script -->
<!--
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
<!--
<script src="../js/SmoothScroll.min.js"></script>
<script type="text/javascript" src="../js/move-top.js"></script>
<script type="text/javascript" src="../js/easing.js"></script>
<!-- here stars scrolling icon -->
<!--
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