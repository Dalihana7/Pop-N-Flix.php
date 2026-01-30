<?php
session_start();
require_once 'config/database.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['utilisateur_id'])) {
    header('Location: connexion.php');
    exit;
}

$utilisateur_id = $_SESSION['utilisateur_id'];
$message = '';

// Ajouter au panier
if (isset($_POST['ajouter_panier'])) {
    $film_id = (int)$_POST['film_id'];
    
    // Vérifier si le film est déjà dans le panier
    $stmt = $pdo->prepare("SELECT * FROM panier WHERE utilisateur_id = ? AND film_id = ?");
    $stmt->execute([$utilisateur_id, $film_id]);
    
    if ($stmt->fetch()) {
        $message = "Ce film est déjà dans votre panier.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO panier (utilisateur_id, film_id) VALUES (?, ?)");
        if ($stmt->execute([$utilisateur_id, $film_id])) {
            $message = "Film ajouté au panier !";
        }
    }
}

// Supprimer du panier
if (isset($_POST['supprimer_panier'])) {
    $panier_id = (int)$_POST['panier_id'];
    $stmt = $pdo->prepare("DELETE FROM panier WHERE id = ? AND utilisateur_id = ?");
    $stmt->execute([$panier_id, $utilisateur_id]);
    $message = "Film retiré du panier.";
}

// Vider le panier
if (isset($_POST['vider_panier'])) {
    $stmt = $pdo->prepare("DELETE FROM panier WHERE utilisateur_id = ?");
    $stmt->execute([$utilisateur_id]);
    $message = "Panier vidé.";
}

// Finaliser l'achat
if (isset($_POST['valider_achat'])) {
    // Récupérer les films du panier
    $stmt = $pdo->prepare("
        SELECT p.*, f.prix 
        FROM panier p 
        JOIN films f ON p.film_id = f.id 
        WHERE p.utilisateur_id = ?
    ");
    $stmt->execute([$utilisateur_id]);
    $films_panier = $stmt->fetchAll();
    
    if (count($films_panier) > 0) {
        // Calculer le montant total
        $montant_total = 0;
        foreach ($films_panier as $item) {
            $montant_total += $item['prix'] * $item['quantite'];
        }
        
        // Créer la commande
        $stmt = $pdo->prepare("INSERT INTO commandes (utilisateur_id, montant_total) VALUES (?, ?)");
        $stmt->execute([$utilisateur_id, $montant_total]);
        $commande_id = $pdo->lastInsertId();
        
        // Ajouter les détails de la commande
        foreach ($films_panier as $item) {
            $stmt = $pdo->prepare("INSERT INTO details_commandes (commande_id, film_id, prix, quantite) VALUES (?, ?, ?, ?)");
            $stmt->execute([$commande_id, $item['film_id'], $item['prix'], $item['quantite']]);
        }
        
        // Vider le panier
        $stmt = $pdo->prepare("DELETE FROM panier WHERE utilisateur_id = ?");
        $stmt->execute([$utilisateur_id]);
        
        $message = "Achat validé ! Montant total : " . number_format($montant_total, 2) . "€";
    }
}

// Récupérer les films du panier
$stmt = $pdo->prepare("
    SELECT p.id as panier_id, f.* 
    FROM panier p 
    JOIN films f ON p.film_id = f.id 
    WHERE p.utilisateur_id = ?
");
$stmt->execute([$utilisateur_id]);
$films_panier = $stmt->fetchAll();

// Calculer le total
$total = 0;
foreach ($films_panier as $film) {
    $total += $film['prix'];
}
?>

include 'includes/header.php'; 
?>

<main>
    <h2 class="section-title">Mon Panier</h2>
    <div class="grid-separator"></div>

    <div class="container" style="max-width: 1000px; margin: 0 auto; padding: 0 20px;">
        
        <?php if ($message): ?>
            <p style="background-color: rgba(229, 9, 20, 0.2); border: 1px solid var(--netflix-red); color: white; padding: 15px; border-radius: 5px; text-align: center;">
                <?php echo $message; ?>
            </p>
        <?php endif; ?>

        <?php if (count($films_panier) > 0): ?>
            <table class="cart-table" style="width: 100%; border-collapse: collapse; margin-top: 30px; background: #1a1a1a; border-radius: 10px; overflow: hidden;">
                <thead>
                    <tr style="background-color: #333; color: var(--netflix-red); text-transform: uppercase; font-size: 0.9rem;">
                        <th style="padding: 15px; text-align: left;">Film</th>
                        <th style="padding: 15px; text-align: left;">Titre</th>
                        <th style="padding: 15px; text-align: left;">Prix</th>
                        <th style="padding: 15px; text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($films_panier as $film): ?>
                        <tr style="border-bottom: 1px solid #333;">
                            <td style="padding: 15px;">
                                <img src="<?php echo htmlspecialchars($film['image_url']); ?>" style="width: 60px; border-radius: 5px;" alt="Affiche">
                            </td>
                            <td style="padding: 15px; font-weight: bold;"><?php echo htmlspecialchars($film['titre']); ?></td>
                            <td style="padding: 15px; color: var(--netflix-yellow);"><?php echo number_format($film['prix'], 2); ?>€</td>
                            <td style="padding: 15px; text-align: center;">
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="panier_id" value="<?php echo $film['panier_id']; ?>">
                                    <button type="submit" name="supprimer_panier" style="background: none; border: none; color: #ff4d4d; cursor: pointer; font-size: 0.9rem; text-decoration: underline;">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="cart-summary" style="text-align: right; margin-top: 30px; padding: 20px; background: #1a1a1a; border-radius: 10px;">
                <h3 style="font-size: 1.8rem; margin: 0 0 20px 0;">Total : <span style="color: var(--netflix-yellow);"><?php echo number_format($total, 2); ?>€</span></h3>
                
                <form method="POST" style="display:inline; margin-right: 10px;">
                    <button type="submit" name="vider_panier" style="background: transparent; border: 1px solid #555; color: #ccc; padding: 12px 25px; border-radius: 5px; cursor: pointer;">
                        Vider le panier
                    </button>
                </form>

                <form method="POST" style="display:inline;">
                    <button type="submit" name="valider_achat" class="btn-add-cart" style="padding: 12px 40px; font-size: 1.1rem;">
                        Valider l'achat
                    </button>
                </form>
            </div>

        <?php else: ?>
            <div style="text-align: center; padding: 50px 0;">
                <p style="font-size: 1.2rem; color: #888;">Votre panier est actuellement vide.</p>
                <a href="index.php" class="btn-add-cart" style="display: inline-block; text-decoration: none; margin-top: 20px;">Découvrir des films</a>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php include 'includes/footer.php'; ?>