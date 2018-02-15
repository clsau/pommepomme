<?php session_start(); ?>
<!-- fichier permetant l'affichage du profil d'un producteur et de ses produit cette page est accesible apres une recherche ou a partir des favoris  -->

<!DOCTYPE html>
<html lang="en">
<!-- Head -->
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

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
    <script src="../config/app.js"></script>

    <script src="js/javanous/search_dept.js"></script>
    <script src="js/javanous/affiche_profilCtrl.js"></script>



</head>
<?php include "header.html"; ?>


<body ng-app="AppModule" ng-controller="SearchProfile">


<section class="service-w3ls" id="services" style="margin-top:5px;">
    <?php
        $id_profil = $_GET['produit_user_id'];
        $_SESSION['profil'] = $id_profil;
        $mysqli = mysqli_connect("localhost", "root", "", "pomme");
        mysqli_set_charset($mysqli, "utf8");
        $Requete2 = mysqli_query($mysqli, "SELECT * FROM users,code_postal WHERE user_id='" . $id_profil . "' AND users.user_code_postal_id = code_postal.code_postal_id ");
        $donnees2 = mysqli_fetch_array($Requete2);
        $Requete3 = mysqli_query($mysqli, "SELECT * FROM produit WHERE produit_user_id='" . $id_profil . "'  ");
        //$donnees3 = mysqli_fetch_array($Requete3);
        if (isset($_SESSION['msg'])) {
            if ($_SESSION['msg'] != NULL) {
                ?>
                <h2 style='text-align : center;'><?php echo $_SESSION['msg'];
                        $_SESSION['msg'] = NULL; ?></h2>
                <?php
            }
        }
    ?>
    <br>

    <table border="3" align="center" width="75%" style="background-color: #546E7A">
        <tr>
            <td>
                <table align="center">
                    <tr align="center">
                        <th id="Titre" valign="top"><?php
                                if ($donnees2['user_type'] == 1)
                                    echo $donnees2['user_titre']; ?></th>
                    </tr>
                    <tr align="center">
                        <td id="Description"><?php
                                if ($donnees2['user_type'] == 1)
                                    echo $donnees2['user_description']; ?></td>
                    </tr>
                </table>
            </td>
            <td align="right" width="20%">
                <table border="3" style="background-color: #455A64">
                    <tr>
                        <td>Login</td>
                        <td id="login"><?php echo $donnees2['user_login']; ?></td>
                    </tr>
                    <tr>
                        <td>Nom</td>
                        <td id="Nom"><?php echo $donnees2['user_nom']; ?></td>
                    </tr>
                    <tr>
                        <td>Prenom</td>
                        <td id="Prenom"><?php echo $donnees2['user_prenom']; ?></td>
                    </tr>
                    <tr>
                        <td>Téléphone</td>
                        <td id="Tel">0<?php echo $donnees2['user_tel']; ?></td>
                    </tr>
                    <tr>
                        <td>Mail</td>
                        <td id="mail">0<?php echo $donnees2['user_mail']; ?></td>
                    </tr>
                    <tr>
                        <td>Adresse</td>
                        <td id="adresse"><?php echo $donnees2['user_adresse']; ?></td>
                    </tr>
                    <tr>
                        <td>Code postal</td>
                        <td id="CP"><?php echo $donnees2['user_code_postal_id']; ?></td>
                    </tr>
                    <tr>
                        <td>Ville</td>
                        <td id="Ville"><?php echo $donnees2['code_postal_commune']; ?></td>
                    </tr>
                    <tr>

                        <td COLSPAN=2>
                            <form action="../Controleur/insert_favoris.php">
                                <input class="btn btn-primary" type="submit" name="Favoris" value="Favoris"/>
                            </form>

                        </td>
                    </tr>


                </table>
            </td>
        </tr>
        <tr>

            <table style="background-color: #455A64">
                <tr>
                    <td>Photo</td>
                    <td>Nom</td>
                    <td>Decription</td>
                    <td>Prix</td>
                    <td>Stock</td>
                    <td>Unité</td>
                    <td></td>
                </tr>

                <?php while ($donnees3 = mysqli_fetch_array($Requete3)) { ?>

                    <tr>
                        <td><img style="width:75px; height:75px" src="../images_prod/uploads/<?php echo $donnees3['produit_photo']; ?>"/></td>

                        <td id="Produit" valign="top"><?php
                                echo $donnees3['produit_nom']; ?></td>

                        <td id="Description"><?php
                                echo $donnees3['produit_description']; ?></td>

                        <td id="Prix" valign="top"><?php
                                echo $donnees3['produit_prix']; ?></td>

                        <td id="Stock" valign="top"><?php
                                echo $donnees3['produit_stock']; ?></td>

                        <td id="Unite" valign="top"><?php
                                echo $donnees3['produit_valeur_unite'];
                                echo $donnees3['produit_unite']; ?></td>

                        <td>
                            <?php if (isset($_SESSION['pseudo'])) { ?>
                                <form>
                                    <button id=<?php echo $donnees3['produit_id']; ?> type="submit" data-ng-click="commande($e)"
                                            class="btn btn-primary">Commander
                                    </button>
                                </form>
                            <?php } else { ?>
                                <a href="identification.php">
                                    <input type="button" value="Se connecter pour Commander" class="btn btn-primary">
                                </a>
                            <?php } ?>

                        </td>
                    </tr>
                <?php } ?>
            </table>

        </tr>
    </table>
</section>
<!-- //header A REDUIRE  -->


<!--  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->


<!--//about-->


<!-- services section -->
<section class="service-w3ls" id="services" style="margin-top:5px;">


    <div style="margin-top:0;background-color: #A1D067;">
    </div>
    <?php include "footer.html"; ?>


    <!-- footer 
    <div class="footer">
        <div class="container" style="margin-top:5px;">
            <div class="col-md-6 footernav">
                <div class="agileits-social">
                    <ul>
                        <a href="inscription.php"
                           class="scroll"><?php if (!isset($_SESSION['pseudo'])) echo "S'inscrire"; ?></a>
                    </ul>
                    <ul>
                        <a href="../Vue/identification.php"
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
        </div>-->
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