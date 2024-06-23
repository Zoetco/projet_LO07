
<!-- ----- debut ControllerResidence -->
<?php
require_once '../model/ModelResidence.php';
require_once '../model/ModelBanque.php';
require_once '../model/ModelPersonne.php';

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
 
 public static function residenceCreate() {
  $vins = ModelBanque::getAll();
  $producteurs = ModelPersonne::getAll();
  include 'config.php';
  $vue = $root . '/app/view/residence/viewInsert.php';
  if (DEBUG)
   echo ("ControllerResidence : residenceCreate : vue = $vue");
  require ($vue);
 }

 public static function residenceCreated($args) {
  $producteur_id = htmlspecialchars($args['banque_id']);
  $vin_id = htmlspecialchars($args['personne_id']);
  $quantite = htmlspecialchars($args['montant']);

  $existingRecolte = ModelResidence::getOne($banque_id, $personne_id);
  if (empty($existingRecolte)) {
    $results = ModelResidence::insert($banque_id, $personne_id, $montant);
  } else {
    $results = ModelResidence::update($banque_id, $personne_id, $montant);
  }

  include 'config.php';
  $vue = $root . '/app/view/residence/viewInserted.php';
  if (DEBUG)
   echo ("ControllerResidence : residenceCreated : vue = $vue");
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


