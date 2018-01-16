<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <title>Fruit land an Agriculture Category Bootstrap Responsive Website Template | Home :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Fruit land a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>

    <!-- default css files -->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">
    <link href="css/JiSlider.css" rel="stylesheet"> <!-- banner slider css file -->
    <link href="css/simpleLightbox.css" rel="stylesheet" type="text/css"/><!-- gallery css file -->
    <link rel="stylesheet" href="css/font-awesome.min.css"/><!-- Font awesome css file -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <!-- default css files -->

    <!--web font-->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
          rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Cabin:400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext,vietnamese"
          rel="stylesheet">
    <!--//web font-->

</head>

<!-- Body -->
<body>

<!-- header    MENU  -->
<div class="header-bottom">
    <div class="container-fluid">
        <nav class="navbar navbar-default">
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
                    <img src="images/logo_litte.png"/>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                <nav>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.html">ACCUEIL</a></li>
                        <li><a href="inscription.html">INSCRIPTION</a></li>
                        <li><a href="identification.html">IDENTIFICATION</a></li>
                    </ul>
                </nav>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div class="head-search">
            <form action="#" method="post">
                <div class="formborder">
                    <input type="text" placeholder="Search..." name="Search..." required="">
                    <input type="submit" value="">
                </div>
            </form>
        </div>

    </div>
</div>
<!-- //header A REDUIRE  -->


<!-- BASE DE FOND DU MENU -->
<section class="service-w3ls" id="services">
    <h1></h1>
</section>


<!--/about   A SUPRIMER LE ABOUT-->
<div class="about" id="about">
    <div class="container">

        <h3>Votre profil</h3>

    </div>
    <div class="clearfix"></div>
</div>
</div>
<!--//about-->
<?php //Connection avec la BDD.
$mysqli = mysqli_connect("localhost", "root", "", "pomme");
$Pseudo = $_SESSION["pseudo"];
$Requete = mysqli_query($mysqli, "SELECT * FROM users  WHERE login = '" . $Pseudo . "'");
$donnees = mysqli_fetch_array($Requete);
$Requete2 = mysqli_query($mysqli, "SELECT * FROM users, code_postal  WHERE login = '" . $Pseudo . "' AND users.Id_CP = code_postal.id_CP");
$donnees2 = mysqli_fetch_array($Requete2);
?>
<table border="3">
    <tr>
        <td>
            <table>
                <tr>
                    <th id="Titre"><?php echo $donnees['Titre']; ?></th>
                </tr>
                <tr>
                    <td id="Description"><?php echo $donnees['Description']; ?></td>
                </tr>
            </table>
        </td>
        <td>
            <table border="3">
                <tr>
                    <td>Login</td>
                    <td id="login"><?php echo $donnees['login']; ?></td>
                </tr>
                <tr>
                    <td>Nom</td>
                    <td id="Nom"><?php echo $donnees['Nom']; ?></td>
                </tr>
                <tr>
                    <td>Prenom</td>
                    <td id="Prenom"><?php echo $donnees['Prenom']; ?></td>
                </tr>
                <tr>
                    <td>Téléphone</td>
                    <td id="Tel">0<?php echo $donnees['Tel']; ?></td>
                </tr>
                <tr>
                    <td>Mail</td>
                    <td id="mail">0<?php echo $donnees['Mail']; ?></td>
                </tr>
                <tr>
                    <td>Adresse</td>
                    <td id="adresse"><?php echo $donnees['Adresse']; ?></td>
                </tr>
                <tr>
                    <td>Code postal</td>
                    <td id="CP"><?php echo $donnees2['CP']; ?></td>
                </tr>
                <tr>
                    <td>Ville</td>
                    <td id="Ville"><?php echo $donnees2['Nom_commune']; ?></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<br>
<form action="modifier_profil.php" method="post">
    <div align="center">
        <input type="submit" name="modifier" value="modifier"/>
    </div>
</form>
<?php
mysqli_close($mysqli); //deconnection de mysql
?>





<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="col-md-6 footernav">
            <div class="agileits-social">
                <ul>


                    <li><a href="#home" class="scroll">ACCUEIL</a></li>
                    <li><a href="#about" class="scroll">INSCRIPTION</a></li>
                    <li><a href="#services" class="scroll">IDENTIFICATION</a></li>

                </ul>
            </div>
        </div>
        <div class="col-md-6 copyright">
            <p>© 2017 Fruit Land. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
        </div>
    </div>
</div>
<!-- //footer -->
<!--//////////////////////////           FIN -->















<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Fruit land</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div>
                <div class="modal-body">
                    <img src="images/banana.png" alt=" " class="img-responsive" />
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
</script><script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>
<!-- //Banner Slider js script file-->

<!-- required-js-files-->
<link href="css/owl.carousel.css" rel="stylesheet">
<script src="js/owl.carousel.js"></script>
<script>
    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            items : 1,
            lazyLoad : true,
            autoPlay : true,
            navigation : false,
            navigationText :  false,
            pagination : true,
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
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
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
    $(document).ready(function() {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
        */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<!-- //here ends scrolling icon -->
<!-- //Ends scrolling script -->
</body>
<!-- //Body -->
</html>