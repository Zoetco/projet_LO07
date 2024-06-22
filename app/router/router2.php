
<!-- ----- debut Router2 -->
<?php
require ('../controller/ControllerBanque.php');
require ('../controller/ControllerCompte.php');
require ('../controller/ControllerPatrimoine.php');
require ('../controller/ControllerPersonne.php');
require ('../controller/ControllerAdministrateur.php');
require ('../controller/ControllerClient.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique compteherchée
$action = htmlspecialchars($param["action"]);

// Modification du routeur pour prendre en compte l'ensemble des parametres
$action = $param['action'];

// On supprime l'élément action de la structure param
unset($param['action']);

// Tout ce qui reste dans param sont des arguments
$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
 case "banqueReadAll" :
 case "banqueReadAllAccounts" :
 case "banqueReadId" :
 case "banqueCreate" :
 case "banqueCreated" :
  ControllerBanque::$action($args);
  break;

 case "personneReadAll" :
 case "personneReadOne" :
 case "personneReadId" :
  ControllerPersonne::$action($args);
  break;

 case "clientReadAll" :
  ControllerClient::$action($args);
  break;
  
 case "administrateurReadAll" :
  ControllerAdministrateur::$action($args);
  break;

 case "compteReadAll" :
 case "compteRequetes" :
 case "compteCreate" :
 case "compteCreated" :
  ControllerCompte::$action($args);
  break;

 case "connection":
 case "connected":
 case "mesPropositions" :
 case "Inscription":
 case "PersonneAjoutee":
 case "deconnection":
  ControllerPatrimoine::$action($args);
  break;

 // Tache par défaut
 default:
  $action = "patrimoineAccueil";
  ControllerPatrimoine::$action($args);
}
?>
<!-- ----- Fin Router2 -->

