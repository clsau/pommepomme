<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<!-- Head -->
<head>

    <title>Fruit land an Agriculture Category Bootstrap Responsive Website Template | Home :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Fruit land a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>

    <script src="../Config/app.js"></script>
    <script src="../Vue/js/javanous/modificationCtrl.js"></script>
    <script src="../Vue/0000js/javanous/modificationCtrl.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- default css files -->
    <link rel="stylesheet" href="../Vue/css/bootstrap.css" type="text/css" media="all">
    <link href="../Vue/css/JiSlider.css" rel="stylesheet"> <!-- banner slider css file -->
    <link href="../Vue/css/simpleLightbox.css" rel="stylesheet" type="text/css"/><!-- gallery css file -->
    <link rel="stylesheet" href="../Vue/css/font-awesome.min.css"/><!-- Font awesome css file -->
    <link rel="stylesheet" href="../Vue/css/style.css" type="text/css" media="all">
    <!-- default css files -->

    <!--web font-->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
          rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Cabin:400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext,vietnamese"
          rel="stylesheet">
    <!--//web font-->
	<script type="text/javascript">
      function rechercher(){
        var codePostal = document.getElementById('CP').value;
        $.ajax({
          type: "POST",
          url: "some.php",
          data: {codePostal: codePostal}, // je passe la variable JS
          success: function(msg){ // je récupère la réponse dans la variable msg
            $('#Ville').empty();
            $('#Ville').append(msg);
          }
        });
      }
	   
	  
    </script>


</head>

<?php include "header.html";?>

<header>
<body ng-app="AppModule" ng-controller="ModificationCtrl">

<!-- header    MENU  
<div class="container-fluid">
    <nav class="navbar navbar-default" style=" height: 50px; color:#000000">-->
        <!-- Brand and toggle get grouped for better mobile display 
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" style="background-color:orange" >
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
            <div class="logo">
                <a href="../Controleur/index.php"><img src="images/logo_litte.png" alt="LOGO"/></a>
            </div>
        </div>

        <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
            <nav >
                <ul class="nav navbar-nav" >
                    <li>
                        <a href="../Controleur/index.php">Home</a>
                    </li>
                    <li>
                        <a href="../Controleur/affichage_prod.php">Profil</a>
                    </li>
                    <li>
                        <a href="../Controleur/deconnexion.php">Se déconnecter</a>
                    </li>
                 </form>
                </ul>
            </nav>
        </div>-->
        <!-- /.navbar-collapse
    </nav>
</div>
 -->
<!-- //header A REDUIRE  -->
<?php
    $mysqli = mysqli_connect("localhost", "root", "", "pomme");
    $Pseudo = $_SESSION["pseudo"];
    $Requete = mysqli_query($mysqli, "SELECT * FROM users  WHERE user_login = '" . $Pseudo . "'");
    $donnees = mysqli_fetch_array($Requete);
?>

<!-- BASE DE FOND DU MENU -->
<section class="service-w3ls" id="services">
    <h1>Modification des données personnelles</h1>
    <br></br>

    <div >
    <section class="modificationUser" id="modificationUser" ng-init="init()">
        <form>
            <fieldset>
                <div>
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" value="<?php echo $donnees['user_nom']; ?>"/><br/><br/>
                </div>
                <div>
                    <label for="courriel">Prenom :</label>
                    <input type="text" id="prenom" value="<?php echo $donnees['user_prenom'] ?>"/><br/><br/>
                </div>
                <div>
                    <label for="courriel">Mail :</label>
                    <input type="email" id="courriel" value="<?php echo $donnees['user_mail']?>" /><br/><br/>
                </div>
                <div>
                    <label for="telephone">Telephone :</label>
                    <input type="text" id="telephone" value="<?php echo $donnees['user_tel'] ?>" /><br/><br/>
                </div>
                <div>
                    <label for="adresse">Adresse :</label>
                    <input type="text" id="adresse" value="<?php echo $donnees['user_adresse']?>"/><br/><br/>
                </div>
				<div class="wrap-input100 validate-input" data-validate = "Entrez votre code postal">
			                <label>Code Postal</label>

                            <input class="input100" type="text" id="CP" required maxlength="5" placeholder="Code Postal" onkeyup="rechercher()"><br/><br/>
                            <span class="focus-input100"></span>
                            <p id="text"></p>
                        </div>
						        

                        <div class="wrap-input100 validate-input" id="ville" data-validate = "Entrez votre ville">
						                <label>Ville</label>

                            <select style="width:162px" class="input100" type="text" id="Ville" required>
							
                            </select><br/><br/>

                        </div>
                <script type="text/javascript">document.cookie = "prodOnly=2";</script>
                <?php if($donnees['user_type'] == 1): ?>
                <div>
                    <label id="prodOnly" for="titre">Titre :</label>
                    <input type="text" id="titre" value = "<?php  echo $donnees['user_titre'] ?>" /><br/><br/>
                </div>
                <div>
                    <label id="prodOnly" for="description">Description :</label>
                    <input type="text" id="description" value="<?php echo $donnees['user_description'] ?>"/><br/><br/>
                </div>
                <?php endif; ?>
            </fieldset>
        </form>
    </section>
</div>
<div>
    <button type="submit" ng-click="save()">Modification</button>
</div>
</section>
<!-- services section -->

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
                    <a href="identification.php"
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

</body>
</html>