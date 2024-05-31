
<!-- ----- debut ControllerProducteur -->
<?php
require_once '../model/ModelProducteur.php';

class ControllerProducteur {
 // --- Liste des producteurs
 public static function prodReadAll() {
  $results = ModelProducteur::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewAll.php';
  if (DEBUG)
   echo ("ControllerProducteur : prodReadAll : vue = $vue");
  require ($vue);
 }

 // Affiche un formulaire pour sélectionner un id qui existe
 public static function prodReadId($args) {
  //if (DEBUG) echo ("ControllerVin::vinReadId:begin</br>");
  $results = ModelProducteur::getAllId();
  
  // passage du nom de la méthode cible pour le champ action du formulaire
  // Solution 1 : prodReadOne
  // Solution 2 : prodDeleted
  
  $target = $args['target'];
  //if (DEBUG) echo ("ControllerVin::vinReadId : target = $target</br>");

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewId.php';
  require ($vue);
 }

 // Affiche un producteur particulier (id)
 public static function prodReadOne() {
  $prod_id = $_GET['id'];
  $results = ModelProducteur::getOne($prod_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewAll.php';
  require ($vue);
 }

 // Affiche le formulaire de creation d'un producteur
 public static function prodCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewInsert.php';
  require ($vue);
 }

 // Affiche un formulaire pour récupérer les informations d'un nouveau producteur.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function prodCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelProducteur::insert(
      htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['region'])
  );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewInserted.php';
  require ($vue);
 }
 
 // Liste sans doublon des régions
 public static function prodNbParRegion() {
  $results = ModelProducteur::getNbParRegion();

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewNbParRegion.php';
  require ($vue);
 }
 
 // Affiche le nombre de producteurs par région
 public static function prodRegions() {
  $results = ModelProducteur::getRegions();

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewRegions.php';
  require ($vue);
 }
 
 // Supprime un producteur particulier (id)
 public static function prodDeleted() {
  $prod_id = $_GET['id'];
  $results = ModelProducteur::delete($prod_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewDeleted.php';
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerProducteur -->


