<?php

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
    $email = $data->Mail;
    // create the user
    header('Content-Type: application/json');
    $mysqli = mysqli_connect("localhost", "root", "", "Pomme");
    mysqli_set_charset($mysqli, "utf8");
    $request = mysqli_query($mysqli, "SELECT user_login FROM users");

    $bon = 0;
    while ($donnees = mysqli_fetch_array($request)) {
        if ($donnees['user_login'] == $data->login) {
            $bon = 1;
        }
    }
    mysqli_close($mysqli);
    if ($bon == 1) {
        $response = array('message' => 'double');
        echo json_encode($response);
    } else {
        if ($user->create_user()) {
            $response = array('message' => 'true');
            echo json_encode('true');
        } else {
            $response = array('message' => 'false');
            echo json_encode('false');
        }
    }

?>
								 