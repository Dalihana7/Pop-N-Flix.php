<?php
session_start();
require_once 'config/database.php';

$erreur = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_utilisateur = trim($_POST['nom_utilisateur']);
    $mot_de_passe = $_POST['mot_de_passe'];
    
    if (empty($nom_utilisateur) || empty($mot_de_passe)) {
        $erreur = "Tous les champs sont obligatoires.";
    } else {
        // Récupérer l'utilisateur
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE username = ?");
        $stmt->execute([$nom_utilisateur]);
        $utilisateur = $stmt->fetch();
        
        if ($utilisateur && password_verify($mot_de_passe, $utilisateur['password'])) {
            // Connexion réussie
            $_SESSION['utilisateur_id'] = $utilisateur['id'];
            $_SESSION['nom_utilisateur'] = $utilisateur['username'];
            header('Location: index.php');
            exit;
        } else {
            $erreur = "Nom d'utilisateur ou mot de passe incorrect.";
        }
    }
}
?>

<?php include 'includes/header.php'; ?>

<main>
    <div class="auth-container"> 
        <h2 class="section-title">Connexion</h2>
        <div class="grid-separator"></div>
        
        <?php if ($erreur): ?>
            <p style="color: var(--netflix-red); text-align: center; font-weight: bold;">
                <?php echo $erreur; ?>
            </p>
        <?php endif; ?>
        
        <form method="POST" action="" style="max-width: 400px; margin: 0 auto; padding: 20px;">
            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px;">Nom d'utilisateur</label>
                <input type="text" name="nom_utilisateur" required 
                    style="width: 100%; padding: 12px; border-radius: 5px; border: none; background: #333; color: white;">
            </div>
            
            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px;">Mot de passe</label>
                <input type="password" name="mot_de_passe" required 
                    style="width: 100%; padding: 12px; border-radius: 5px; border: none; background: #333; color: white;">
            </div>
            
            <button type="submit" class="btn-add-cart" style="width: 100%; margin-top: 10px;">
                Se connecter
            </button>
        </form>
        
        <p style="text-align: center; margin-top: 20px;">
            Pas encore membre ? <a href="inscription.php" style="color: var(--netflix-red); text-decoration: none; font-weight: bold;">Inscrivez-vous maintenant.</a>
        </p>
    </div>
</main>

<?php include 'includes/footer.php'; ?>