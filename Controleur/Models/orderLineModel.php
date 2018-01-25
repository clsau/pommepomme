<?php
/**
 * Created by IntelliJ IDEA.
 * User: Elhevan
 * Date: 25/01/2018
 * Time: 15:24
 */

class orderLineModel
{
    public $ligne_id;
    public $ligne_user_id;
    public $ligne_produit_id;
    public $ligne_quantite;
    public $ligne_commande_id;
    private $conn;
    private $table_name = "ligne";


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
			                ligne_id = NULL,
			                ligne_user_id = :ligne_user_id,
			                ligne_produit_id = :ligne_produit_id,
			                ligne_quantite = :ligne_quantite,
			                ligne_commande_id = :ligne_commande_id;';
        $query_id = 'SELECT user_id FROM users  WHERE user_login = :produit_user_login';

        // prepare query statement
        $quid = $this->conn->prepare($query_id);
        $quid->bindParam(':produit_user_login', $_SESSION['Pseudo']);
        $quid->execute();
        $row = $quid->fetchObject();


        $stmt = $this->conn->prepare($query);
        // sanitize
        $this->ligne_user_id = htmlspecialchars(strip_tags($this->ligne_user_id));
        $this->ligne_produit_id = htmlspecialchars(strip_tags($this->ligne_produit_id));
        $this->ligne_quantite = htmlspecialchars(strip_tags($this->ligne_quantite));
        $this->ligne_commande_id = htmlspecialchars(strip_tags($this->ligne_commande_id));


        // bind new values
        $stmt->bindParam(':ligne_user_id', $this->ligne_user_id);
        $stmt->bindParam(':ligne_produit_id', $this->ligne_produit_id);
        $stmt->bindParam(':ligne_quantite', $this->ligne_quantite);
        $stmt->bindParam(':ligne_commande_id', $this->ligne_commande_id);
        $stmt->bindParam(':commande_client', $row->user_id);
        // execute the query
        if ($stmt->execute())
            return true;
        print_r($stmt->errorInfo());
        return false;
    }
}

?>