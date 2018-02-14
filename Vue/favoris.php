<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
    <title>Vos favoris</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">

    <!-- default css files -->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">
    <link href="css/JiSlider.css" rel="stylesheet"> <!-- banner slider css file -->
    <link href="css/simpleLightbox.css" rel="stylesheet" type="text/css"/><!-- gallery css file -->
    <link rel="stylesheet" href="css/font-awesome.min.css"/><!-- Font awesome css file -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <!-- default css files -->


    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
    <script src="../config/app.js"></script>
    <script src="js/javanous/favoris.js"></script>

</head>
<?php include "header.html"; ?>

<body ng-app="AppModule" ng-controller="favorisCrl">
<section class="service-w3ls" id="services" style="margin-top:5px;">

    <br>

    <input type="hidden" id="user_id" value="<?php echo $_SESSION['id']; ?>">

    <table border="3" align="center" width="75%" style="background-color: #546E7A" ng-init="affiche_favoris()">
        <CAPTION>Favoris</CAPTION>
        <tr>
            <TH> Nom du producteur</TH>
            <TH> Titre</TH>
            <TH> Ville</TH>
            <TH> Boutton</TH>
        </tr>
        <TR ng-repeat="item in listeFavoris">
            <TD> {{item.Nom}} {{item.Prenom}}</TD>
            <TD>{{item.Titre}}</TD>
            <TD>{{item.Commune}}</TD>
            <TD>
                <button id="<?php echo $_SESSION['id']; ?>" type="submit" data-ng-click="displayProfile($event)"
                        class="btn btn-primary">Profil
                </button>

            </TD>
        </TR>

    </table>
</section>
<!-- //header A REDUIRE  <input type="test" ng-model="user_id" id="user_id" value="1"> -->

<!--  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->


<!--//about-->


<!-- services section -->
<section class="service-w3ls" id="services" style="margin-top:5px;">


    <div style="margin-top:0;background-color: #A1D067;">
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
                        <a href="identification.php"
                           class="scroll"><?php if (!isset($_SESSION['pseudo'])) echo "Se connecter"; ?></a>
                    </ul>
                    <ul><a href="affichage_prod.php"
                           class="scroll"><?php if (isset($_SESSION['pseudo'])) echo "Profil"; ?></a>
                    </ul>
                    <ul>
                        <a href="../Controleur/deconnexion.php"
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
</section>
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
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- //Default-JavaScript-File -->

<!-- Banner Slider js script file-->
<script src="js/JiSlider.js"></script>
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
<link href="css/owl.carousel.css" rel="stylesheet">
<script src="js/owl.carousel.js"></script>
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
<script src="js/simpleLightbox.js"></script>
<script>
    $('.w3layouts_gallery_grid a').simpleLightbox();
</script>
<!-- //Light box js-file-->

<!-- clients js file-->
<script src="js/jquery.wmuSlider.js"></script>
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
<script src="js/SmoothScroll.min.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
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