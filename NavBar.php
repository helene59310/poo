
<?php
class NavBar {
    public static function generate() {
        echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Ma librairie</a>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="viewInscription.php">S\'inscrire</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="viewConnexion.php">Se connecter</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>';
    }
}
?>
