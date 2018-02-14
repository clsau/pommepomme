<?php
    session_start();
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


    // include database and object files
    include_once '../config/database.php';
    include_once 'Models/userModel.php';

    // get database connection
    $database = new database();
    $db = $database->getConnection();

    //$pseudo = $_SESSION["Pseudo"];

    // prepare user object
    $user = new userModel($db);

    // get id of user to be edited
    $data = json_decode(file_get_contents("php://input"));

    // set ID property of user to be edited

    $user->login = $_SESSION['pseudo'];
    $user->Tel = $data->Tel;
    $user->Mail = $data->Mail;
    $user->Adresse = $data->Adresse;
    $user->Id_CP = $data->Id_CP;
    $user->Titre = $data->Titre;
    $user->Description = $data->Description;
$user->Nom = $data->Nom;
$user->Prenom = $data->Prenom;

    $user->Tel = (int)$user->Tel;
//$user->Id_CP = (int)$user->Id_CP;

    // update the product
    header('Content-Type: application/json');
    if ($user->update_user()) {
        $response = array('message' => 'true');
        echo json_encode($response);
    } else {
        $response = array('message' => 'false');
        echo json_encode($response);
    }
?>

