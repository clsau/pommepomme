<?php session_start(); ?>
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
    <link rel="stylesheet" href="../Vue/css/bootstrap.css" type="text/css" media="all">
    <link href="../Vue/css/JiSlider.css" rel="stylesheet"> <!-- banner slider css file -->
    <link href="../Vue/css/simpleLightbox.css" rel="stylesheet" type="text/css"/><!-- gallery css file -->
    <link rel="stylesheet" href="../Vue/css/font-awesome.min.css"/><!-- Font awesome css file -->
    <link rel="stylesheet" href="../Vue/css/style.css" type="text/css" media="all">
    <!-- default css files -->

</head>

<!-- Body -->
<body>

<!-- header    MENU  

<div class="container-fluid">
    <nav class="navbar navbar-default" style="background-color: #FFFFFF; height: 100px">
        <!-- Brand and toggle get grouped for better mobile display 
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="logo">
                <img src="../Vue/images/logo_litte.png"/>
            </div>
        </div>

        <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
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
                        $request = mysqli_query($mysqli, "SELECT * FROM departement"); ?>
                        <form method="GET" action="recherche.php">
                            <select title="Choix du département" name="cboDept">
                                <?php while ($donnees = mysqli_fetch_array($request)) { ?>
                                    <option name="departement"
                                            value="<?php echo $donnees['departement_id']; ?>"><?php echo $donnees['departement_nom']; ?></option>
                                <?php } ?>
                            </select>
                            <?php
                            mysqli_close($mysqli); //deconnection de mysql
                            ?>
							
                    </li>
                    <li style="margin-top:15px;margin-left:10px;"><input type='submit' name='recherche'
                                                                         value='Rechercher' align="center"></li>
                    </form>
                </ul>
            </nav>
        </div>
        <!-- /.navbar-collapse -->
		<?php include "header2.html";?>

    </nav>
</div>
</body>


<!-- //header A REDUIRE  -->


<!--  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->


<!--//about-->


<!-- services section -->
<section class="service-w3ls" id="services" style="margin-top:5px;">
    <!--//about-->
    <?php //Connection avec la BDD.
    $mysqli = mysqli_connect("localhost", "root", "", "pomme");
    $Pseudo = $_SESSION["pseudo"];
    $Requete = mysqli_query($mysqli, "SELECT * FROM users  WHERE user_login = '" . $Pseudo . "'");
    $donnees = mysqli_fetch_array($Requete);
    $Requete2 = mysqli_query($mysqli, "SELECT * FROM users, code_postal  WHERE user_login = '" . $Pseudo . "' AND users.user_code_postal_id = code_postal.code_postal_id");
    $donnees2 = mysqli_fetch_array($Requete2);
    ?>
    <table border="3" align="center" width="75%" style="background-color: #546E7A">
        <tr>
            <td>
                <table align="center">
                    <tr align="center">
                        <th id="Titre" valign="top"><?php
						$_SESSION['titre']=$donnees['user_titre'];
                            if ($donnees['user_type'] == 1)
                                echo $donnees['user_titre']; ?></th>
                    </tr>
                    <tr align="center">
                        <td id="Description"><?php
						$_SESSION['description']=$donnees['user_description'];
                            if ($donnees['user_type'] == 1)
                                echo $donnees['user_description']; ?></td>
                    </tr>
                </table>
            </td>
			<input id="user_id"   type="hidden" value='.$donnees['user_id']'></td>
            <td align="right" width="20%">
                <table border="3" style="background-color: #455A64">
                    <tr>
                        <td>Login</td>
                        <td id="login"><?php echo $donnees['user_login']; ?></td>
                    </tr>
                    <tr>
                        <td>Nom</td>
                        <td id="Nom"><?php echo $donnees['user_nom']; ?></td>
                    </tr>
                    <tr>
                        <td>Prenom</td>
                        <td id="Prenom"><?php echo $donnees['user_prenom']; ?></td>
                    </tr>
                    <tr>
                        <td>Téléphone</td>
						<?php $_SESSION['tel']=$donnees['user_tel']; ?>
                        <td id="Tel">0<?php echo $donnees['user_tel']; ?></td>
                    </tr>
                    <tr>
                        <td>Mail</td>
						<?php $_SESSION['mail']=$donnees['user_mail']; ?>
                        <td id="mail"><?php echo $donnees['user_mail']; ?></td>
                    </tr>
                    <tr>
                        <td>Adresse</td>
						<?php $_SESSION['adresse']=$donnees['user_adresse']; ?>
                        <td id="adresse"><?php echo $_SESSION['adresse']; ?></td>
                    </tr>
                    <tr>
                        <td>Code postal</td>
						<?php $_SESSION['cp']=$donnees2['code_postal_id']; ?>
                        <td id="CP"><?php echo $_SESSION['cp']; ?></td>
                    </tr>
                    <tr>
                        <td>Ville</td>
						
                        <td id="Ville"><?php echo $donnees2['code_postal_commune']; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <form action="modification.php" method="post">
        <div align="center">
            <input type="submit" name="modifier" value="modifier"/>
        </div>
    </form>
    <form action="../Vue/display_products.php" method="post">
        <div align="center">
            <input type="submit" name="DisplayProduct" value="Gérer ses  produits"/>
        </div>
    </form>
	    <form action="../Vue/display_order_lines.html" method="post">
        <div align="center">
            <input type="submit" name="DisplayProduct" value="voir mes commandes"/>
        </div>

    </form>	
	
	    </form>
    <form action="favoris.php" method="post">
        <div align="center">
            <input type="submit" name="" value="Favoris"/>
        </div>
    </form>
</section>

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
    </div>
</div>-->
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

</body>
<!-- //Body -->
</html>