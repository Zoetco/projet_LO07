
<!-- ----- debut ControllerCompte -->
<?php
require_once '../model/ModelCompte.php';
require_once '../model/ModelBanque.php';
require_once '../model/ModelPersonne.php';

class ControllerCompte {
 // --- Liste des comptes
 public static function compteReadAll() {
  $results = ModelCompte::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/compte/viewAll.php';
  if (DEBUG)
   echo ("ControllerCompte : compteReadAll : vue = $vue");
  require ($vue);
 }
 
 public static function compteCreate() {
  $vins = ModelBanque::getAll();
  $producteurs = ModelPersonne::getAll();
  include 'config.php';
  $vue = $root . '/app/view/compte/viewInsert.php';
  if (DEBUG)
   echo ("ControllerCompte : compteCreate : vue = $vue");
  require ($vue);
 }

 public static function compteCreated($args) {
  $producteur_id = htmlspecialchars($args['banque_id']);
  $vin_id = htmlspecialchars($args['personne_id']);
  $quantite = htmlspecialchars($args['montant']);

  $existingRecolte = ModelCompte::getOne($banque_id, $personne_id);
  if (empty($existingRecolte)) {
    $results = ModelCompte::insert($banque_id, $personne_id, $montant);
  } else {
    $results = ModelCompte::update($banque_id, $personne_id, $montant);
  }

  include 'config.php';
  $vue = $root . '/app/view/compte/viewInserted.php';
  if (DEBUG)
   echo ("ControllerCompte : compteCreated : vue = $vue");
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerCompte -->


