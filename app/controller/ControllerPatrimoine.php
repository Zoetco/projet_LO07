
<!-- ----- debut ControllerPatrimoine -->
<?php
require_once '../model/ModelPersonne.php';


class ControllerPatrimoine {
 // --- page d'acceuil
 public static function patrimoineAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewPatrimoineAccueil.php';
  if (DEBUG)
   echo ("ControllerPatrimoine : patrimoineAccueil : vue = $vue");
  require ($vue);
 }
 
 // Affiche le formulaire de connection
 public static function connection() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patrimoine/viewConnect.php';
  require ($vue);
 }
 
 public static function connected() {
  // ajouter une validation des informations du formulaire
  $login = htmlspecialchars($_GET['login'] ?? '');
  $password = htmlspecialchars($_GET['password'] ?? '');

  $results = ModelPersonne::verifConnect($login, $password);

  if ($results) {
    // Save user information in session
    session_start();
    $_SESSION['id'] = $results->getId();
    $_SESSION['login'] = $results->getLogin();
    $_SESSION['statut'] = $results->getStatut();
    $_SESSION['nom'] = $results->getNom();
    $_SESSION['prenom'] = $results->getPrenom();
  }
  
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patrimoine/viewConnected.php';
  require ($vue);
 }

 // Affiche le formulaire de creation d'un banque
 public static function Inscription() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patrimoine/viewInsert.php';
  require ($vue);
 }

 // Affiche un formulaire pour récupérer les informations d'un nouveau banque.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function PersonneAjoutee() {
  // ajouter une validation des informations du formulaire
  $id = htmlspecialchars($_GET['id'] ?? '');
  $nom = htmlspecialchars($_GET['nom'] ?? '');
  $prenom = htmlspecialchars($_GET['prenom'] ?? '');
  $statut = htmlspecialchars($_GET['statut'] ?? '');
  $login = htmlspecialchars($_GET['login'] ?? '');
  $password = htmlspecialchars($_GET['password'] ?? '');

  $results = ModelPersonne::insert($nom, $prenom, $statut, $login, $password);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patrimoine/viewInserted.php';
  require ($vue);
 }
 
 public static function deconnection() {
    session_unset();
    session_destroy();
    header('Location: router2.php?action=patrimoineAccueil');
 }
    
 
}
?>
<!-- ----- fin ControllerPatrimoine -->


