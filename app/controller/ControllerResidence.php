
<!-- ----- debut ControllerResidence -->
<?php
require_once '../model/ModelResidence.php';
require_once '../model/ModelBanque.php';
require_once '../model/ModelPersonne.php';
require_once '../model/ModelCompte.php';

class ControllerResidence {
 // --- Liste des residences
 public static function residenceReadAll() {
  $results = ModelResidence::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/residence/viewAll.php';
  if (DEBUG)
   echo ("ControllerResidence : residenceReadAll : vue = $vue");
  require ($vue);
 }
 
 public static function clientMesResidences() {
    $results = ModelResidence::getAllById();
    include 'config.php';
    $vue = $root . '/app/view/residence/viewMyAll.php';
    if (DEBUG)
        echo ("ControllerResidence : clientMesResidences : vue = $vue");
    require ($vue);
 } 
 
 public static function clientResidenceAchat() {
  $residence = ModelResidence::getAllNotOwnedByUser();
  $compte = ModelCompte::getAllById();
  include 'config.php';
  $vue = $root . '/app/view/residence/viewAchat.php';
  if (DEBUG)
   echo ("ControllerResidence : residenceAchat : vue = $vue");
  require ($vue);
 }

 public static function clientResidenceAchete($args) {
    $residence_id = htmlspecialchars($args['residence_id']);
    $sender_id = htmlspecialchars($args['sender_id']);
    
    // Obtenir le propriétaire actuel de la résidence
    $receiver_id = ModelResidence::getCompteProprietaire($residence_id);
    
    if (is_null($receiver_id)) {
        include 'config.php';
        $vue = $root . '/app/view/compte/viewError.php';
        $message = "Le propriétaire de cette résidence n'a pas de compte.";
        if (DEBUG)
            echo ("ControllerResidence : residenceAchete : vue = $vue");
        require($vue);
        return;
    }
    
    // Obtenir le prix de la résidence
    $transfer = ModelResidence::getPrixForId($residence_id);
    
    // Effectuer l'achat
    $results = ModelResidence::achat($transfer, $sender_id, $receiver_id, $residence_id);
    
    include 'config.php';
    $vue = $root . '/app/view/residence/viewAchete.php';
    if (DEBUG)
        echo ("ControllerResidence : clientResidenceAchete : vue = $vue");
    require ($vue);
}


public static function residenceReadAllWithPersonDetails() {
    $results = ModelResidence::getAllWithPersonDetails();
    include 'config.php';
    $vue = $root . '/app/view/residence/viewAll.php';
    if (DEBUG) {
        echo ("ControllerResidence : residenceReadAllWithPersonDetails : vue = $vue");
    }
    require($vue);
}

 
}
?>
<!-- ----- fin ControllerResidence -->


