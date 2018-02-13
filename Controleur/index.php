<?php session_start(); ?>
<!--  pages d'accueil avec presentations d site et tableau contenant les livraisons possible -> si connecté ceux du dept si favoris ceus des producteur fovoris -> si pas connecté tous-->

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
    <link href="../Vue/css/simpleLightbox.css" rel="stylesheet" type="text/css"/><!-- gallery css file -->
    <link rel="stylesheet" href="../Vue/css/font-awesome.min.css"/><!-- Font awesome css file -->
    <link rel="stylesheet" href="../Vue/css/style.css" type="text/css" media="all">
    <!-- default css files -->

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
    <script src="../Config/app.js"></script>
    <script src="../Vue/js/javanous/search_dept.js"></script>
    <script src="../Vue/js/javanous/add_line_to_order.js"></script>
</head>
<?php include "header.html";?>

<!--//about-->
<!--/about-->
<div class="about" id="about">
    <div class="container">
        <h2 class="heading">On met en relation producteurs et consommateurs</h2>
        <div class="col-md-7 aboutleft">
            <p>Ce site web vous donne la possibilité en tant que producteur de proposer des produits divers et variés à
                destination de consommateurs de tout horizon. En effet, notre mission est de permettre aux gens d'avoir
                accès à des produits frais et proches de sa zone géographique.
                Nos consommateurs les plus intrépides se chargeront de l'acheminement de vos commandes jusqu'à chez vous
                dans une démarche collaborative.
                En tant que consommateur, vous pourrez visualiser les produits de votre département et effectuer des
                commandes. Pour ceux qui ne veulent pas se déplacer, vous pourrez demander à un consommateur dont la
                commande est identique de transporter quelques produits.
                Avec ce site participez à l'essor de l'activité des producteurs francais, consommez des produits de
                qualité et LIVREZ LES TOUS !!! </p>

        </div>
        <div class="col-md-5 aboutright">
            <div class="sreen-gallery-cursual">
                <h3>Agriculture participitive BlaBlaCarisée</h3>
                <div id="owl-demo" class="owl-carousel">
                    <div class="item-owl">
                        <div class="test-review">
                            <div class="img-agile">
                                <img src="../Vue/images/apple.png" class="img-responsive" alt=""/>
                            </div>
                        </div>
                    </div>
                    <div class="item-owl">
                        <div class="test-review">
                            <div class="img-agile">
                                <img src="../Vue/images/banana.png" class="img-responsive" alt=""/>
                            </div>
                        </div>
                    </div>
                    <div class="item-owl">
                        <div class="test-review">
                            <div class="img-agile">
                                <img src="../Vue/images/lemon.png" class="img-responsive" alt=""/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12" style="margin:100px;">
            <?php if (isset($_SESSION['user_id'])) { ?>
            <h2 class="heading">Prochaines livraisons des vos producteurs favoris</h2>

            <div id="annonceCommande" name="annonceCommande" style="overflow:scroll;">
                <?php //Connection avec la BDD.
                    $mysqli = mysqli_connect("localhost", "root", "", "Pomme");
                    mysqli_set_charset($mysqli, "utf8");
                    $request = mysqli_query($mysqli, "SELECT * FROM commande WHERE commande_statut = 'Ouverte' ORDER BY commande_date_livraison");
                    $fav_req = mysqli_query($mysqli, "SELECT favoris_producteur FROM favoris WHERE favoris_client =" . $_SESSION['user_id']);
                    $donnees_fav = mysqli_fetch_array($fav_req);
                ?>
                <table ng-controller="goToAddLineCtrl">
                    <tr>
                        <th>Date de livraison</th>
                        <th>Capacité de livraison</th>
                        <th>Lieu de livraison</th>
                        <th>Informations complémentaires</th>
                    </tr>
                    <?php while ($donnees = mysqli_fetch_array($request)) {
                        $today = date("Y-m-d H:i:s");
                        mysqli_set_charset($mysqli, "utf8");
                        if ($donnees['commande_date_livraison'] > $today) {
                            if (in_array($donnees['commande_producteur'], $donnees_fav, true)) { ?>
                                <tr>
                                    <td><?php
                                            echo $donnees['commande_date_livraison']; ?></td>
                                    <td><?php $_SESSION['contenance' . $donnees['commande_id']] = $donnees['commande_contenance'];
                                            echo $donnees['commande_contenance']; ?></td>
                                    <td><?php echo $donnees['commande_lieu']; ?></td>
                                    <td><?php echo $donnees['commande_description']; ?></td>
                                    <td>
                                        <button type="submit" id="<?php echo $donnees['commande_id']; ?>"
                                                data-ng-click="go_to_add($e)" class="btn btn-primary">Se faire
                                            livrer
                                        </button>
                                    </td>
                                </tr>
                            <?php }
                        }
                    } ?>
                </table>
                <?php } ?>


                <?php if (isset($_SESSION['user_id'])) { ?>
                    <h2 class="heading">Prochaines livraisons des producteurs près de chez vous</h2>
                <?php } else {
                    ?>
                    <h2 class="heading">Prochaines livraisons de nos producteurs</h2>
                <?php } ?>
                <div id="annonceCommande" name="annonceCommande" style="overflow:scroll;">
                    <?php //Connection avec la BDD.
                        $mysqli = mysqli_connect("localhost", "root", "", "Pomme");
                        mysqli_set_charset($mysqli, "utf8");
                        $request = mysqli_query($mysqli, "SELECT * FROM commande WHERE commande_statut = 'Ouverte' ORDER BY commande_date_livraison");
                        if (isset($_SESSION['user_id'])) {
                            $dpt_user_request = mysqli_query($mysqli, "SELECT * FROM users WHERE user_id =" . $_SESSION['user_id']);
                            $donnees_dpt = mysqli_fetch_array($dpt_user_request);
                            $dpt_user = substr($donnees_dpt['user_code_postal_id'], 0, 2);
                        } else
                            $dpt_user = 100;
                    ?>
                    <table ng-controller="goToAddLineCtrl">
                        <tr>
                            <th>Date de livraison</th>
                            <th>Capacité de livraison</th>
                            <th>Lieu de livraison</th>
                            <th>Informations complémentaires</th>
                        </tr>
                        <?php while ($donnees = mysqli_fetch_array($request)) {
                            $today = date("Y-m-d H:i:s");
                            mysqli_set_charset($mysqli, "utf8");
                            $dpt_user_request = mysqli_query($mysqli, "SELECT * FROM users WHERE user_id =" . $donnees['commande_producteur']);
                            $donnees_dpt_prod = mysqli_fetch_array($dpt_user_request);
                            $dpt_prod = substr($donnees_dpt_prod['user_code_postal_id'], 0, 2);
                            if ($donnees['commande_date_livraison'] > $today) {
                                if ($dpt_prod == $dpt_user or $dpt_user == 100) { ?>
                                    <tr>
                                        <td><?php echo $donnees['commande_date_livraison']; ?></td>
                                        <td><?php $_SESSION['contenance' . $donnees['commande_id']] = $donnees['commande_contenance'];
                                                echo $donnees['commande_contenance']; ?></td>
                                        <td><?php echo $donnees['commande_lieu']; ?></td>
                                        <td><?php echo $donnees['commande_description']; ?></td>
                                        <?php if (isset($_SESSION['user_id'])) { ?>
                                            <td>
                                                <button type="submit" id="<?php echo $donnees['commande_id']; ?>"
                                                        data-ng-click="go_to_add($e)" class="btn btn-primary">Se faire
                                                    livrer
                                                </button>
                                            </td>
                                        <?php } else { ?>
                                            <td>Connectez vous pour profiter de cette livraison</td>
                                        <?php } ?>

                                    </tr>
                                <?php }
                            }
                        } ?>
                    </table>


                    <?php mysqli_close($mysqli); //deconnection de mysql ?>
                    <!--</div>-->
                </div>


                <div class="clearfix"></div>
            </div>


        </div>
        <!--//about-->


        <!-- services section -->
        <section class="service-w3ls" id="services">

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

        <!--team-->
        <div class="team" id="team">
            <div class="w3agile-spldishes">
                <div class="container">
                    <h3 class="heading">Nos producteurs</h3>
                    <div class="spldishes-agileinfo">
                        <?php //Connection avec la BDD.
                            $mysqli = mysqli_connect("localhost", "root", "", "Pomme");
                            mysqli_set_charset($mysqli, "utf8");
                            $request = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `user_type`=1 ORDER BY user_id ASC LIMIT 4 ");

                        ?>

                        <div class="spldishes-grids">
                            <?php $i = 1;
                                while ($donnees = mysqli_fetch_array($request)) { ?>


                                    <div class="col-md-3 item g1">
                                        <a href="../Controleur/affiche_profil.php?produit_user_id=<?php echo $donnees['user_id']; ?>">
                                            <img src="../Vue/images/t<?php echo $i++; ?>.jpg" title="Our Farmers"
                                                 alt=""/></a>
                                        <div class="agile-dish-caption">
                                            <ul class="top-links">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>

                                        <h4><?php echo $donnees['user_nom'] . " " . $donnees['user_prenom']; ?>
                                        </h4>
                                        <p><?php echo $donnees['user_description']; ?></p>
                                    </div>
                                <?php }
                                mysqli_close($mysqli); ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--//team-->

        <!-- gallery -->
        <div id="gallery" class="gallery">
            <h3 class="heading">Galerie de produits</h3>
            <div class="w3ls_banner_bottom_grids">
                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#banana" id="banana-tab" role="tab"
                                                                  data-toggle="tab"
                                                                  aria-controls="banana"
                                                                  aria-expanded="true">Bananes</a>
                        </li>
                        <li role="presentation"><a href="#apple" role="tab" id="apple-tab" data-toggle="tab"
                                                   aria-controls="apple">Pommes</a></li>
                        <li role="presentation"><a href="#lemon" role="tab" id="lemon-tab" data-toggle="tab"
                                                   aria-controls="lemon">Citron</a></li>
                        <li role="presentation"><a href="#Strawberry" role="tab" id="Strawberry-tab" data-toggle="tab"
                                                   aria-controls="Strawberry">Fraises</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="banana" aria-labelledby="banana-tab">
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g1.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g1.jpg" alt=" " class="img-responsive"/>
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Bannanes girondinnes </h4>
                                                <p>Bonne qualité</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g2.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g2.jpg" alt=" " class="img-responsive"/>
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Bananes du périgord</h4>
                                                <p>Saveur de l'année</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g3.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g3.jpg" alt=" " class="img-responsive"/>
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Bananes de cuisine</h4>
                                                <p>Idéal pour cuisiner</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g4.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g4.jpg" alt=" " class="img-responsive"/>
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Bananes jaunes</h4>
                                                <p>Très savoureuses</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g5.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g5.jpg" alt=" " class="img-responsive"/>
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Bananes verte</h4>
                                                <p> Aussi verte qu'Hulk !!!! </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g6.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g6.jpg" alt=" " class="img-responsive"/>
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Bananes violette</h4>
                                                <p>Plein de couleur</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g7.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g7.jpg" alt=" " class="img-responsive"/>
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Banane fleur</h4>
                                                <p>sent très bon</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g8.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g8.jpg" alt=" " class="img-responsive"/>
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>banane banale</h4>
                                                <p>Rien à signaler</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="apple" aria-labelledby="apple-tab">
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g9.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g9.jpg" alt=" " class="img-responsive">
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Pomme d'adam</h4>
                                                <p>Bonne qualité</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g10.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g10.jpg" alt=" " class="img-responsive">
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Pomme verte</h4>
                                                <p>jolie couleur verte</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g11.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g11.jpg" alt=" " class="img-responsive">
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Pomme gala</h4>
                                                <p>acidulées</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g12.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g12.jpg" alt=" " class="img-responsive">
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Pomme Bonza</h4>
                                                <p>très savoureuse</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g13.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g13.jpg" alt=" " class="img-responsive">
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Pomme rouge</h4>
                                                <p>Très sucrée</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g14.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g14.jpg" alt=" " class="img-responsive">
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Pomme jaune</h4>
                                                <p>idéal pour les compotes</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="lemon" aria-labelledby="lemon-tab">
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g15.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g15.jpg" alt=" " class="img-responsive">
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Citron</h4>
                                                <p>Bonne qualité</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g16.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g16.jpg" alt=" " class="img-responsive">
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Citron vert</h4>
                                                <p>Bonne Qualité</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g17.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g17.jpg" alt=" " class="img-responsive">
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Citron</h4>
                                                <p>Bonne Qualité</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g18.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g18.jpg" alt=" " class="img-responsive">
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Citron</h4>
                                                <p>Bonne Qualité</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g19.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g19.jpg" alt=" " class="img-responsive">
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Citron</h4>
                                                <p>Bonne Qualité</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g20.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g20.jpg" alt=" " class="img-responsive">
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Citron</h4>
                                                <p>Bonne Qualité</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="Strawberry" aria-labelledby="Strawberry-tab">
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g21.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g21.jpg" alt=" " class="img-responsive">
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Fraises</h4>
                                                <p>Aussi belles que bonnes</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g22.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g22.jpg" alt=" " class="img-responsive">
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Fraises</h4>
                                                <p>Aussi belles que bonnes</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g23.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g23.jpg" alt=" " class="img-responsive">
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Fraises du jardin</h4>
                                                <p>Aussi belles que bonnes</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g24.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g24.jpg" alt=" " class="img-responsive">
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Fraises</h4>
                                                <p>Aussi belles que bonnes</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g25.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g25.jpg" alt=" " class="img-responsive">
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Fraises</h4>
                                                <p>Aussi belles que bonnes</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 w3layouts_gallery_grid">
                                <a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est."
                                   href="images/g26.jpg">
                                    <div class="w3layouts_team_grid">
                                        <img src="../Vue/images/g26.jpg" alt=" " class="img-responsive">
                                        <div class="w3layouts_team_grid_pos">
                                            <div class="wthree_text">
                                                <h4>Fraises</h4>
                                                <p>Aussi belles que bonnes</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //gallery -->

    <!-- clients-->
    <div class="clients" id="clients">
        <div class="container">
            <h3 class="heading">Avis consommateurs</h3>
            <div class="wmuSlider example1 animated wow slideInUp" data-wow-delay=".5s">
                <div class="wmuSliderWrapper">
                    <article style="position: absolute; width: 100%; opacity: 0;">
                        <div class="banner-wrap">
                            <div class="col-md-6 client-grids">
                                <p>J'adore ce site !! Il est trop beau et tellement pratique. Utiliser AngularJS 1.4.5
                                    comme
                                    technologie etait très osé mais s'est révélé être une très bonne idée. </p>
                                <div class="col-md-3 c-img">
                                    <img src="../Vue/images/c1.jpg" alt=""/>
                                </div>
                                <div class="col-md-3 c-info">
                                    <h4>Charlotte</h4>
                                    <h5>Cliente à Bordeaux</h5>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-6 client-grids">
                                <p>Je n'aime pas les légumes mais avec ce site j'ai appris à adorer les brocolis. Je ne
                                    mange que ca maintenant, je déjeune avec des poireaux et choux de bruxelles TOUS LES
                                    MATINS !</p>
                                <div class="col-md-3 c-img">
                                    <img src="../Vue/images/c2.jpg" alt=""/>
                                </div>
                                <div class="col-md-3 c-info">
                                    <h4>Aurore</h4>
                                    <h5>Cliente addicte</h5>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </article>
                    <article style="position: absolute; width: 100%; opacity: 0;">
                        <div class="banner-wrap">
                            <div class="col-md-6 client-grids">
                                <p>J'avais déja l'habitude d'aller chercher des huitres sur le bassin d'Arcachon.
                                    Maintenant, dès que j'en achète, j'en ramène à plusieurs personnes sur Bordeaux.
                                    Grâce à
                                    ce système collaboratif, j'ai jusqu'à 10 euros de réduction sur ma commande</p>
                                <div class="col-md-3 c-img">
                                    <img src="../Vue/images/c3.jpg" alt=""/>
                                </div>
                                <div class="col-md-3 c-info">
                                    <h4>Isaaquette</h4>
                                    <h5>Consommatrice intrépide</h5>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-6 client-grids">
                                <p>Je fais régulièrement des commandes de pommes sur ce site. Elles sont de très bonne
                                    qualité et je sais d'où elles viennent. Avec le système collaboratif, les autres
                                    clients
                                    me les livrent directement !!! </p>
                                <div class="col-md-3 c-img">
                                    <img src="https://media.licdn.com/mpr/mpr/shrinknp_200_200/AAEAAQAAAAAAAAyuAAAAJDQ2OTNiYWQ4LTIwYzQtNGQ1NS1iMTU0LTQyMWY4M2I2MDlhNw.jpg"
                                         alt=""/>
                                </div>
                                <div class="col-md-3 c-info">
                                    <h4>Ti-Diane-Du-33</h4>
                                    <h5>Fan de la petite Sirène</h5>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
    <!--//clients-->
<?php include "footer.html";?>




        <!-- bootstrap-pop-up -->
        <div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Fruit land</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span>
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

    </div>
    <!-- //Body -->
</html>
