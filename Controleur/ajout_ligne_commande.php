<?php
    session_start();

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// include database and object files
    include_once '../Config/database.php';
    include_once 'Models/orderLineModel.php';

// get database connection
    $database = new database();
    $db = $database->getConnection();

    $line = new orderLineModel($db);

    $data = json_decode(file_get_contents("php://input"));

//$data = json_decode($json,TRUE);

// set ID property of user to be edited
    $line->ligne_user_id = $_SESSION['user_id'];
    $line->ligne_produit_id = $data->ligne_id_produit;
    $line->ligne_quantite = $data->ligne_quantite;
    $line->ligne_commande_id = $data->ligne_commande_id;
    $line->ligne_quantite = (int)$line->ligne_quantite;
    $line->ligne_commande_id = (int)$line->ligne_commande_id;
    $line->ligne_user_id = (int)$line->ligne_user_id;
    $line->ligne_produit_id = (int)$line->ligne_produit_id;
    $line->ligne_prix = (float)$line->ligne_prix;


    header('Content-Type: application/json');
    $response = $line->create_line();
    if (is_null($response)) {
        echo false;
    } else {
        if ($response == "plein") {
            $response = array('message' => 'plein');
            echo json_encode($response);
        } else {
            $response = array('message' => 'place');
            echo json_encode($response);
        }
    }
?>