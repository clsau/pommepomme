<?php
// required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
    include_once '../config/database.php';
    include_once 'Models/favorisModel.php';
// get database connection
    $database = new database();
    $db = $database->getConnection();
// prepare favoris object
    $favoris = new favorisModel($db);
// get id of favoris to be edited
    $data = json_decode(file_get_contents("php://input"));
// get keywords
    $user_id = isset($_GET["favoris_client"]) ? $_GET["favoris_client"] : "";

    $stmt = $favoris->get_favoris_by_user_id($user_id);

    if (empty($stmt)) {
        echo json_encode(
            array("message" => "No favoris found."));

    } else {
        $favoris_arr = array();

        foreach ($stmt as $row) {
            extract($row);

            $favoris_item = array(
                'Nom' => $row['user_nom'],
                'Prenom' => $row['user_prenom'],
                'Commune' => $row['code_postal_commune'],
                'Titre' => $row['user_titre'],
                'id' => $row['favoris_producteur']
            );

            array_push($favoris_arr, $favoris_item);
        }


        echo json_encode($favoris_arr);
    }
?>