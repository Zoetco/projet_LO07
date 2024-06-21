
<!-- ----- debut ControllerRecolte -->
<?php
require_once '../model/ModelRecolte.php';
require_once '../model/ModelVin.php';
require_once '../model/ModelProducteur.php';

class ControllerRecolte {
 // --- Liste des vins
 public static function recReadAll() {
  $results = ModelRecolte::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/recolte/viewAll.php';
  if (DEBUG)
   echo ("ControllerRecolte : recReadAll : vue = $vue");
  require ($vue);
 }

 public static function recRequetes() {
  $query1 = "select region, cru, annee, degre, nom, prenom, quantite from vin, producteur, recolte where recolte.vin_id = vin.id and recolte.producteur_id = producteur.id order by region";
  $query2 = "select vin.id, producteur.id, region, cru, nom, prenom, quantite from vin, producteur, recolte where recolte.vin_id = vin.id and recolte.producteur_id = producteur.id order by vin.id, producteur_id";

  $results1 = ModelRecolte::executeQuery($query1);
  $results2 = ModelRecolte::executeQuery($query2);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/recolte/viewRequete.php';
  if (DEBUG)
   echo ("ControllerRecolte : recRequetes : vue = $vue");
  require ($vue);
 }
 
 public static function recCreate() {
  $vins = ModelVin::getAll();
  $producteurs = ModelProducteur::getAll();
  include 'config.php';
  $vue = $root . '/app/view/recolte/viewInsert.php';
  if (DEBUG)
   echo ("ControllerRecolte : recCreate : vue = $vue");
  require ($vue);
 }

 public static function recCreated($args) {
  $producteur_id = htmlspecialchars($args['producteur_id']);
  $vin_id = htmlspecialchars($args['vin_id']);
  $quantite = htmlspecialchars($args['quantite']);

  $existingRecolte = ModelRecolte::getOne($producteur_id, $vin_id);
  if (empty($existingRecolte)) {
    $results = ModelRecolte::insert($producteur_id, $vin_id, $quantite);
  } else {
    $results = ModelRecolte::update($producteur_id, $vin_id, $quantite);
  }

  include 'config.php';
  $vue = $root . '/app/view/recolte/viewInserted.php';
  if (DEBUG)
   echo ("ControllerRecolte : recCreated : vue = $vue");
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerRecolte -->


