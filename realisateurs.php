<?php
session_start();
require_once 'config/database.php';

$director_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Récupérer le nom du réalisateur
$stmt = $pdo->prepare("SELECT nom FROM realisateurs WHERE id = ?");
$stmt->execute([$director_id]);
$director = $stmt->fetch();

// Récupérer ses films
$stmt = $pdo->prepare("SELECT * FROM films WHERE realisateur_id = ?");
$stmt->execute([$director_id]);
$films = $stmt->fetchAll();

include 'includes/header.php';
?>

<main>
    <h2 class="section-title">Films de <?php echo htmlspecialchars($director['nom']); ?></h2>
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
