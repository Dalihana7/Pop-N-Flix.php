<?php
session_start();
require_once 'config/database.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$stmt = $pdo->prepare("
    SELECT films.*, 
           IFNULL(realisateurs.nom, 'Inconnu') AS nom_realisateur,
           realisateurs.url_tmdb AS realisateur_url
    FROM films 
    LEFT JOIN realisateurs ON films.realisateur_id = realisateurs.id 
    WHERE films.id = ?
");
$stmt->execute([$id]);
$film = $stmt->fetch();

if (!$film) {
    header('Location: index.php');
    exit;
}

$query_acteurs = $pdo->prepare("
    SELECT a.* FROM acteurs a
    JOIN films_acteurs fa ON a.id = fa.acteur_id
    WHERE fa.film_id = ?
");
$query_acteurs->execute([$id]);
$acteurs = $query_acteurs->fetchAll();

include 'includes/header.php';
?>

<main class="movie-details-main" style="background: #141414; color: white; padding: 60px 20px; min-height: 100vh;">
    
    <div style="max-width: 1100px; margin: 0 auto; display: flex; gap: 50px; flex-wrap: wrap;">
        
        <div style="flex: 1; min-width: 300px; max-width: 350px;">
            <div style="height: 500px; background: #222; border-radius: 12px; overflow: hidden; border: 1px solid #333; box-shadow: 0 15px 35px rgba(0,0,0,0.7);">
                <img src="<?= htmlspecialchars($film['image_url'] ?? '') ?>" 
                     alt="Affiche"
                     style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        </div>

        <div style="flex: 2; min-width: 350px;">
            <h1 class="film-title">
                <?= htmlspecialchars($film['titre'] ?? 'Sans titre') ?>
            </h1>

            <p style="font-size: 1.5rem; color: #e50914; font-weight: bold; margin-bottom: 25px;">
                <?= number_format((float)($film['prix'] ?? 0), 2) ?> €
            </p>
            
            <p style="font-size: 1.1rem; line-height: 1.8; color: #ccc; margin-bottom: 30px;">
                <?= htmlspecialchars($film['description'] ?? 'Pas de description.') ?>
            </p>

            <div style="background: rgba(255,255,255,0.05); padding: 25px; border-radius: 10px; border-left: 4px solid #e50914; margin-bottom: 30px;">
                <p><strong>Réalisateur :</strong> 
                    <?php if (!empty($film['realisateur_url'])): ?>
                        <a href="<?= htmlspecialchars($film['realisateur_url']) ?>" target="_blank" style="color: #e50914; text-decoration: none;">
                            <?= htmlspecialchars($film['nom_realisateur']) ?>
                        </a>
                    <?php else: ?>
                        <a href="realisateurs.php?id=<?= $film['realisateur_id'] ?>" style="color: #e50914; text-decoration: none;">
                            <?= htmlspecialchars($film['nom_realisateur']) ?>
                        </a>
                    <?php endif; ?>
                </p>
                <p><strong>Acteurs :</strong> 
                    <span style="color: #bbb;">
                        <?php 
                        $noms = array_map(fn($a) => htmlspecialchars($a['prenom'] . " " . $a['nom']), $acteurs);
                        echo !empty($noms) ? implode(', ', $noms) : "Non renseigné";
                        ?>
                    </span>
                </p>
            </div>

            <div style="display: flex; gap: 30px; align-items: center;">
                <form action="panier.php" method="POST">
                    <input type="hidden" name="film_id" value="<?= $film['id'] ?>">
                    <button type="submit" name="ajouter_panier" class="btn-add-cart">
                        AJOUTER AU PANIER
                    </button>
                </form>

                <?php if (!empty($film['trailer_id'])): ?>
                    <a href="#play" class="trailer-link-text">
                        <span style="font-size: 1.5rem;">▶</span>
                        <span class="text">BANDE-ANNONCE</span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php if (!empty($film['trailer_id'])): ?>
<div id="play" class="modal-netflix">
    <div class="modal-frame">
        <a href="#!" class="btn-close" style="color:#fff; text-decoration:none; float:right; margin-bottom:10px;">✖ FERMER</a>
        <div class="aspect-16-9">
            <iframe src="https://www.youtube.com/embed/<?= htmlspecialchars($film['trailer_id']) ?>" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</div>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
