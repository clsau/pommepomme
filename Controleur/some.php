<?php

    $mysqli = mysqli_connect("localhost", "root", "", "Pomme");
    mysqli_set_charset($mysqli, "utf8");

    // je récupère ma variable JS
    $codePostal = $_POST['codePostal'];

    // Je fais les traitements qui vont bien : requêtes SQL, algorithmes etc... (ici requête sql)
    $request = mysqli_query($mysqli, 'SELECT code_postal_commune, code_postal_id FROM code_postal WHERE code_postal_code= "' . $codePostal . '"');

    $ville = array();
    $retour = "<option disabled selected>Choix:</option>";
    echo $retour;
    while ($dn1 = mysqli_fetch_array($request)) {
        $retour = "<option value='" . $dn1['code_postal_id'] . "'>" . $dn1['code_postal_commune'] . "</option>";
        echo $retour; // envoi de la réponse (ça pourrait être du code html, un objet serializé etc.. l'important c'est qu'il s'agisse d'un String)
    }
?> 