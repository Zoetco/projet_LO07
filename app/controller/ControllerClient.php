<!-- ----- debut ControllerClient -->
<?php
require_once '../model/ModelPersonne.php';

class ControllerClient {
    // --- Liste des clients
    public static function clientReadAll() {
        $results = ModelPersonne::getAllByStatut(ModelPersonne::CLIENT);
        include 'config.php';
        $vue = $root . '/app/view/personne/viewAll.php';
        if (DEBUG)
            echo ("ControllerClient : clientReadAll : vue = $vue");
        require ($vue);
    }
    
    public static function clientMonPatrimoine() {
        if (isset($_SESSION['id'])) {
            $results = ModelPersonne::getAllPatrimoine($_SESSION['id']);
            include 'config.php';
            $vue = $root . '/app/view/personne/viewPatrimoine.php';
            if (DEBUG)
                echo ("ControllerClient : clientMonPatrimoine : vue = $vue");
            require ($vue);
        } else {
            // Gérer le cas où l'utilisateur n'est pas connecté
            // Par exemple, rediriger vers une page de connexion
            header('Location: login.php');
            exit();
        }
    }

}
?>
<!-- ----- fin ControllerClient -->
