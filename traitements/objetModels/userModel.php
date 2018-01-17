<?php 
class userModel{
	 
	    // database connection and table name
	    private $conn;
	    private $table_name = "user";
	 
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
			                mdp = :mdp,
			                Tel = :Tel,
			                Mail = :Mail,
			                Adresse = :Adresse,
			                Titre = :Titre,
			                Description = :Description,
			                login = :login,
			                type = :type,
			                Nom = :Nom,
			                Prenom = :Prenom ";
			 
			// echo $query;
			    // prepare query statement
			    $stmt = $this->conn->prepare($query);
			    // sanitize
			    //$this->id_user=htmlspecialchars(strip_tags($this->id_user));
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
			                mdp = :mdp,
			                Tel = :Tel,
			                Mail = :Mail,
			                Adresse = :Adresse,
			                Titre = :Titre,
			                Description = :Description,
			                login = :login,
			                type = :type,
			                Nom = :Nom,
			                Prenom = :Prenom
			            WHERE
			                id_user = :id_user ";
			 
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
	}
?>