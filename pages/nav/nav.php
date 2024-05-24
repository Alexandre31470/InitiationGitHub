<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header>
    <h1>Mon blog</h1>
    <nav>
        <ul>
            <li><a href="../accueil/accueil.php">Accueil</a></li>
            <li><a href="../liste_articles/liste_articles.php">Nos articles</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Catégories</a>
                <div class="dropdown-content">
                    <a href="#news">Actualités</a>
                    <a href="#technology">Technologies</a>
                    <a href="#lifestyle">Mode de vie</a>
                    <a href="#health">Santé</a>
                    <a href="#sports">Sport</a>
                </div>
            </li>
            <?php if (isset($_SESSION['user'])): ?>
                <li class="connexion"><a href="../../connexion/deconnexion.php">Déconnexion</a></li>
            <?php else: ?>
                <li class="connexion"><a href="../../connexion/pageconnexion.php">Connexion</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
