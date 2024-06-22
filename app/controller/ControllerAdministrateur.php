<!-- ----- debut ControllerAdministrateur -->
<?php
require_once '../model/ModelPersonne.php';

class ControllerAdministrateur {
    // --- Liste des administrateurs
    public static function administrateurReadAll() {
        $results = ModelPersonne::getAllByStatut(ModelPersonne::ADMINISTRATEUR);
        include 'config.php';
        $vue = $root . '/app/view/personne/viewAll.php';
        if (DEBUG)
            echo ("ControllerAdministrateur : administrateurReadAll : vue = $vue");
        require ($vue);
    }

    // Autres méthodes spécifiques aux administrateurs...
}
?>
<!-- ----- fin ControllerAdministrateur -->
