<?php
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

    $order = new orderModel($db);
    $Pseudo = $_SESSION["pseudo"];
    $data = json_decode(file_get_contents("php://input"));

    //$data = json_decode($json,TRUE);

    // set ID property of user to be edited
    $order->commande_statut = $data->commande_statut;
    $order->commande_date_livraison = $data->commande_date_livraison;
    $order->commande_lieu = $data->commande_lieu;
    $order->commande_description = $data->commande_description;
    $order->commande_producteur = $data->commande_producteur;
    $order->commande_contenance = $data->commande_contenance;

    $order->commande_date_livraison = (date($order->commande_date_livraison));
    $order->commande_producteur = (int)$order->commande_producteur;
    $order->commande_contenance = (int)$order->commande_contenance;
    header('Content-Type: application/json');
    if ($order->create_product()) {
        $response = array('message' => 'true');
        echo json_encode($response);
    } else {
        $response = array('message' => 'false');
        echo json_encode($response);
    }
?>
