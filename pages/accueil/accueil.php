<?php
// Inclure le code de connexion à la base de données et la logique de récupération des articles
include 'accueil_logic.php';
?>

<?php
require 'accueil.html';
?>

<?php if (!empty($articles)): ?>
    <?php foreach ($articles as $article): ?>
        <article class="article">
            <div class="text">
                <h3><?php echo htmlspecialchars($article['title']); ?></h3>
                <p><?php echo htmlspecialchars($article['content']); ?></p>
            </div>
        </article>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucun article trouvé.</p>
<?php endif; ?>
