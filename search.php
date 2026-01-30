<?php
session_start();
require_once 'config/database.php';

// On récupère la recherche de l'utilisateur
$search = isset($_GET['query']) ? trim($_GET['query']) : '';
$films = [];

if (!empty($search)) {
    // On cherche dans les titres de films OU dans les noms de réalisateurs
    $stmt = $pdo->prepare("
        SELECT f.*, r.nom as realisateur_nom 
        FROM films f 
        LEFT JOIN realisateurs r ON f.realisateur_id = r.id 
        WHERE f.titre LIKE ? OR r.nom LIKE ?
    ");
    $stmt->execute(["%$search%", "%$search%"]);
    $films = $stmt->fetchAll();
} else {
    // Si pas de recherche, on peut afficher les derniers films par défaut
    $query = $pdo->query("SELECT * FROM films ORDER BY created_at DESC LIMIT 10");
    $films = $query->fetchAll();
}

include 'includes/header.php'; 
?>

<main>
    <div class="search-container">
        <h2 class="search-title"><?php echo $search ? "Résultats pour : " . htmlspecialchars($search) : "Cherchez votre film"; ?></h2>
        
        <form action="search.php" method="GET">
            <input type="text" name="query" id="search-input" 
                placeholder="Titre ou réalisateur..." 
                value="<?php echo htmlspecialchars($search); ?>" 
                autocomplete="off">
        </form>
    </div>
    
    <div class="grid-separator"></div>

    <div id="search-results" class="movie-grid">
        <?php if (count($films) > 0): ?>
            <?php foreach ($films as $film): ?>
                <div class="movie-card">
                    <a href="movie.php?id=<?php echo $film['id']; ?>" class="movie-card-link">
                        <img src="<?php echo htmlspecialchars($film['image_url']); ?>" alt="<?php echo htmlspecialchars($film['titre']); ?>">
                        <div class="movie-info-bottom">
                            <h3><?php echo htmlspecialchars($film['titre']); ?></h3>
                            <p>Prix : <?php echo number_format($film['prix'], 2); ?>€</p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div style="text-align:center; grid-column: 1/-1; padding: 50px;">
                <p style="font-size: 1.2rem; color: #888;">Aucun film ne correspond à votre recherche "<?php echo htmlspecialchars($search); ?>".</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php include 'includes/footer.php'; ?>