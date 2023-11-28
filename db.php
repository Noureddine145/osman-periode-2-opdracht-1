<?php

class Database {
    public $pdo;

    public function __construct($db = "winkel" , $user="root" , $pass="", $host="localhost:3307") {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOExceprion $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function insertUser($email, $password) {
        $stmt = $this->pdo->prepare("INSERT INTO account (email, password) values (?, ?)");
        $stmt ->execute([$email, $password]);
    }
    // public function selectUser() {
    //     $stmt = $this->pdo->query("SELECT * FROM account");
    //     $result = $stmt->fetchAll();
    //     return $result;
    // } {
    //     $stmt = $this->pdo->prepare("SELECT * FROM account WHERE id = ?");
    //     $stmt-> execute([$id]);
    //     $result = $stmt->fetch();
    //     return $result;
    // }
    public function selectUser() {
        if (empty($id)) { 
            $stmt = $this->pdo->query("SELECT * FROM account");
            $result = $stmt->fetchAll();
            return $result;

        } else {
         $stmt = $this->pdo->prepare("SELECT * FROM account WHERE id = ?");
         $stmt-> execute([$id]);
         $result = $stmt->fetch();
         return $result;
        }
}
}
?>