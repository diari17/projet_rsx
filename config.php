<?php
$host = 'localhost';
$dbname = 'smarttec';
$username = 'root'; // Remplace par ton nom d'utilisateur MySQL
$password = ''; // Remplace par ton mot de passe MySQL

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>