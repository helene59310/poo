<?php
require_once 'database.php';

class Article {
    public static function getAllArticles() {
        global $connexion;
        $articles = [];

        $query = "SELECT * FROM articles";
        $resultat = $connexion->query($query);

        if ($resultat) {
            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                $article = new self($row['id'], $row['titre'], $row['contenu']);
                $articles[] = $article;
            }
        }
        return $articles;
    }

    private int $id;
    private string $title;
    private string $content;

    public function __construct($id, $title, $content) {
        $this->id = (int) $id;
        $this->title = $title;
        $this->content = $content;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getId(){
        return $this->id;
    }

    public function display() {
        echo "<div class='card'>";
        echo "<div class='card-body'>";
        echo "<h2 class='card-title'>" . htmlspecialchars($this->title) . "</h2>";
        echo "<p class='card-text'>" . htmlspecialchars($this->content) . "</p>";
        echo "<form method='post' action='deleteArticle.php'>";
        echo "<input type='hidden' name='id' value='" . $this->id . "'>";
        echo "<button type='submit' class='btn btn-danger' onclick='return confirmDelete()'>Supprimer</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";

        echo "<script>";
        echo "function confirmDelete() {";
        echo "return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');";
        echo "}";
        echo "</script>";
    }

}
?>
