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
    $product->produit_id = $data->produit_id;
    $product->produit_nom = $data->produit_nom;
    $product->produit_description = $data->produit_description;
    $product->produit_photo = $data->produit_photo;
    $product->produit_prix = $data->produit_prix;
    $product->produit_stock = $data->produit_stock;
    $product->produit_unite = $data->produit_unite;
    $product->produit_valeur_unite = $data->produit_valeur_unite;
    $product->produit_categorie_id = $data->produit_categorie_id;

    $product->produit_id = (int)$product->produit_id;
    $product->produit_prix = (float)$product->produit_prix;
    $product->produit_stock = (int)$product->produit_stock;
    $product->produit_valeur_unite = (float)$product->produit_valeur_unite;
    $product->produit_categorie_id = (int)$product->produit_categorie_id;


    if ($product->update_product()) {
        $response = array('message' => 'true');
        echo json_encode($response);
    } else {
        $response = array('message' => 'false');
        echo json_encode($response);
    }

?>
