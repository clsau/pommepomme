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
    $data = json_decode(file_get_contents("php://input"));
    $id = $data->produit_id;

    header('Content-Type: application/json');
    if ($product->delete_product($id)) {
        $response = array('message' => 'true');
        echo json_encode($response);
    } else {
        $response = array('message' => 'false');
        echo json_encode($response);
    }

?>
