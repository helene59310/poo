<?php
require_once 'database.php';
require_once 'Connexion.php';

// Process inscription
$message = Connexion::processConnexion();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <!-- Ajoutez le lien vers Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Connexion</h2>
    <!-- Utilisation de Bootstrap pour la mise en forme -->
    <form class="mt-3" method="post" action="viewConnexion.php">
        <div class="form-group">
            <label for="nomUtilisateur">Nom d'utilisateur:</label>
            <input type="text" class="form-control" id="nomUtilisateur" name="nomUtilisateur" required>
        </div>
        <div class="form-group">
            <label for="motDePasse">Mot de passe:</label>
            <input type="password" class="form-control" id="motDePasse" name="motDePasse" required>
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
    <?php echo $message; ?> <!-- Afficher le message d'erreur ici -->
    <p class="mt-3">Nouvel utilisateur? <a href='viewInscription.php' class="btn btn-secondary">Inscrivez-vous ici</a></p>
</div>

<!-- Ajoutez le lien vers Bootstrap JS (optionnel) -->
<script src="https://code.jquery.com/jquery-3.6.0
