
<!-- ----- debut ModelCompte -->

<?php
require_once 'Model.php';

class ModelCompte {
 private $id, $label, $montant, $banque_id, $personne_id;

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $label = NULL, $montant = NULL, $banque_id = NULL, $personne_id = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->label = $label;
   $this->montant = $montant;
   $this->banque_id = $banque_id;
   $this->personne_id = $personne_id;
  }
 }

 function setId($id) {
  $this->id = $id;
 }

 function setLabel($label) {
  $this->label = $label;
 }

 function setMontant($montant) {
  $this->montant = $montant;
 }

 function setBanqueId($banque_id) {
  $this->banque_id = $banque_id;
 }
 
 function setPersonneId($personne_id) {
  $this->personne_id = $personne_id;
 }
 
 function getId() {
  return $this->id;
 }

 function getLabel() {
  return $this->label;
 }

 function getMontant() {
  return $this->montant;
 }
 
 function getBanqueId() {
  return $this->banque_id;
 }
 
 function getPersonneId() {
  return $this->personne_id;
 }
 

 public static function getMany($query) {
  try {
   $database = Model::getInstance();
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_ASSOC);
   $cols = array_keys($results[0]);
   return array($cols, $results);
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function executeQuery($query) {
  try {
   $database = Model::getInstance();
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_ASSOC);
   if (empty($results)) {
     return [[], []];
   }
   $cols = array_keys($results[0]);
   return [$cols, $results];
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select * from compte";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCompte");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getOne($label, $banque_id) {
  try {
   $database = Model::getInstance();
   $query = "select * from compte where banque_id = :banque_id and label = :label";
   $statement = $database->prepare($query);
   $statement->execute([
     'banque_id' => $banque_id,
     'label' => $label
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCompte");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
public static function getCompteBanque($id) {
 try {
  $database = Model::getInstance();
  $query = "select * from compte where banque_id = :id";
  $statement = $database->prepare($query);
  $statement->execute([
    'id' => $id
  ]);
  $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCompte");
  return $results;
 } catch (PDOException $e) {
  printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
  return NULL;
 }
}

public static function getByBanqueId($banque_id) {
   try {
       $database = Model::getInstance();
       $query = "SELECT personne.prenom, personne.nom, banque.label AS banque_label, 
                        compte.label AS compte_label, compte.montant
                 FROM compte
                 JOIN personne ON compte.personne_id = personne.id
                 JOIN banque ON compte.banque_id = banque.id
                 WHERE compte.banque_id = :banque_id";
       $statement = $database->prepare($query);
       $statement->execute(['banque_id' => $banque_id]);
       $results = $statement->fetchAll(PDO::FETCH_ASSOC);
       return $results;
   } catch (PDOException $e) {
       printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
       return NULL;
   }
}

 
public static function insert($label, $montant, $banque_id) {
  try {
   $database = Model::getInstance();

   // recherche de la valeur de la clé = max(id) + 1
   $query = "select max(id) from compte";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   // ajout d'un nouveau tuple;
   $query = "insert into compte value (:id, :label, :montant, :banque_id, :personne_id)";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'label' => $label,
     'montant' => $montant,
     'banque_id' => $banque_id,
     'personne_id' => $_SESSION['id']
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }
 
 public static function getAllById() {
    try {
        $database = Model::getInstance();
        $query = "select * from compte where personne_id = :id";
        $statement = $database->prepare($query);
        $statement->execute(['id' => $_SESSION['id']]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCompte");
        return $results;
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
}

public static function transfer($transfer, $sender_id, $receiver_id) {
    if ($sender_id != $receiver_id) {
      try {
        $database = Model::getInstance();

        // Récupérer le montant actuel du compte débiteur
        $query = "SELECT montant FROM compte WHERE id = :id";
        $statement = $database->prepare($query);
        $statement->execute(['id' => $sender_id]);
        $sender = $statement->fetch(PDO::FETCH_ASSOC);

        // Récupérer le montant actuel du compte créditeur
        $statement->execute(['id' => $receiver_id]);
        $receiver = $statement->fetch(PDO::FETCH_ASSOC);

        if ($sender && $receiver) {
          // Mettre à jour le montant du compte débiteur
          $new_sender_montant = $sender['montant'] - $transfer;
          $query = "UPDATE compte SET montant = :montant WHERE id = :id";
          $statement = $database->prepare($query);
          $statement->execute(['montant' => $new_sender_montant, 'id' => $sender_id]);

          // Mettre à jour le montant du compte créditeur
          $new_receiver_montant = $receiver['montant'] + $transfer;
          $statement->execute(['montant' => $new_receiver_montant, 'id' => $receiver_id]);

          return [
            'sender_id' => $sender_id,
            'sender_new_montant' => $new_sender_montant,
            'receiver_id' => $receiver_id,
            'receiver_new_montant' => $new_receiver_montant
          ];
        } else {
          return NULL; // Un des comptes n'existe pas
        }
      } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
      }
    } else {
      return NULL; // Les comptes sont identiques
    }
  }

 public static function update($label, $montant, $banque_id) {
  try {
   $database = Model::getInstance();
   $query = "update compte set montant = :montant where banque_id = :banque_id and label = :label";
   $statement = $database->prepare($query);
   $statement->execute([
     'montant' => $montant,
     'banque_id' => $banque_id,
     'label' => $label
   ]);
   return array($banque_id, $label);
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 
public static function getAllWithPersonne() {
    try {
        $database = Model::getInstance();
        $query = "SELECT compte.id, compte.label, compte.montant, 
                         banque.label AS banque_label, banque.pays AS banque_pays,
                         personne.nom AS client_nom, personne.prenom AS client_prenom
                  FROM compte
                  JOIN personne ON compte.personne_id = personne.id
                  JOIN banque ON compte.banque_id = banque.id";
        $statement = $database->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
} 


}
?>
<!-- ----- fin ModelCompte -->
