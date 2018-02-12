<?php 

session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../Config/database.php';
include_once 'Models/userModel.php';

// get database connection
$database = new database();
$db = $database->getConnection();

//$pseudo = $_SESSION["Pseudo"];

// prepare user object
$user = new userModel($db);
// get id of user to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of user to be edited
//$user->login = $data->login;
$user->login = $data->login;
$user->mdp = $data->mdp;


	// update the product
	if ($user->modificationMDP()) {
    	//$response = array('message' => 'true');
    	echo json_encode("true");
	} else {
    	//$response = array('message' => 'false');
    	echo json_encode("false");
	}

?>

