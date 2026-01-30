<?php
session_start();
require_once 'config/database.php';

// 1. Récupérer l'ID du film dans l'URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// 2. Chercher les infos du film et du réalisateur dans la base
$stmt = $pdo->prepare("
    SELECT f.*, r.nom AS realisateur_nom
    FROM films f 
    LEFT JOIN realisateurs r ON f.realisateur_id = r.id
    WHERE f.id = ?
");
$stmt->execute([$id]);
$film = $stmt->fetch();

// Si le film n'existe pas, on redirige vers l'accueil
if (!$film) { header('Location: index.php'); exit; }

include 'includes/header.php'; 
?>

<main>
    <div id="movie-details">
        <section class="movie-hero" style="display: flex; gap: 40px; padding: 50px; align-items: center;">
            <img src="<?php echo htmlspecialchars($film['image_url']); ?>" class="details-poster" alt="Affiche" style="width: 350px; border-radius: 10px; box-shadow: 0 0 20px rgba(0,0,0,0.5);">
            
            <div class="details-text">
                <h1 class="movie-title-header" style="text-align: left; margin: 0;"><?php echo htmlspecialchars($film['titre']); ?></h1>
                
                <p class="tagline" style="font-size: 1.2rem; margin: 20px 0;">
                    Réalisateur : 
                    <a href="director.php?id=<?php echo $film['realisateur_id']; ?>" style="color:var(--netflix-yellow); text-decoration: none;">
                        <?php echo htmlspecialchars($film['realisateur_nom']); ?>
                    </a>
                </p>
                
                <p class="overview" style="color: #ccc; line-height: 1.6; max-width: 600px;">
                    <?php echo htmlspecialchars($film['description']); ?>
                </p>
                
                <p class="price" style="font-size:2rem; color:var(--netflix-yellow); font-weight: bold; margin: 30px 0;">
                    <?php echo number_format($film['prix'], 2); ?>€
                </p>

                <form method="POST" action="panier.php">
                    <input type="hidden" name="film_id" value="<?php echo $film['id']; ?>">
                    <button type="submit" name="ajouter_panier" class="btn-add-cart" style="padding: 15px 30px; cursor: pointer;">
                        Ajouter au panier
                    </button>
                </form>
            </div>
        </section>
    </div>
</main>

<?php include 'includes/footer.php'; ?>