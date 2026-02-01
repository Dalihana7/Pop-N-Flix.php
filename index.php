<?php
session_start();
// On se connecte à la base de données
require_once 'config/database.php';

// On récupère tous les films de la table 'films'
//$query = $pdo->query("SELECT * FROM films ORDER BY created_at DESC");
$query = $pdo->query("SELECT * FROM films ORDER BY id DESC");
$films = $query->fetchAll();

include 'includes/header.php'; 
?>

<main>
    <h2 class="section-title">Films tendance du moment</h2>
    <div class="grid-separator"></div>
    
    <div id="movie-container" class="movie-grid">
        <?php if (count($films) > 0): ?>
            <?php foreach ($films as $film): ?>
                <div class="movie-card">
                    <a href="movie.php?id=<?php echo $film['id']; ?>" class="movie-card-link">
                        <?php if (!empty($film['image_url'])): ?>
                            <img src="<?php echo htmlspecialchars($film['image_url']); ?>" alt="<?php echo htmlspecialchars($film['titre'] ?? ''); ?>">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/300x450?text=No+Image" alt="<?php echo htmlspecialchars($film['titre'] ?? ''); ?>">
                        <?php endif; ?>
                        
                        <div class="movie-info-bottom">
                            <h3><?php echo htmlspecialchars($film['titre'] ?? 'Sans titre'); ?></h3>
                            <p>Prix : <?php echo isset($film['prix']) ? number_format($film['prix'], 2) : '0.00'; ?>€</p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align:center; grid-column: 1/-1;">Aucun film trouvé dans la base de données.</p>
        <?php endif; ?>
    </div>
</main>

<?php include 'includes/footer.php'; ?>
