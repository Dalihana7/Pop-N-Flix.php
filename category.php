<?php
session_start();
require_once 'config/database.php';

$genre = isset($_GET['type']) ? $_GET['type'] : 'Action';

$stmt = $pdo->prepare("SELECT * FROM films WHERE categorie = ?");
$stmt->execute([$genre]);
$films = $stmt->fetchAll();

include 'includes/header.php';
?>

<main>
    <h2 class="section-title">Catégorie : <?php echo htmlspecialchars($genre); ?></h2>
    <div class="grid-separator"></div>
    
    <div class="movie-grid">
        <?php foreach ($films as $film): ?>
            <div class="movie-card">
                <a href="movie.php?id=<?php echo $film['id']; ?>">
                    <img src="<?php echo $film['image_url']; ?>" alt="Film">
                    <div class="movie-info-bottom">
                        <h3><?php echo htmlspecialchars($film['titre']); ?></h3>
                        <p><?php echo $film['prix']; ?>€</p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include 'includes/footer.php'; ?>