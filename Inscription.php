<?php
require_once 'database.php';

class Inscription
{
    public static function processInscription()
    {
        $message = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nomUtilisateur = $_POST['nomUtilisateur'];
            $motDePasse = $_POST['motDePasse'];

            if (self::inscrireUtilisateur($nomUtilisateur, $motDePasse)) {
                $message = self::getSuccessMessage();
            } else {
                $message = self::getErrorMessage();
            }
        }
        return $message;
    }

    private static function inscrireUtilisateur($nomUtilisateur, $motDePasse)
    {
        global $connexion;

        $motDePasseHash = password_hash($motDePasse, PASSWORD_DEFAULT);

        $query = "INSERT INTO utilisateurs (nom_utilisateur, mot_de_passe) VALUES (:nomUtilisateur, :motDePasse)";
        $statement = $connexion->prepare($query);
        $statement->bindParam(':nomUtilisateur', $nomUtilisateur, PDO::PARAM_STR);
        $statement->bindParam(':motDePasse', $motDePasseHash, PDO::PARAM_STR);

        return $statement->execute();
    }

    private static function getSuccessMessage()
    {
        return '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Inscription réussie
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    }

    private static function getErrorMessage()
    {
        return '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Erreur lors de l\'inscription. Veuillez réessayer.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    }
}
