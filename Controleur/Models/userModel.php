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
			                user_tel = :Tel,
			                user_mail = :Mail,
			                user_adresse = :Adresse,
			                user_description = :Description,
			                user_type = :type,
							user_titre = :Titre
			             
			            WHERE
			                user_login = :login ";
			    // prepare query statement
			    $stmt = $this->conn->prepare($query);
			    // sanitize
			    $this->Tel=htmlspecialchars(strip_tags($this->Tel));
			    $this->Mail=htmlspecialchars(strip_tags($this->Mail));
			    $this->Adresse=htmlspecialchars(strip_tags($this->Adresse));
			    $this->Description=htmlspecialchars(strip_tags($this->Description));
			    $this->type=htmlspecialchars(strip_tags($this->type));
			    $this->Titre=htmlspecialchars(strip_tags($this->Titre));

			    // bind new values
			    $stmt->bindParam(':Tel', $this->Tel);
			    $stmt->bindParam(':Mail', $this->Mail);
            $stmt->bindParam(':Adresse', $this->Adresse);
            $stmt->bindParam(':Description', $this->Description);
            $stmt->bindParam(':type', $this->type);
            $stmt->bindParam(':Titre', $this->Titre);
            $stmt->bindParam(':login', $this->login);
			    

			    // execute the query
			    if($stmt->execute()){
			         return true;
                }
            print_r($stmt->errorInfo());
			     return false ;
			}
	}

?>"