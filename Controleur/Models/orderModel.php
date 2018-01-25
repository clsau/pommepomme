<?php

class orderModel
{
    public $commande_id;
    public $commande_statut;
    public $commande_date_livraison;
    public $commande_lieu;
    public $commande_description;
    public $commande_producteur;
    public $commande_contenance;
    public $commande_client;
    private $conn;
    private $table_name = "commande";


    // constructor with $db as database connection

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create_order()
    {
        $query = 'INSERT INTO
			                ' . $this->table_name . '
			            SET
			                commande_id = NULL,
			                commande_statut = :commande_statut,
			                commande_date_livraison = :commande_date_livraison,
			                commande_lieu = :commande_lieu,
			                commande_description = :commande_description,
			                commande_producteur = :commande_producteur,
			                 commande_contenance = :commande_contenance,
			                 commande_client = :commande_client;';
        $query_id = 'SELECT user_id FROM users  WHERE user_login = :produit_user_login';

        // prepare query statement
        $quid = $this->conn->prepare($query_id);
        $quid->bindParam(':produit_user_login', $_SESSION['Pseudo']);
        $quid->execute();
        $row = $quid->fetchObject();


        $stmt = $this->conn->prepare($query);
        // sanitize
        $this->commande_statut = htmlspecialchars(strip_tags($this->commande_statut));
        $this->commande_date_livraison = htmlspecialchars(strip_tags($this->commande_date_livraison));
        $this->commande_lieu = htmlspecialchars(strip_tags($this->commande_lieu));
        $this->commande_description = htmlspecialchars(strip_tags($this->commande_description));
        $this->commande_producteur = htmlspecialchars(strip_tags($this->commande_producteur));
        $this->commande_contenance = htmlspecialchars(strip_tags($this->commande_contenance));


        // bind new values
        $stmt->bindParam(':commande_statut', $this->commande_statut);
        $stmt->bindParam(':commande_date_livraison', $this->commande_date_livraison);
        $stmt->bindParam(':commande_lieu', $this->commande_lieu);
        $stmt->bindParam(':commande_description', $this->commande_description);
        $stmt->bindParam(':commande_producteur', $this->commande_producteur);
        $stmt->bindParam(':commande_contenance', $this->commande_contenance);
        $stmt->bindParam(':commande_client', $row->user_id);
        // execute the query
        if ($stmt->execute())
            return true;
        print_r($stmt->errorInfo());
        return false;
    }
}

?>