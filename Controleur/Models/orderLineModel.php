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
        public $ligne_nom_produit;
        public $ligne_prix;
        public $ligne_quantite;
        public $ligne_commande_id;
        private $conn;
        private $table_name = "ligne";


        // constructor with $db as database connection

        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function create_line()
        {
            $query = 'INSERT INTO
			                ' . $this->table_name . '
			            SET
			                ligne_id = NULL,
			                ligne_nom_produit = :ligne_nom_produit,
			                ligne_prix = :ligne_prix,
			                ligne_user_id = :ligne_user_id,
			                ligne_produit_id = :ligne_produit_id,
			                ligne_quantite = :ligne_quantite,
			                ligne_commande_id = :ligne_commande_id;';

            $query_info = 'SELECT produit_nom, produit_prix, produit_unite, produit_valeur_unite FROM produit  WHERE produit_id = :produit_id';

            $query_jean = 'SELECT * FROM commande WHERE commande_id = :commande_id';
            // prepare query statement
            $quid = $this->conn->prepare($query_info);
            $quid->bindParam(':produit_id', $this->ligne_produit_id);
            $quid->execute();


            $quje = $this->conn->prepare($query_jean);
            $quje->bindParam(':commande_id', $this->ligne_commande_id);
            $quje->execute();
            $row = $quje->fetchObject();
            if ($row->commande_client != $this->ligne_user_id) {
                if ($row->commande_contenance == $this->ligne_quantite) {
                    $query_update = "UPDATE commande 
                                      SET commande_contenance = commande_contenance - :quantite,
                                      commande_statut = 'Fermée' 
                                      WHERE commande_id = :commande_id";
                    $response = "plein";
                } else {
                    $query_update = 'UPDATE commande SET commande_contenance = commande_contenance - :quantite WHERE commande_id = :commande_id';
                    $response = "place";
                    $_SESSION['contenance' . $this->ligne_commande_id] = $row->commande_contenance - $this->ligne_quantite;
                }
                $quqt = $this->conn->prepare($query_update);
                $quqt->bindParam(':quantite', $this->ligne_quantite);
                $quqt->bindParam(':commande_id', $this->ligne_commande_id);
                $quqt->execute();
            } else {
                $response = "place";
				$_SESSION['contenance' . $this->ligne_commande_id] = 20;
            }
            $row = $quid->fetchObject();
            $stmt = $this->conn->prepare($query);
            // sanitize
            $this->ligne_user_id = htmlspecialchars(strip_tags($this->ligne_user_id));
            $this->ligne_produit_id = htmlspecialchars(strip_tags($this->ligne_produit_id));
            $this->ligne_quantite = htmlspecialchars(strip_tags($this->ligne_quantite));
            $this->ligne_commande_id = htmlspecialchars(strip_tags($this->ligne_commande_id));
            // bind new values
            $nom = $row->produit_nom . ' par lot de ' . $row->produit_valeur_unite . $row->produit_unite;
            $stmt->bindParam(':ligne_nom_produit', $nom);
            $stmt->bindParam(':ligne_prix', $row->produit_prix);
            $stmt->bindParam(':ligne_user_id', $this->ligne_user_id);
            $stmt->bindParam(':ligne_produit_id', $this->ligne_produit_id);
            $stmt->bindParam(':ligne_quantite', $this->ligne_quantite);
            $stmt->bindParam(':ligne_commande_id', $this->ligne_commande_id);
            // execute the query
            if ($stmt->execute())
                return $response;
            print_r($stmt->errorInfo());
            return null;
        }
    }

?>