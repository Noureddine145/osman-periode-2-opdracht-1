<?php

class Database {
    public $pdo;

    public function __construct($db = "winkel" , $user="root" , $pass="", $host="localhost:3307") {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "connected to database $db";
        } catch(PDOExceprion $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function insertUser($a, $b) {
        $sql = "INSERT INTO account VALUES (null, :gebruikersnaam, :password)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':gebruikersnaam' => $a, ':password' => $b]);
    }
}

?>