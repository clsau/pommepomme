<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objetModels/user.php';


// instantiate database and product object
$database = new database();
$db = $database->getConnection();
 
// initialize object
$order = new user($db);
 
// query products
$stmt = $order->read();
$num = $stmt->rowCount();


?>