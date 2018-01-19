<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// include database and object files
include_once '../config/database.php';
include_once '../prodModels/prodModel.php';

// get database connection
$database = new database();
$db = $database->getConnection();

// prepare user object
$product = new prodModel($db);

// get id of user to be edited
$data = json_decode(file_get_contents("php://input"));

// set ID property of user to be edited
$product->idProduit = $data->idProduit;
$product->idProducteur = $data->idProducteur;
$product->NomProduit = $data->NomProduit;
$product->DescriptionProduit = $data->DescriptionProduit;
$product->PhotoProduit = $data->PhotoProduit;
$product->PrixProduit = $data->PrixProduit;
$product->StockProduit = $data->StockProduit;
$product->UniteProduit = $data->UniteProduit;
$product->Valeur_UniteProduit = $data->Valeur_UniteProduit;
$product->IdCategorieProduit = $data->IdCategorieProduit;


// update the product
if ($product->update_product()) {
    echo '"message": "Produit mis à jour"';
} // if unable to update the product, tell the user
else {
    echo '"message": "Produit non modifié"';
}

?>

