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
}
?>
<!-- ----- fin ControllerClient -->
