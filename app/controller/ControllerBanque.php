
<!-- ----- debut ControllerBanque -->
<?php
require_once '../model/ModelBanque.php';
require_once '../model/ModelCompte.php';

class ControllerBanque {
 // --- Liste des banques
 public static function banqueReadAll() {
  $results = ModelBanque::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/banque/viewAll.php';
  if (DEBUG)
   echo ("ControllerBanque : banqueReadAll : vue = $vue");
  require ($vue);
 }

 // Affiche un formulaire pour sélectionner un id qui existe
 public static function banqueReadId($args) {
  //if (DEBUG) echo ("ControllerBanque::banqueReadId:begin</br>");
  $results = ModelBanque::getAllId();
  
  // passage du nom de la méthode cible pour le champ action du formulaire
  // Solution 1 : banqueReadOne
  // Solution 2 : banqueDeleted
  
  $target = $args['target'];
  //if (DEBUG) echo ("ControllerBanque::banqueReadId : target = $target</br>");

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/banque/viewId.php';
  require ($vue);
 }

 // Affiche un banque particulier (id)
 public static function banqueReadAllAccounts() {
  $id = $_GET['id'];
  $results = ModelCompte::getCompteBanque($id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/compte/viewAll.php';
  require ($vue);
 }

 // Affiche le formulaire de creation d'un banque
 public static function banqueCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/banque/viewInsert.php';
  require ($vue);
 }

 // Affiche un formulaire pour récupérer les informations d'un nouveau banque.
 // La clé est gérée par le systeme et pas par l'internaute
public static function banqueCreated() {
  // Validate input to ensure no null values are passed
  $label = isset($_GET['label']) ? htmlspecialchars($_GET['label']) : '';
  $pays = isset($_GET['pays']) ? htmlspecialchars($_GET['pays']) : '';
  
  // Make sure 'id' is not expected from the form as it is generated
  $results = ModelBanque::insert($label, $pays);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/banque/viewInserted.php';
  require ($vue);
}
 
 // Supprime un banque particulier (id)
 public static function banqueDeleted() {
  $banque_id = $_GET['id'];
  $results = ModelBanque::delete($id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/banque/viewDeleted.php';
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerBanque -->


