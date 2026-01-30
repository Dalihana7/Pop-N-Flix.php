<?php
$host = 'localhost';
$db   = 'imdb_movies';
$user = 'root';

// Détection automatique : 'root' sur Mac, vide sur Windows
$pass = (PHP_OS == 'Darwin') ? 'root' : ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Si la détection auto échoue, on force l'autre option par précaution
    try {
        $backup_pass = ($pass == 'root') ? '' : 'root';
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $backup_pass);
    } catch (PDOException $e2) {
        die("Erreur de connexion : " . $e2->getMessage());
    }
}
?>