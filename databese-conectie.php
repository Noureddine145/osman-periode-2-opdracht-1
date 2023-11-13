<?php

class Database {
    public $pdo;

    public function __construct($db = "winkel" , $user="root" , $pass="", $host="localhost") {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "connected to database $db";
        } catch(PDOExceprion $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>