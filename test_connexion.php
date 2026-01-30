<?php
// Test de connexion MySQL simple

$host = 'localhost';
$user = 'root';
$pass = '';

echo "<h1>Test de connexion MySQL</h1>";

try {
    // Connexion sans base de données spécifique
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    echo "<p style='color: green;'>✅ Connexion à MySQL réussie !</p>";
    
    // Tester si la base imdb_movies existe
    $pdo->exec("USE imdb_movies");
    echo "<p style='color: green;'>✅ Base de données 'imdb_movies' trouvée !</p>";
    
} catch (PDOException $e) {
    echo "<p style='color: red;'>❌ Erreur : " . $e->getMessage() . "</p>";
}
?>
```

---

### **3. Enregistre (`Ctrl+S`)**

---

### **4. Va sur :**
```
http://localhost/php-projet/test_connexion.php