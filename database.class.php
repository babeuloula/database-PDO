<?php

    if ($_SERVER['SERVER_ADDR'] == "127.0.0.1") {
        // Local
        define("DB_HOST", "localhost");
        define("DB_NAME", "babeuloula");
        define("DB_USER", "root");
        define("DB_PASS", "");
    } else {
        // Production
        define("DB_HOST", "");
        define("DB_NAME", "");
        define("DB_USER", "");
        define("DB_PASS", "");
    }

    class database extends PDO {

        private $dbhost = DB_HOST;
        private $dbname = DB_NAME;
        private $dbuser = DB_USER;
        private $dbpass = DB_PASS;
        private $erreur = "";
        private $conn;
        private $db;

        public function __construct() {
            if (!$this->conn) {
                try {
                    $this->db = new PDO('mysql:host=' . $this->dbhost . ';dbname=' . $this->dbname, $this->dbuser, $this->dbpass);
                    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $this->db->exec('SET NAMES utf8');
                    $this->conn = true;
                    return $this->conn;
                } catch (PDOException $e) {
                    $this->erreur = $e->getMessage();
                    $this->conn = false;
                    return $this->conn;
                }
            } else {
                return $this->conn = true;
            }
        }

        public function getDataBase() {
            return $this->db;
        }

        public function getErreur() {
            return $this->erreur;
        }

    }

?>
