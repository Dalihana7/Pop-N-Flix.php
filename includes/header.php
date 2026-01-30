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
        <div class="logo-container">
            <img src="https://cdn-icons-png.flaticon.com/512/3418/3418886.png" class="popcorn-icon" alt="Popcorn">
            <h1 class="main-title">Pop'N'Flix</h1>
            <div class="red-divider"></div>
        </div>
        <nav class="centered-nav">
            <a href="index.php">Accueil</a>
            <a href="category.php?type=Action">Action</a>
            <a href="category.php?type=Drame">Drame</a>
            <a href="category.php?type=Horreur">Horreur</a>
            <a href="category.php?type=Animation">Animation</a>
            <a href="search.php">Recherche</a>
            <?php if(isset($_SESSION['utilisateur_id'])): ?>
                <a href="panier.php">Panier</a>
                <a href="historique.php">Historique</a>
                <a href="deconnexion.php">Déconnexion</a>
            <?php else: ?>
                <a href="connexion.php">Se connecter</a>
                <a href="inscription.php">S'inscrire</a>
            <?php endif; ?>
        </nav>
    </header>
