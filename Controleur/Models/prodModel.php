<?php

class prodModel
{
    public $produit_user_id;
    public $produit_nom;
    public $produit_user_login;
    public $produit_description;
    public $produit_photo;
    public $produit_prix;
    public $produit_stock;
    public $produit_unite;
    public $produit_valeur_unite;
    public $produit_categorie_id;
    private $conn;
    private $table_name = "produit";


    // constructor with $db as database connection

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create_product()
    {
        $query = 'INSERT INTO
			                ' . $this->table_name . '
			            SET
			                produit_id = NULL,
			                produit_user_id = :produit_user_id,
			                produit_nom = :produit_nom,
			                produit_description = :produit_description,
			                produit_photo = :produit_photo,
			                produit_prix = :produit_prix,
			                 produit_stock = :produit_stock,
			                 produit_unite = :produit_unite,
			                 produit_valeur_unite = :produit_valeur_unite,
			                produit_categorie_id = :produit_categorie_id;';
        $query_id = 'SELECT user_id FROM users  WHERE user_login = :produit_user_login';

        // prepare query statement
        $quid = $this->conn->prepare($query_id);
        $quid->bindParam(':produit_user_login', $this->produit_user_login);
        $quid->execute();
        $row = $quid->fetchObject();


        $stmt = $this->conn->prepare($query);
        // sanitize
        $this->produit_nom = htmlspecialchars(strip_tags($this->produit_nom));
        $this->produit_description = htmlspecialchars(strip_tags($this->produit_description));
        $this->produit_photo = htmlspecialchars(strip_tags($this->produit_photo));
        $this->produit_prix = htmlspecialchars(strip_tags($this->produit_prix));
        $this->produit_stock = htmlspecialchars(strip_tags($this->produit_stock));
        $this->produit_unite = htmlspecialchars(strip_tags($this->produit_unite));
        $this->produit_valeur_unite = htmlspecialchars(strip_tags($this->produit_valeur_unite));
        $this->produit_categorie_id = htmlspecialchars(strip_tags($this->produit_categorie_id));

        // bind new values
        $stmt->bindParam(':produit_user_id', $row->user_id);
        $stmt->bindParam(':produit_nom', $this->produit_nom);
        $stmt->bindParam(':produit_description', $this->produit_description);
        $stmt->bindParam(':produit_photo', $this->produit_photo);
        $stmt->bindParam(':produit_prix', $this->produit_prix);
        $stmt->bindParam(':produit_stock', $this->produit_stock);
        $stmt->bindParam(':produit_unite', $this->produit_unite);
        $stmt->bindParam(':produit_valeur_unite', $this->produit_valeur_unite);
        $stmt->bindParam(':produit_categorie_id', $this->produit_categorie_id);

        // execute the query
        if ($stmt->execute())
            return true;
        print_r($stmt->errorInfo());
        return false;
    }

    public function update_product()
    {
        // update query
        $query = "UPDATE
			                " . $this->table_name . "
			            SET
			                produit_user_id = :produit_user_id,
			                NomProduit = :NomProduit,
			                Produit_description = :Produit_description,
			                Produit_photo = :Produit_photo,
			                Produit_prix = :Produit_prix,
			                Produit_stock = :Produit_stock,
			                Produit_unite = :Produit_unite,
			                Produit_valeur_unite = :Produit_valeur_unite,
			                Produit_categorie_id = :Produit_categorie_id
			            WHERE
			                produit_id = :produit_id ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->produit_id = htmlspecialchars(strip_tags($this->produit_id));
        $this->produit_user_id = htmlspecialchars(strip_tags($this->produit_user_id));
        $this->NomProduit = htmlspecialchars(strip_tags($this->NomProduit));
        $this->Produit_description = htmlspecialchars(strip_tags($this->Produit_description));
        $this->Produit_photo = htmlspecialchars(strip_tags($this->Produit_photo));
        $this->Produit_prix = htmlspecialchars(strip_tags($this->Produit_prix));
        $this->Produit_stock = htmlspecialchars(strip_tags($this->Produit_stock));
        $this->Produit_unite = htmlspecialchars(strip_tags($this->Produit_unite));
        $this->Produit_valeur_unite = htmlspecialchars(strip_tags($this->Produit_valeur_unite));
        $this->Produit_categorie_id = htmlspecialchars(strip_tags($this->Produit_categorie_id));

        // bind new values
        $stmt->bindParam(':id_user', $this->produit_id);
        $stmt->bindParam(':produit_user_id', $this->produit_user_id);
        $stmt->bindParam(':NomProduit', $this->NomProduit);
        $stmt->bindParam(':Produit_description', $this->Produit_description);
        $stmt->bindParam(':Produit_photo', $this->Produit_photo);
        $stmt->bindParam(':Produit_stock', $this->Produit_stock);
        $stmt->bindParam(':Produit_unite', $this->Produit_unite);
        $stmt->bindParam(':Produit_valeur_unite', $this->Produit_valeur_unite);
        $stmt->bindParam(':Produit_categorie_id', $this->Produit_categorie_id);


        // execute the query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read_products()
    {
        $query = 'SELECT * FROM 
			                ' . $this->table_name . '
			            WHERE
			              
			                produit_user_id = :produit_user_id';

        $query_id = 'SELECT user_id FROM users  WHERE user_login = :produit_user_login';

        // prepare query statement
        $quid = $this->conn->prepare($query_id);
        $quid->bindParam(':produit_user_login', $this->produit_user_login);
        $quid->execute();
        $row = $quid->fetchObject();
        $stmt = $this->conn->prepare($query);


        $stmt->bindParam(':produit_user_id', $row->user_id);

        if ($stmt->execute())
            return $stmt->fetchAll();
        print_r($stmt->errorInfo());
        return null;

    }
}

?>