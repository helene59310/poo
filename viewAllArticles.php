<?php
require_once 'database.php';
require_once 'Article.php';
require_once 'DeleteArticle.php';
require_once 'Deconnexion.php';

// Récupérer tous les articles depuis la base de données
$articles = Article::getAllArticles();

// Vérifier si le formulaire de suppression a été soumis pour un article spécifique
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    // Récupérer l'ID de l'article à supprimer depuis le formulaire
    $id_article = $_POST['delete_id'];

    // Supprimer l'article
    $success = DeleteArticle::delete($id_article);

    // Rediriger vers la même page après la suppression
    header("Location: viewAllArticles.php");
    exit;
}
// Vérifier si le formulaire de déconnexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
    // Appeler la méthode de déconnexion
    Deconnexion::deconnecter();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Tous les articles</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Mes articles</h2>
    <!-- Afficher tous les articles -->
    <?php foreach ($articles as $article): ?>
        <div class="card">
            <div class="card-body">
                <h2 class="card-title"><?php echo htmlspecialchars($article->getTitle()); ?></h2>
                <p class="card-text"><?php echo htmlspecialchars($article->getContent()); ?></p>
                <form method="post" action="viewAllArticles.php">
                    <input type="hidden" name="delete_id" value="<?php echo $article->getId(); ?>">
                    <button type="submit" class="btn btn-danger" onclick="return confirmDelete();">Supprimer</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
    <a href="viewAddArticle.php" class="btn btn-primary mt-3">Ajouter un article</a>
    <a href="viewConnexion.php" class="btn btn-secondary mt-3">Déconnexion</a>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function confirmDelete() {
        return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');
    }
</script>
</body>
</html>
