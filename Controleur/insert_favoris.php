<?php
    session_start();
    $mysqli = mysqli_connect("localhost", "root", "", "pomme");
    mysqli_set_charset($mysqli, "utf8");
    echo $_SESSION['id'];
    echo $_SESSION['profil'];
    $sql = mysqli_query($mysqli, "SELECT * FROM favoris WHERE  favoris_client= '" . $_SESSION['id'] . "' AND favoris_producteur= '" . $_SESSION['profil'] . "' ");
    $data = mysqli_fetch_array($sql);
    if ($data == 0) {
        $sql2 = mysqli_query($mysqli, "INSERT INTO favoris (favoris_client, favoris_producteur) VALUES ('" . $_SESSION['id'] . "', '" . $_SESSION['profil'] . "')");
        $mysqli->close();
        $_SESSION['msg'] = 'Favoris ajouté avec succes';
        //echo $_SESSION['msg'];
    } else {
        $_SESSION['msg'] = 'Favoris déjà ajouté';

    }
    //echo $_SESSION['msg'];
    header('Location: http://localhost/pommepomme/Controleur/affiche_profil.php?produit_user_id=' . $_SESSION['profil']);
    //exit();
?>