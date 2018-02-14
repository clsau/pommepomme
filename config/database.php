<?php

// Classe database permettant la connextion à la base de donnée
    class database
    {

        // specify your own database credentials
        public $conn;
        private $host = "localhost";
        private $db_name = "Pomme";
        private $username = "root";
        private $password = "";

        // get the database connection

        public function getConnection()
        {

            $this->conn = null;

            try {
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            } catch (PDOException $exception) {
                echo "Erreur de connexion: " . $exception->getMessage();
            }

            return $this->conn;
        }
    }


?>