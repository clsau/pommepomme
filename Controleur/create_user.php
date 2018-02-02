<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
 
// include database and object files
include_once '../config/database.php';
include_once '../objetModels/userModel.php';

// get database connection
$database = new database();
$db = $database->getConnection();

// prepare user object
$user = new userModel($db);

// get id of user to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of user to be edited
    if ($data->type == 1) {
        $user->Titre = $data->Titre;
        $user->Description = $data->Description;
    } else {
        $user->Titre = null;
        $user->Description = null;
    }
$user->login = $data->login;
$user->mdp = $data->mdp;
$user->type = $data->type;
$user->Nom = $data->Nom;
$user->Prenom = $data->Prenom;
$user->Tel = $data->Tel;
$user->Mail = $data->Mail;
$user->Adresse = $data->Adresse;
$user->Id_CP = $data->Id_CP;


    // create the user
header('Content-Type: application/json');
if ($user->create_user()) {
    $response = array('message' => 'true');
    echo json_encode($response);
} else {
    $response = array('message' => 'false');
    echo json_encode($response);
}

 ?>

