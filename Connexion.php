<?php
require_once 'database.php';

class Connexion {
    public static function processConnexion() {
        $message = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nomUtilisateur = $_POST['nomUtilisateur'];
            $motDePasse = $_POST['motDePasse'];

            if (self::connecterUtilisateur($nomUtilisateur, $motDePasse)) {
                header("Location: viewAllArticles.php");
                exit();
            } else {
                $message = self::getErrorMessage();
            }
        }
        return $message;
    }

    private static function connecterUtilisateur($nomUtilisateur, $motDePasse) {
        global $connexion;

        $query = "SELECT mot_de_passe FROM utilisateurs WHERE nom_utilisateur = :nomUtilisateur";
        $statement = $connexion->prepare($query);
        $statement->bindParam(':nomUtilisateur', $nomUtilisateur, PDO::PARAM_STR);
        $statement->execute();

        if ($statement->rowCount() == 1) {
            $utilisateur = $statement->fetch(PDO::FETCH_ASSOC);
            return password_verify($motDePasse, $utilisateur['mot_de_passe']);
        } else {
            return false;
        }
    }

    private static function getErrorMessage() {
        return '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Échec de la connexion. Veuillez vérifier vos identifiants.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    }
}
?>
