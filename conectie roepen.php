<?php
include ("databese-conectie.php");
$database = new Database();

try {
    $database->insertUser("ensar", "ensar");
    echo "Succes";
} catch (PDOException $e) {
    echo "Error inserting' . ".$e->getmessage();
}
?>