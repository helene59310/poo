<?php
require_once 'AddArticle.php';


$message = AddArticle::processAddArticle($article_id, $title, $description);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajout d'article</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Ajout d'article</h2>
    <!-- Afficher l'alerte Bootstrap si un message est présent -->
    <?php if (!empty($message)): ?>
    <div class="alert alert-<?php echo $alertClass; ?> alert-dismissible fade show" role="alert">
        <?php echo $message; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>

    <!-- Formulaire d'ajout d'article -->
    <form class="mt-3" method="post" action="viewAddArticle.php">
        <div class="form-group">
            <label for="titre">Titre:</label>
            <input type="text" class="form-control" id="titre" name="titre" required>
        </div>
        <div class="form-group">
            <label for="contenu">Contenu:</label>
            <textarea class="form-control" id="contenu" name="contenu" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
    <a href="viewAllArticles.php" class="btn btn-secondary mt-3">Retourner à la liste des articles</a>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
