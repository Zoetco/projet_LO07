
<!-- ----- debut ControllerCave -->
<?php
require_once '../model/ModelProducteur.php';

class ControllerCave {
 // --- page d'acceuil
 public static function caveAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewCaveAccueil.php';
  if (DEBUG)
   echo ("ControllerCave : caveAccueil : vue = $vue");
  require ($vue);
 }

 // --- Mes propositions
 public static function mesPropositions() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/mesPropositions.php';
  if (DEBUG)
   echo ("ControllerProducteur : prodReadAll : vue = $vue");
  require ($vue);
 }
}
?>
<!-- ----- fin ControllerCave -->


