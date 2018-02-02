<?php
    session_start();

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// include database and object files
    include_once '../Config/database.php';
    include_once 'Models/orderModel.php';

// get database connection
    $database = new database();
    $db = $database->getConnection();

    $commande = new orderModel($db);

    $data = json_decode(file_get_contents("php://input"));

//$data = json_decode($json,TRUE);

// set ID property of user to be edited
    $commande->commande_producteur = $_SESSION['producteur_id'];
    $commande->commande_lieu = $data->commande_lieu_livraison;
    $commande->commande_contenance = $data->commande_contenance;
    $commande->commande_description = $data->commande_description;
    $commande->commande_statut = $data->commande_statut;
    $commande->commande_date_livraison = $data->commande_date_livraison;
    $commande->commande_client = $_SESSION['id_produit'];

    $commande->commande_contenance = (int)$commande->commande_contenance;
    $commande->commande_producteur = (int)$commande->commande_producteur;
    $commande->commande_client = (int)$commande->commande_client;


    header('Content-Type: application/json');
    $id_cmd = $commande->create_order();
    if ($id_cmd == false || $id_cmd == null) {
        $res = false;
        echo json_encode($res);
    } else {
        echo json_encode($id_cmd);
    }
?>