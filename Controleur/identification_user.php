<?php
session_start();
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
$user->login = $data->login;
$user->mdp = $data->mdp;

// update the user


// update the user
$user->identification_user();

$user_info = array(
    "user_id" => $user->user_id,
    "user_nom" => $user->user_nom,
    "user_login" => $user->user_login,
    "user_mdp" => $user->user_mdp,
    "user_type" => $user->user_type,
    "user_prenom" => $user->user_prenom,
    "user_tel" => $user->user_tel,
    "user_mail" => $user->user_mail,
    "user_adresse" => $user->user_adresse,
    "user_code_postal_id" => $user->user_code_postal_id,
    "user_titre" => $user->user_titre,
    "description" => $user->user_description);
print_r(json_encode($user_info));
$_SESSION['pseudo'] = $user->user_login;

?>

