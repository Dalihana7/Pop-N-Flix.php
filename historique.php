<?php
session_start();
require_once 'config/database.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['utilisateur_id'])) {
    header('Location: connexion.php');
    exit;
}

$utilisateur_id = $_SESSION['utilisateur_id'];

// Récupérer l'historique des commandes
$stmt = $pdo->prepare("
    SELECT c.id, c.montant_total, c.date_commande,
        GROUP_CONCAT(f.titre SEPARATOR ', ') as films
    FROM commandes c
    LEFT JOIN details_commandes dc ON c.id = dc.commande_id
    LEFT JOIN films f ON dc.film_id = f.id
    WHERE c.utilisateur_id = ?
    GROUP BY c.id
    ORDER BY c.date_commande DESC
");
$stmt->execute([$utilisateur_id]);
$commandes = $stmt->fetchAll();
?>

<?php include 'includes/header.php'; ?>

<main>
    <h2 class="section-title">Historique de mes achats</h2>
    <div class="grid-separator"></div>

    <div class="container" style="max-width: 1000px; margin: 0 auto; padding: 20px;">
        
        <p style="text-align: center; color: #888; margin-bottom: 30px;">
            Compte : <span style="color: white; font-weight: bold;"><?php echo htmlspecialchars($_SESSION['nom_utilisateur']); ?></span>
        </p>

        <?php if (count($commandes) > 0): ?>
            <table class="cart-table" style="width: 100%; border-collapse: collapse; background: #1a1a1a; border-radius: 10px; overflow: hidden;">
                <thead>
                    <tr style="background-color: #333; color: var(--netflix-red); text-transform: uppercase; font-size: 0.9rem;">
                        <th style="padding: 15px; text-align: left;">N° Commande</th>
                        <th style="padding: 15px; text-align: left;">Date</th>
                        <th style="padding: 15px; text-align: left;">Films achetés</th>
                        <th style="padding: 15px; text-align: right;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($commandes as $commande): ?>
                        <tr style="border-bottom: 1px solid #333; transition: 0.3s;" onmouseover="this.style.backgroundColor='#252525'" onmouseout="this.style.backgroundColor='transparent'">
                            <td style="padding: 15px; color: var(--netflix-red); font-weight: bold;">
                                #<?php echo $commande['id']; ?>
                            </td>
                            <td style="padding: 15px; color: #ccc;">
                                <?php echo date('d/m/Y H:i', strtotime($commande['date_commande'])); ?>
                            </td>
                            <td style="padding: 15px; font-size: 0.95rem; line-height: 1.4;">
                                <?php echo htmlspecialchars($commande['films']); ?>
                            </td>
                            <td style="padding: 15px; text-align: right; color: var(--netflix-yellow); font-weight: bold;">
                                <?php echo number_format($commande['montant_total'], 2); ?>€
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div style="text-align: center; padding: 50px 0; background: #1a1a1a; border-radius: 10px;">
                <p style="font-size: 1.2rem; color: #888;">Vous n'avez pas encore effectué d'achat.</p>
                <a href="index.php" class="btn-add-cart" style="display: inline-block; text-decoration: none; margin-top: 20px;">Commencer mes achats</a>
            </div>
        <?php endif; ?>

        <div style="margin-top: 40px; text-align: center;">
            <a href="index.php" style="color: #ccc; text-decoration: none; margin: 0 15px;">← Retour à l'accueil</a>
            <a href="panier.php" style="color: #ccc; text-decoration: none; margin: 0 15px;">Voir mon panier</a>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>