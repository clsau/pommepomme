<?php
    session_start();

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


    // include database and object files
    include_once '../config/database.php';
    include_once 'Models/prodModel.php';

    // get database connection
    $database = new database();
    $db = $database->getConnection();

    $product = new prodModel($db);
    $Pseudo = $_SESSION["pseudo"];
    $data = json_decode(file_get_contents("php://input"));

    //$data = json_decode($json,TRUE);

    // set ID property of user to be edited
    $product->produit_user_login = $_SESSION['pseudo'];
    $product->produit_nom = $data->produit_nom;
    $product->produit_description = $data->produit_description;
    $product->produit_photo = null;
    $product->produit_prix = $data->produit_prix;
    $product->produit_stock = $data->produit_stock;
    $product->produit_unite = $data->produit_unite;
    $product->produit_valeur_unite = $data->produit_valeur_unite;
    $product->produit_categorie_id = $data->produit_categorie_id;


    $product->produit_prix = (float)$product->produit_prix;
    $product->produit_stock = (int)$product->produit_stock;
    $product->produit_valeur_unite = (float)$product->produit_valeur_unite;
    $product->produit_categorie_id = (int)$product->produit_categorie_id;
    header('Content-Type: application/json');
    $_SESSION['idprod'] = $product->create_product();
    if (is_null($_SESSION['idprod'])) {
        echo null;
    } else {
        header('Content-Type: application/json');
        echo json_encode($_SESSION['idprod']);
    }
?>
