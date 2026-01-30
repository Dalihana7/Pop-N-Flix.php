<?php
session_start();
require_once 'config/database.php';

$erreur = '';
$succes = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_utilisateur = trim($_POST['nom_utilisateur']);
    $email = trim($_POST['email']);
    $mot_de_passe = $_POST['mot_de_passe'];
    $confirmer_mot_de_passe = $_POST['confirmer_mot_de_passe'];
    
    // Validation
    if (empty($nom_utilisateur) || empty($email) || empty($mot_de_passe)) {
        $erreur = "Tous les champs sont obligatoires.";
    } elseif ($mot_de_passe !== $confirmer_mot_de_passe) {
        $erreur = "Les mots de passe ne correspondent pas.";
    } elseif (strlen($mot_de_passe) < 6) {
        $erreur = "Le mot de passe doit contenir au moins 6 caractères.";
    } else {
        // Vérifier si l'utilisateur existe déjà
        $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE username = ? OR email = ?");
        $stmt->execute([$nom_utilisateur, $email]);
        
        if ($stmt->fetch()) {
            $erreur = "Ce nom d'utilisateur ou cet email existe déjà.";
        } else {
            // Hacher le mot de passe
            $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
            
            // Insérer l'utilisateur
            $stmt = $pdo->prepare("INSERT INTO utilisateurs (username, email, password) VALUES (?, ?, ?)");
            if ($stmt->execute([$nom_utilisateur, $email, $mot_de_passe_hash])) {
                $succes = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
            } else {
                $erreur = "Une erreur est survenue. Veuillez réessayer.";
            }
        }
    }
}
?>

<?php include 'includes/header.php'; ?>

<main>
    <div class="auth-container">
        <h2 class="section-title">Inscription</h2>
        <div class="grid-separator"></div>
        
        <?php if ($erreur): ?>
            <p style="color: var(--netflix-red); text-align: center; font-weight: bold;"><?php echo $erreur; ?></p>
        <?php endif; ?>
        
        <?php if ($succes): ?>
            <p style="color: #2ecc71; text-align: center; font-weight: bold;"><?php echo $succes; ?></p>
        <?php endif; ?>
        
        <form method="POST" action="" style="max-width: 400px; margin: 0 auto; padding: 20px;">
            <div class="form-group" style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Nom d'utilisateur</label>
                <input type="text" name="nom_utilisateur" required 
                    style="width: 100%; padding: 12px; border-radius: 5px; border: none; background: #333; color: white;">
            </div>
            
            <div class="form-group" style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Email</label>
                <input type="email" name="email" required 
                    style="width: 100%; padding: 12px; border-radius: 5px; border: none; background: #333; color: white;">
            </div>
            
            <div class="form-group" style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Mot de passe</label>
                <input type="password" name="mot_de_passe" required 
                    style="width: 100%; padding: 12px; border-radius: 5px; border: none; background: #333; color: white;">
            </div>
            
            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px;">Confirmer le mot de passe</label>
                <input type="password" name="confirmer_mot_de_passe" required 
                    style="width: 100%; padding: 12px; border-radius: 5px; border: none; background: #333; color: white;">
            </div>
            
            <button type="submit" class="btn-add-cart" style="width: 100%;">
                S'inscrire
            </button>
        </form>
        
        <p style="text-align: center; margin-top: 20px;">
            Déjà inscrit ? <a href="connexion.php" style="color: var(--netflix-red); text-decoration: none; font-weight: bold;">Se connecter.</a>
        </p>
    </div>
</main>

<?php include 'includes/footer.php'; ?>