
<!-- ----- debut ModelRecolte -->

<?php
require_once 'Model.php';

class ModelRecolte {
 private $producteur_id, $vin_id, $quantite;

 // pas possible d'avoir 2 constructeurs
 public function __construct($producteur_id = NULL, $vin_id = NULL, $quantite = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($producteur_id)) {
   $this->producteur_id = $producteur_id;
   $this->vin_id = $vin_id;
   $this->quantite = $quantite;
  }
 }

 function setProdId($producteur_id) {
  $this->producteur_id = $producteur_id;
 }

 function setVinId($vin_id) {
  $this->vin_id = $vin_id;
 }

 function setQuantite($quantite) {
  $this->quantite = $quantite;
 }

 function getProdId() {
  return $this->producteur_id;
 }

 function getVinId() {
  return $this->vin_id;
 }

 function getQuantite() {
  return $this->quantite;
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
   $query = "select * from recolte";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRecolte");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getOne($producteur_id, $vin_id) {
  try {
   $database = Model::getInstance();
   $query = "select * from recolte where producteur_id = :producteur_id and vin_id = :vin_id";
   $statement = $database->prepare($query);
   $statement->execute([
     'producteur_id' => $producteur_id,
     'vin_id' => $vin_id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRecolte");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
public static function insert($producteur_id, $vin_id, $quantite) {
  try {
   $database = Model::getInstance();
   $query = "insert into recolte (producteur_id, vin_id, quantite) values (:producteur_id, :vin_id, :quantite)";
   $statement = $database->prepare($query);
   $statement->execute([
     'producteur_id' => $producteur_id,
     'vin_id' => $vin_id,
     'quantite' => $quantite
   ]);
   return $database->lastInsertId();
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function update($producteur_id, $vin_id, $quantite) {
  try {
   $database = Model::getInstance();
   $query = "update recolte set quantite = :quantite where producteur_id = :producteur_id and vin_id = :vin_id";
   $statement = $database->prepare($query);
   $statement->execute([
     'quantite' => $quantite,
     'producteur_id' => $producteur_id,
     'vin_id' => $vin_id
   ]);
   return array($producteur_id, $vin_id);
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
}
?>
<!-- ----- fin ModelRecolte -->
