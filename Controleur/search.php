<?php
// required headers
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
// get keywords
    $keywords1 = isset($_GET["cboDept"]) ? $_GET["cboDept"] : "";

    $keywords2 = isset($_GET["categorie"]) ? $_GET["categorie"] : "";
// query products
    $stmt = $user->search($keywords1, $keywords2);
// check if more than 0 record found
    if (empty($stmt)) {
        echo json_encode(
            array("message" => "No producter found.")
        );
    } else {
        // products array
        $user_arr = array();
        foreach ($stmt as $row) {
            extract($row);

            $user_item = array(
                'Nom' => $row['user_nom'],
                'Prenom' => $row['user_prenom'],
                'CP' => $row['code_postal_code'],
                'Commune' => $row['code_postal_commune'],
                'Titre' => $row['user_titre'],
                'Produit' => $row['produit_nom'],
                'produit_description' => $row['produit_description'],
                'produit_photo' => $row['produit_photo'],
                'Prix' => $row['produit_prix'],
                'unite' => $row['produit_unite'],
                'produit_id' => $row['produit_id'],
                'produit_user_id' => $row['produit_user_id']

            );

            array_push($user_arr, $user_item);
        }

        echo json_encode($user_arr);
    }
?>