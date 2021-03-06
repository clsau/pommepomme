<?php
//<!-- traitement permettant l'ajout d'une commande -->

    session_start();

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// include database and object files
    include_once '../config/database.php';
    include_once 'Models/orderModel.php';

// get database connection
    $database = new database();
    $db = $database->getConnection();

    $commande = new orderModel($db);

    $data = json_decode(file_get_contents("php://input"));

//$data = json_decode($json,TRUE);

// set ID property of user to be edited
    if ($data->commande_contenance == 0) {
        $commande->commande_producteur = $_SESSION['producteur_id'];
        $commande->commande_lieu = null;
        $commande->commande_contenance = null;
        $commande->commande_description = null;
        $commande->commande_statut = $data->commande_statut;
        $commande->commande_date_livraison = $data->commande_date_livraison;
        $commande->commande_client = $_SESSION['user_id'];
    } else {
        $commande->commande_producteur = $_SESSION['producteur_id'];
        $commande->commande_lieu = $data->commande_lieu_livraison;
        $commande->commande_contenance = $data->commande_contenance;
        $commande->commande_description = $data->commande_description;
        $commande->commande_statut = $data->commande_statut;
        $commande->commande_date_livraison = $data->commande_date_livraison;
        $commande->commande_client = $_SESSION['user_id'];
    }
    $commande->commande_contenance = (int)$commande->commande_contenance;
    $commande->commande_producteur = (int)$commande->commande_producteur;
    $commande->commande_client = (int)$commande->commande_client;


    header('Content-Type: application/json');
    $id_cmd = $commande->create_order();
    if ($id_cmd == false || $id_cmd == null) {
        $response = array('message' => 'false');
        echo json_encode($response);
    } else {
        $response = array('message' => 'true', 'id' => $id_cmd, 'produit' => $_SESSION['id_produit']);
        echo json_encode($response);
    }
?>