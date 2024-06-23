
<!-- ----- debut ControllerCompte -->
<?php
require_once '../model/ModelCompte.php';
require_once '../model/ModelBanque.php';
require_once '../model/ModelPersonne.php';


class ControllerCompte {
 // --- Liste des comptes
 
 public static function clientMesComptes() {
    $results = ModelCompte::getAllById();
    include 'config.php';
    $vue = $root . '/app/view/compte/viewMyAll.php';
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

public static function compteReadAll() {
    $results = ModelCompte::getAllWithPersonne();
    include 'config.php';
    $vue = $root . '/app/view/compte/viewAll.php';
    if (DEBUG)
        echo ("ControllerCompte : compteReadAll : vue = $vue");
    require($vue);
}

 public static function clientCompteTransfer() {
    $comptes = ModelCompte::getAllById();
    $compteCount = count($comptes);

    if ($compteCount < 2) {
      include 'config.php';
      $vue = $root . '/app/view/compte/viewError.php';
      $message = "Vous devez avoir au moins deux comptes pour effectuer un transfert.";
      if (DEBUG)
        echo ("ControllerCompte : clientCompteTransfer : vue = $vue");
      require($vue);
    } else {
      $compte_sender = $comptes;
      $compte_receiver = $comptes;
      include 'config.php';
      $vue = $root . '/app/view/compte/viewTransfer.php';
      if (DEBUG)
        echo ("ControllerCompte : clientCompteTransfer : vue = $vue");
      require($vue);
    }
  }

 public static function clientCompteTransfered($args) {
    $transfer = htmlspecialchars($args['transfer']);
    $sender_id = htmlspecialchars($args['sender_id']);
    $receiver_id = htmlspecialchars($args['receiver_id']);

    $results = ModelCompte::transfer($transfer, $sender_id, $receiver_id);
    
    include 'config.php';
    $vue = $root . '/app/view/compte/viewTransfered.php';
    if (DEBUG)
      echo ("ControllerCompte : compteTransfered : vue = $vue");
    require ($vue);
  }


public static function compteListByBanque($args) {
    $banque_id = htmlspecialchars($args['banque_id']);
    $comptes = ModelCompte::getByBanqueId($banque_id);
    include 'config.php';
    $vue = $root . '/app/view/compte/viewListCompteByBanque.php';
    require ($vue);
}

public static function compteSelectBanque() {
    $banques = ModelBanque::getAll();
    include 'config.php';
    $vue = $root . '/app/view/banque/viewSelectBanque.php';
    if (DEBUG) {
        echo ("ControllerCompte : compteSelectBanque : vue = $vue");
    }
    require($vue);
}

}
?>
<!-- ----- fin ControllerCompte -->


