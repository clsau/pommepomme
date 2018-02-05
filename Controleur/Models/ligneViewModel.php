<?php

    class ligneViewModel
    {

        // database connection and table name
        public $ligne_id;
        public $ligne_commande_id;

        // object properties
        public $ligne_quantite;
        public $ligne_nom_produit;
        public $ligne_user_id;
        public $ligne_prix;
        public $client_nom;
        public $client_prenom;
        public $client_type;
        public $client_tel;
        public $client_mail;
        public $client_adresse;
        public $client_description;
        public $commande_id;
        public $commande_statut;
        public $commande_date_livraison;
        public $commande_lieu;
        public $commande_description;
        public $commande_contenance;
        public $prod_id;
        public $prod_login;
        public $prod_mdp;
        public $prod_type;
        public $prod_nom;
        public $prod_prenom;
        public $prod_tel;
        public $prod_mail;
        public $prod_adresse;
        public $prod_code_postal_id;
        public $prod_titre;
        public $prod_description;
        public $livreur_id;
        public $livreur_login;
        public $livreur_mdp;
        public $livreur_type;
        public $livreur_nom;
        public $livreur_prenom;
        public $livreur_tel;
        public $livreur_mail;
        public $livreur_adresse;
        public $livreur_code_postal_id;
        public $livreur_titre;
        public $livreur_description;
        private $conn;
        private $table_name = "ligne_commande_view";


        // constructor with $db as database connection

        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function get_ligne_by_user_id()
        {
            // update query
            $query = "SELECT *
					  FROM " . $this->table_name . "
					  WHERE ligne_user_id = :ligne_user_id";

            // echo $query;
            // prepare query statement
            $stmt = $this->conn->prepare($query);

            // sanitize
            $this->ligne_user_id = htmlspecialchars(strip_tags($this->ligne_user_id));
            $stmt->bindParam(':ligne_user_id', $this->ligne_user_id);

            // execute the query
            if ($stmt->execute()) {
                // get retrieved row
                return $stmt->fetchAll();
            }
            return false;
        }
    }

?>