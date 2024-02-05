<?php
require_once 'database.php';

class AddArticle
{
    public static function processAddArticle($article_id, $title, $description)
    {
        // Initialisation des variables pour éviter les erreurs de notice
        $message = '';
        $alertClass = '';

        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
            $titre = $_POST['titre'];
            $contenu = $_POST['contenu'];

            // Appeler la méthode d'ajout d'article
            $result = AddArticle::addArticle($titre, $contenu);

            // Récupérer le message et la classe d'alerte
            $message = $result['message'];
            $alertClass = $result['alertClass'];
        }
    }


    public static function addArticle($titre, $contenu)
    {
        global $connexion;

        $query = "INSERT INTO articles (titre, contenu) VALUES (:titre, :contenu)";
        $statement = $connexion->prepare($query);
        $statement->bindParam(':titre', $titre, PDO::PARAM_STR);
        $statement->bindParam(':contenu', $contenu, PDO::PARAM_STR);

        $success = $statement->execute(); // Retourne true si l'ajout a réussi, sinon false

        // Vérifier si l'article a été ajouté avec succès
        if ($success) {
            $message = "L'article a été ajouté avec succès.";
            $alertClass = "success";
        } else {
            $message = "Une erreur est survenue lors de l'ajout de l'article. Veuillez réessayer.";
            $alertClass = "danger";
        }

        return ['success' => $success, 'message' => $message, 'alertClass' => $alertClass];
    }
}
