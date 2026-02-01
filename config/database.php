<?php
$host = 'localhost';
$db   = 'imdb_movies';
$user = 'root';
$password = 'root';
$port = '8889'; // port pr défaut de mamp(pour moin mac)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;port=$port",$user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
