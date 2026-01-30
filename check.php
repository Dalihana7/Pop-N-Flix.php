<?php
echo "<h3>Test des configurations possibles :</h3>";

$tests = [
    ['user' => 'root', 'pass' => ''],      // Config WAMP classique
    ['user' => 'root', 'pass' => 'root'],  // Config MAMP classique
];

foreach ($tests as $test) {
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=imdb_movies", $test['user'], $test['pass']);
        echo "<p style='color:green'>✅ CA MARCHE AVEC : Utilisateur = '{$test['user']}' / Mot de passe = '{$test['pass']}'</p>";
        exit;
    } catch (PDOException $e) {
        echo "<p style='color:red'>❌ ECHEC AVEC : '{$test['user']}' / '{$test['pass']}' (Erreur : " . $e->getCode() . ")</p>";
    }
}
?>