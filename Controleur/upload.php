<?php
session_start();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../Controleur/Models/prodModel.php';

$success = 0;
$uploadedFile = '';

//File upload path
$uploadPath = '../images_prod/uploads/';
$s1 = (string)$_SESSION['idprod'];
$s2 = substr(strrchr($_FILES['myfile']['type'], "/"), 1);
$var = $s1 . "." . $s2;
$targetPath = $uploadPath . basename($var);
if (@move_uploaded_file($_FILES['myfile']['tmp_name'], $targetPath)) {
    $success = 1;
}
$database = new database();
$db = $database->getConnection();

$product = new prodModel($db);
$product->produit_id = $_SESSION['idprod'];
$product->produit_photo = $var;
if ($product->add_picture()) {
    header('Location: ../Vue/display_products.php');
    exit;
}
?>