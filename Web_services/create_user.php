<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
 
// include database and object files
include_once '../Config/database.php';
include_once '../objetModels/userModel.php';

// get database connection
$database = new database();
$db = $database->getConnection();

// prepare user object
$user = new userModel($db);

// get id of user to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of user to be edited
//$user->id_user = $data->id_user;
$user->login = $data->login;
$user->mdp = $data->mdp;
$user->type = $data->type;
$user->Nom = $data->Nom;
$user->Prenom = $data->Prenom;
$user->Tel = $data->Tel;
$user->Mail = $data->Mail;
$user->Adresse = $data->Adresse;
$user->Id_CP = $data->Id_CP;
$user->Titre = $data->Titre;
$user->Description = $data->Description;


// create the user

if($user->create_user()){
        return 0;
} else{
        return -1;
}

 ?>

