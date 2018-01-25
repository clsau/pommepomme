<?php 
class userModel{
	 
	    // database connection and table name
	    private $conn;
	    private $table_name = "users";
	 
	    // object properties
	    public $id_user;
	    public $login;
	    public $mdp;
	    public $type;
	    public $Nom;
	    public $Prenom;
	    public $Tel;
	    public $Mail;
	    public $Adresse;
	    public $Id_CP;
	    public $Titre;
	    public $Description;
	    											
	 
	    // constructor with $db as database connection
	    public function __construct($db){
	        $this->conn = $db;
	    }
		
		public function create_user(){		

			    // create query
			    $query = "INSERT INTO
			                " . $this->table_name . "
			            SET
			                user_mdp = :mdp,
			                user_tel = :Tel,
			                user_mail = :Mail,
			                user_adresse = :Adresse,
			                user_titre = :Titre,
			                user_description = :Description,
			                user_login = :login,
			                user_type = :type,
			                user_nom = :Nom,
			                user_prenom = :Prenom ";
			 
			// echo $query;
			    // prepare query statement
			    $stmt = $this->conn->prepare($query);
			    // sanitize
			    $this->mdp=htmlspecialchars(strip_tags($this->mdp));
			    $this->Tel=htmlspecialchars(strip_tags($this->Tel));
			    $this->Mail=htmlspecialchars(strip_tags($this->Mail));
			    $this->Adresse=htmlspecialchars(strip_tags($this->Adresse));
			    $this->Description=htmlspecialchars(strip_tags($this->Description));
			    $this->login=htmlspecialchars(strip_tags($this->login));
			    $this->type=htmlspecialchars(strip_tags($this->type));
			    $this->Nom=htmlspecialchars(strip_tags($this->Nom));
			    $this->Prenom=htmlspecialchars(strip_tags($this->Prenom));
			    $this->Titre=htmlspecialchars(strip_tags($this->Titre));

			    // bind new values
			    //$stmt->bindParam(':id_user', $this->id_user);
			    $stmt->bindParam(':mdp', $this->mdp);
			    $stmt->bindParam(':Tel', $this->Tel);
			    $stmt->bindParam(':Mail', $this->Mail);
		        $stmt->bindParam(':Adresse', $this->Adresse);    
		        $stmt->bindParam(':Titre', $this->Titre);
			    $stmt->bindParam(':Description', $this->Description);
			    $stmt->bindParam(':login', $this->login);
			    $stmt->bindParam(':type', $this->type);
			    $stmt->bindParam(':Nom', $this->Nom);
			    $stmt->bindParam(':Prenom', $this->Prenom);			   
			    

			    // execute the query
			    if($stmt->execute()){
			         //true;
			         return true;
			    }			 
			     return false ;
			}
		
	    public function update_user(){		

			    // update query
			    $query = "UPDATE
			                " . $this->table_name . "
			            SET
			                user_mdp = :mdp,
			                user_tel = :Tel,
			                user_mail = :Mail,
			                user_adresse = :Adresse,
			                user_titre = :Titre,
			                user_description = :Description,
			                user_login = :login,
			                user_type = :type,
			                user_nom = :Nom,
			                user_prenom = :Prenom
			            WHERE
			                user_id = :user_id ";
			 
			// echo $query;
			    // prepare query statement
			    $stmt = $this->conn->prepare($query);
			 
			    // sanitize
			    $this->id_user=htmlspecialchars(strip_tags($this->id_user));
			    $this->mdp=htmlspecialchars(strip_tags($this->mdp));
			    $this->Tel=htmlspecialchars(strip_tags($this->Tel));
			    $this->Mail=htmlspecialchars(strip_tags($this->Mail));
			    $this->Adresse=htmlspecialchars(strip_tags($this->Adresse));
			    $this->Description=htmlspecialchars(strip_tags($this->Description));
			    $this->login=htmlspecialchars(strip_tags($this->login));
			    $this->type=htmlspecialchars(strip_tags($this->type));
			    $this->Nom=htmlspecialchars(strip_tags($this->Nom));
			    $this->Prenom=htmlspecialchars(strip_tags($this->Prenom));
			    $this->Titre=htmlspecialchars(strip_tags($this->Titre));

			    // bind new values
			    $stmt->bindParam(':id_user', $this->id_user);
			    $stmt->bindParam(':mdp', $this->mdp);
			    $stmt->bindParam(':Tel', $this->Tel);
			    $stmt->bindParam(':Mail', $this->Mail);
		        $stmt->bindParam(':Adresse', $this->Adresse);    
		        $stmt->bindParam(':Titre', $this->Titre);
			    $stmt->bindParam(':Description', $this->Description);
			    $stmt->bindParam(':login', $this->login);
			    $stmt->bindParam(':type', $this->type);
			    $stmt->bindParam(':Nom', $this->Nom);
			    $stmt->bindParam(':Prenom', $this->Prenom);			   
			    

			    // execute the query
			    if($stmt->execute()){
			         //true;
			         return true;
			    }			 
			     return false ;
			}

    public function identification_user()
    {

        // update query
        $query = "SELECT
							user_id,
			                user_mdp ,
			                user_tel,
			                user_mail,
			                user_adresse,
			                user_titre,
			                user_description,
			                user_login,
			                user_type,
			                user_nom,
			                user_prenom,
							user_code_postal_id 
							
						FROM " . $this->table_name . "
			            WHERE
			                user_login = :login  AND
							user_mdp = :mdp 
						LIMIT 1 ";


        // echo $query;
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->mdp = htmlspecialchars(strip_tags($this->mdp));
        $this->login = htmlspecialchars(strip_tags($this->login));

        $stmt->bindParam(':mdp', $this->mdp);
        $stmt->bindParam(':login', $this->login);


        // execute the query
        if ($stmt->execute()) {
            // get retrieved row
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // set values to object properties
            $this->user_id = $row['user_id'];
            $this->user_code_postal_id = $row['user_code_postal_id'];

            $this->user_nom = $row['user_nom'];
            $this->user_mdp = $row['user_mdp'];
            $this->user_tel = $row['user_tel'];
            $this->user_adresse = $row['user_adresse'];
            $this->user_titre = $row['user_titre'];
            $this->user_description = $row['user_description'];
            $this->user_login = $row['user_login'];
            $this->user_type = $row['user_type'];
            $this->user_prenom = $row['user_prenom'];
            $this->user_mail = $row['user_mail'];

        }
        return false;
    }
			
	public function search($keywords){


    // select all query

 	$query = "Select * from users, code_postal where users.user_code_postal_id = code_postal.code_postal_id and code_postal.code_postal_departement_id ='".$keywords."'";

 
    // prepare query statement
    $stmt = $this->conn->prepare($query);

     // sanitize
	$keywords=htmlspecialchars(strip_tags($keywords));
 	$keywords = "%{$keywords}%";
 
    // bind
    $stmt->bindParam(":keywords", $keywords);
 
   // execute the query
			    if($stmt->execute()){
			         //true;
			         return $stmt;
			    }	
			    else {
			    	return false;
			    }		
    }
			
			
	}
?>