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

    // set ID property of user to be edited
    $product->produit_user_login = $_SESSION['pseudo'];
    if ($data->produit_id == "null")
        $id = null;
    else {
        $id = $data->produit_id;
    }

    if (is_null($product->read_products($id))) {
        echo '"message": "Produits non trouvés"';
    } else {
        header('Content-Type: application/json');
        echo json_encode($product->read_products($id));
    }

?>
