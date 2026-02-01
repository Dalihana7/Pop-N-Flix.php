<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pop'N'Flix - Films & Séries</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header class="main-header">
        <div class="header-container">
            <!-- Logo à gauche - CLIQUABLE vers l'accueil -->
            <a href="index.php" class="logo-section">
                <img src="https://cdn-icons-png.flaticon.com/512/3418/3418886.png" class="popcorn-icon" alt="Popcorn">
                <h1 class="main-title">Pop'N'Flix</h1>
            </a>

            <!-- Navigation au centre -->
            <nav class="main-nav">
                <a href="index.php">Accueil</a>
                
                <!-- Menu déroulant Films -->
                <div class="dropdown">
                    <span class="dropdown-toggle">Films ▾</span>
                    <div class="dropdown-menu">
                        <a href="category.php?type=Action">Action</a>
                        <a href="category.php?type=Drame">Drame</a>
                        <a href="category.php?type=Horreur">Horreur</a>
                        <a href="category.php?type=Animation">Animation</a>
                    </div>
                </div>
                
                <a href="search.php">Recherche</a>
                
                <?php if(isset($_SESSION['utilisateur_id'])): ?>
                    <a href="panier.php">Panier</a>
                    <a href="historique.php">Historique</a>
                <?php endif; ?>
            </nav>

            <!-- Boutons connexion/inscription à droite -->
            <div class="auth-section">
                <?php if(isset($_SESSION['utilisateur_id'])): ?>
                    <span class="user-welcome">Bonjour, <?php echo htmlspecialchars($_SESSION['nom_utilisateur']); ?></span>
                    <a href="deconnexion.php" class="btn-auth btn-logout">Déconnexion</a>
                <?php else: ?>
                    <a href="connexion.php" class="btn-auth btn-login">Se connecter</a>
                    <a href="inscription.php" class="btn-auth btn-register">S'inscrire</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="red-divider-bottom"></div>
    </header>