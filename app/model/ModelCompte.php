
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

 public static function getOne($id, $label) {
  try {
   $database = Model::getInstance();
   $query = "select * from compte where id = :id and label = :label";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'label' => $label
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCompte");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
public static function insert($id, $label, $montant, $banque_id, $personne_id) {
  try {
   $database = Model::getInstance();
   $query = "insert into compte (id, label, montant, banque_id, personne_id) values (:id, :label, :montant, :banque_id, :personne_id)";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'label' => $label,
     'montant' => $montant,
     'banque_id' => $banque_id,
     'personne_id' => $personne_id
   ]);
   return $database->lastInsertId();
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function update($id, $label, $montant, $banque_id, $personne_id) {
  try {
   $database = Model::getInstance();
   $query = "update compte set montant = :montant where banque_id = :banque_id and personne_id = :personne_id";
   $statement = $database->prepare($query);
   $statement->execute([
     'montant' => $montant,
     'banque_id' => $banque_id,
     'personne_id' => $personne_id
   ]);
   return array($banque_id, $personne_id);
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
}
?>
<!-- ----- fin ModelCompte -->
