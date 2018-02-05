<?php
    session_start();
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


    // include database and object files
    include_once '../Config/database.php';
    include_once 'Models/ligneViewModel.php';

    // get database connection
    $database = new database();
    $db = $database->getConnection();

    // prepare user object
    $commande = new ligneViewModel($db);

    // get id of user to be edited
    $data = json_decode(file_get_contents("php://input"));

    // set ID property of user to be edited
    $commande->ligne_user_id = $data->ligne_user_id;

    $stmt = $commande->get_ligne_by_user_id();

    if (empty($stmt)) {
        echo json_encode(
            array("message" => "Aucune ligne Trouvee.")
        );
    } else {
        // products array
        $liste_ligne = array();
        // retrieve our table contents
        // fetch() is faster than fetchAll()
        // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        foreach ($stmt as $row) {
            extract($row);
            $item = array(
                'ligne_id' => $row['ligne_id'],
                'ligne_quantite' => $row['ligne_quantite'],
                'ligne_nom_produit' => $row['ligne_nom_produit'],
                'ligne_prix' => $row['ligne_prix'],
                'client_nom' => $row['client_nom'],
                'client_prenom' => $row['client_prenom'],
                'client_type' => $row['client_type'],
                'client_tel' => $row['client_tel'],
                'client_mail' => $row['client_mail'],
                'client_adresse' => $row['client_adresse'],
                'client_description' => $row['client_description'],
                'ligne_user_id' => $row['ligne_user_id'],
                'ligne_commande_id' => $row['ligne_commande_id'],
                'commande_id' => $row['commande_id'],
                'commande_statut' => $row['commande_statut'],
                'commande_date_livraison' => $row['commande_date_livraison'],
                'commande_lieu' => $row['commande_lieu'],
                'commande_description' => $row['commande_description'],
                'commande_contenance' => $row['commande_contenance'],
                'livreur_id' => $row['livreur_id'],
                'livreur_login' => $row['livreur_login'],
                'livreur_type' => $row['livreur_type'],
                'livreur_nom' => $row['livreur_nom'],
                'livreur_prenom' => $row['livreur_prenom'],
                'livreur_adresse' => $row['livreur_adresse'],
                'livreur_tel' => $row['livreur_tel'],
                'livreur_mail' => $row['livreur_mail'],
                'livreur_titre' => $row['livreur_titre'],
                'livreur_description' => $row['livreur_description'],
                'prod_id' => $row['prod_id'],
                'prod_login' => $row['prod_login'],
                'prod_type' => $row['prod_type'],
                'prod_nom' => $row['prod_nom'],
                'prod_prenom' => $row['prod_prenom'],
                'prod_tel' => $row['prod_tel'],
                'prod_mail' => $row['prod_mail'],
                'prod_adresse' => $row['prod_adresse'],
                'prod_code_postal_id' => $row['prod_code_postal_id'],
                'prod_description' => $row['prod_description']
            );

            array_push($liste_ligne, $item);
        }

        echo json_encode($liste_ligne);
    }
    // create the user


?>

