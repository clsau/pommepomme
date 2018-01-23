<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../../Controleur/config/database.php';
include_once '../../objetModels/userModel.php';
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
            'Code postal' => $user_code_postal_id,
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
<?php 
// à mettre tout en haut du fichier .php, cette fonction propre à PHP servira à maintenir la $_SESSION

if (isset($_GET['recherche'])) {
            $departement = htmlentities($_GET['cboDept'], ENT_QUOTES, "ISO-8859-1"); // le htmlentities() passera les guillemets en entités HTML, ce qui empêchera les injections SQL
            $mysqli = mysqli_connect("localhost", "root", "", "pomme") or die ('Impossible de se connecter');
                // on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent:
                $Requete = mysqli_query($mysqli, "SELECT * FROM users WHERE user_code_postal_id=(select code_postal_id From code_postal where code_postal_departement_id='" . $departement . "')");
                if (mysqli_num_rows($Requete) == 0){ 
                    //echo "dpt:".$departement;
					echo '<script language = "JavaScript">
                    alert("Il n y a pas de producteur dans ce departement");
					window.location.replace("index.php");
					</script>';
                } else {
                    header('Location:resultat_recherche.php?cboDept='.$_GET['cboDept']);
                }
        
    
}
?>