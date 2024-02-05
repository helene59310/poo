<?php
require_once 'database.php';

class DeleteArticle {
    public static function delete($id_article) {
        global $connexion;

        $query = "DELETE FROM articles WHERE id = :id";
        $statement = $connexion->prepare($query);
        $statement->bindParam(':id', $id_article, PDO::PARAM_INT);

        return $statement->execute();
    }
}
?>
