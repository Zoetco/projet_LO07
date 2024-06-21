
<!-- ----- debut ControllerPersonne -->
<?php
require_once '../model/ModelPersonne.php';

class ControllerPersonne {
 // --- Liste des personnes
 public static function personneReadAll() {
  $results = ModelPersonne::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/personne/viewAll.php';
  if (DEBUG)
   echo ("ControllerPersonne : personneReadAll : vue = $vue");
  require ($vue);
 }

 // Affiche un formulaire pour sélectionner un id qui existe
 public static function personneReadId($args) {
  //if (DEBUG) echo ("ControllerVin::vinReadId:begin</br>");
  $results = ModelPersonne::getAllId();
  
  // passage du nom de la méthode cible pour le champ action du formulaire
  // Solution 1 : personneReadOne
  // Solution 2 : personneDeleted
  
  $target = $args['target'];
  //if (DEBUG) echo ("ControllerVin::vinReadId : target = $target</br>");

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/personne/viewId.php';
  require ($vue);
 }

 // Affiche un personne particulier (id)
 public static function personneReadOne() {
  $personne_id = $_GET['id'];
  $results = ModelPersonne::getOne($id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/personne/viewAll.php';
  require ($vue);
 }

 // Affiche le formulaire de creation d'un personne
 public static function personneCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/personne/viewInsert.php';
  require ($vue);
 }

 // Affiche un formulaire pour récupérer les informations d'un nouveau personne.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function personneCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelPersonne::insert(
      htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['statut'])
  );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/personne/viewInserted.php';
  require ($vue);
 }
  
 // Supprime un personne particulier (id)
 public static function personneDeleted() {
  $personne_id = $_GET['id'];
  $results = ModelPersonne::delete($id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/personne/viewDeleted.php';
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerPersonne -->


