<?php
class Deconnexion {
    public static function deconnecter(): void {
        // Détruisez la session, ce qui déconnectera l'utilisateur
        session_start();
        session_unset();
        session_destroy();

        // Définir une variable de session pour indiquer que la déconnexion a réussi
        $_SESSION['logout_success'] = true;
    }
}
?>
