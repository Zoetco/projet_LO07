
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
 
 public static function clientMesComptes() {
    $results = ModelCompte::getAllById();
    include 'config.php';
    $vue = $root . '/app/view/compte/viewAll.php';
    if (DEBUG)
        echo ("ControllerCompte : clientMesComptes : vue = $vue");
    require ($vue);
 } 
 
 public static function clientCompteCreate() {
  $banque = ModelBanque::getAll();
  include 'config.php';
  $vue = $root . '/app/view/compte/viewInsert.php';
  if (DEBUG)
   echo ("ControllerCompte : compteCreate : vue = $vue");
  require ($vue);
 }

 public static function clientCompteCreated($args) {
  $label = htmlspecialchars($args['label']);
  $montant = htmlspecialchars($args['montant']);
  $banque_id = htmlspecialchars($args['banque_id']);

  $existingCompte = ModelCompte::getOne($banque_id, $label);
  if (empty($existingCompte)) {
    $results = ModelCompte::insert($label, $montant, $banque_id);
  } else {
    $results = ModelCompte::update($label, $montant, $banque_id);
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


