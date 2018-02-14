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

    <script src="../config/app.js"></script>
    <script src="js/javanous/modificationCtrl.js"></script>
    <script src="js/javanous/modificationCtrl.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
    <script type="text/javascript">
        function rechercher() {
            var codePostal = document.getElementById('CP').value;
            $.ajax({
                type: "POST",
                url: "some.php",
                data: {codePostal: codePostal}, // je passe la variable JS
                success: function (msg) { // je récupère la réponse dans la variable msg
                    $('#Ville').empty();
                    $('#Ville').append(msg);
                }
            });
        }


    </script>


</head>

<?php include "header.html"; ?>

<header>
    <body ng-app="AppModule" ng-controller="ModificationCtrl">

    <?php
        $mysqli = mysqli_connect("localhost", "root", "", "pomme");
        $Pseudo = $_SESSION["pseudo"];
        $Requete = mysqli_query($mysqli, "SELECT * FROM users  WHERE user_login = '" . $Pseudo . "'");
        $donnees = mysqli_fetch_array($Requete);
    ?>

    <!-- BASE DE FOND DU MENU -->
    <section class="service-w3ls" id="services">
        <h1>Modification des données personnelles</h1>
        <br>

        <div>
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
                            <input type="email" id="courriel" value="<?php echo $donnees['user_mail'] ?>"/><br/><br/>
                        </div>
                        <div>
                            <label for="telephone">Telephone :</label>
                            <input type="text" id="telephone" value="<?php echo $donnees['user_tel'] ?>"/><br/><br/>
                        </div>
                        <div>
                            <label for="adresse">Adresse :</label>
                            <input type="text" id="adresse" value="<?php echo $donnees['user_adresse'] ?>"/><br/><br/>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Entrez votre code postal">
                            <label>Code Postal</label>

                            <input class="input100" type="text" id="CP" required maxlength="5" placeholder="Code Postal"
                                   onkeyup="rechercher()"><br/><br/>
                            <span class="focus-input100"></span>
                            <p id="text"></p>
                        </div>


                        <div class="wrap-input100 validate-input" id="ville" data-validate="Entrez votre ville">
                            <label>Ville</label>

                            <select style="width:162px" class="input100" id="Ville" required>

                            </select><br/><br/>

                        </div>
                        <script type="text/javascript">document.cookie = "prodOnly=2";</script>
                        <?php if ($donnees['user_type'] == 1): ?>
                            <div>
                                <label id="prodOnly" for="titre">Titre :</label>
                                <input type="text" id="titre" value="<?php echo $donnees['user_titre'] ?>"/><br/><br/>
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


    </body>
    <?php include "footer.html"; ?>
</html>