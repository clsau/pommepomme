<?php

    class favorisModel
    {
        public $favoris_producteur;
        public $user_nom;

        // object properties
        public $user_prenom;
        public $user_titre;
        public $code_postal_commune;
        public $favoris_client;
        private $conn;
        private $table_name = "favoris_view";


        // constructor with $db as database connection

        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function get_favoris_by_user_id($user_id)
        {


            $query = " SELECT * FROM favoris_view WHERE favoris_client=:user_id";


            // prepare query statement
            $stmt = $this->conn->prepare($query);

            // sanitize
            $favoris_client = htmlspecialchars(strip_tags($user_id));
            $stmt->bindParam(":user_id", $favoris_client);

            // execute the query
            if ($stmt->execute()) {
                //true;
                return $stmt;
            } else {
                return false;
            }
        }
    }