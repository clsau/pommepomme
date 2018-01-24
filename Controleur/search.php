<?php
// required headers

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
 

// get keywords
$keywords=isset($_GET["cboDept"]) ? $_GET["cboDept"] : "";
// query products
$stmt = $user->search($keywords);
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){
    // products array
    $user_arr=array();
   
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $user_item=array(
            'Nom' => $user_nom,
            'Prenom' => $user_prenom,
            'CP' => $user_code_postal_id,
			'Titre' => $user_titre,
			
        );
 
        array_push($user_arr, $user_item);
    }
 
    echo json_encode($user_arr);
}
 
else{
    echo json_encode(
        array("message" => "No producter found.")
    );
}
?>
