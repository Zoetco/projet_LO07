
<!-- ----- debut ModelResidence -->

<?php
require_once 'Model.php';

class ModelResidence {
 private $id, $label, $ville, $prix, $personne_id;

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $label = NULL, $ville = NULL, $prix = NULL, $personne_id = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->label = $label;
   $this->ville = $ville;
   $this->prix = $prix;
   $this->personne_id = $personne_id;
  }
 }

 function setId($id) {
  $this->id = $id;
 }

 function setLabel($label) {
  $this->label = $label;
 }

 function setVille($ville) {
  $this->ville = $ville;
 }

 function setPrix($prix) {
  $this->prix = $prix;
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

 function getVille() {
  return $this->ville;
 }
 
 function getPrix() {
  return $this->prix;
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
   $query = "select * from residence";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelResidence");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getOne($id, $label) {
  try {
   $database = Model::getInstance();
   $query = "select * from residence where id = :id and label = :label";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'label' => $label
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelResidence");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function getAllById() {
    try {
        $database = Model::getInstance();
        $query = "select * from residence where personne_id = :id";
        $statement = $database->prepare($query);
        $statement->execute(['id' => $_SESSION['id']]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelResidence");
        return $results;
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
}
 
public static function insert($id, $label, $ville, $prix, $personne_id) {
  try {
   $database = Model::getInstance();
   $query = "insert into residence (id, label, ville, prix, personne_id) values (:id, :label, :ville, :prix, :personne_id)";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'label' => $label,
     'ville' => $ville,
     'prix' => $prix,
     'personne_id' => $personne_id
   ]);
   return $database->lastInsertId();
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function update($id, $label, $ville, $prix, $personne_id) {
  try {
   $database = Model::getInstance();
   $query = "update residence set ville = :ville where id = :id and label = :label";
   $statement = $database->prepare($query);
   $statement->execute([
     'ville' => $ville,
     'id' => $id,
     'label' => $label
   ]);
   return array($id, $label);
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

public static function getAllWithPersonDetails() {
    try {
        $database = Model::getInstance();
        $query = "SELECT personne.nom AS client_nom, personne.prenom AS client_prenom, residence.label AS residence_label, residence.ville AS residence_ville, residence.prix AS residence_prix
                  FROM residence
                  JOIN personne ON residence.personne_id = personne.id";
        $statement = $database->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
}
 
public static function getAllNotOwnedByUser() {
    try {
        $database = Model::getInstance();
        $query = "SELECT * FROM residence WHERE personne_id != :personne_id OR personne_id IS NULL";
        $statement = $database->prepare($query);
        $statement->execute(['personne_id' => $_SESSION['id']]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelResidence");
        return $results;
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
}

public static function getPrixForId($id) {
    try {
        $database = Model::getInstance();
        $query = "SELECT prix FROM residence WHERE id = :id";
        $statement = $database->prepare($query);
        $statement->execute(['id' => $id]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['prix'];
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
}

public static function getCompteProprietaire($residence_id) {
    try {
        $database = Model::getInstance();
        $query = "SELECT personne_id FROM residence WHERE id = :id";
        $statement = $database->prepare($query);
        $statement->execute(['id' => $residence_id]);
        $proprietaire = $statement->fetch(PDO::FETCH_ASSOC);

        if ($proprietaire) {
            $personne_id = $proprietaire['personne_id'];
            $compteProprietaire = ModelCompte::getFirstAccountIdByPersonneId($personne_id);
            return $compteProprietaire;
        }

        return null; // Ajustement en cas où la résidence n'est pas trouvée
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return null;
    }
}


public static function achat($transfer, $sender_id, $receiver_id, $residence_id) {
    try {
        $database = Model::getInstance();
        
        // Début de la transaction
        $database->beginTransaction();
        
        // Mettre à jour les comptes
        $results = ModelCompte::transfer($transfer, $sender_id, $receiver_id);
        
        // Mettre à jour le propriétaire de la résidence
        $query = "UPDATE residence SET personne_id = :personne_id WHERE id = :residence_id";
        $statement = $database->prepare($query);
        $statement->execute(['personne_id' => $_SESSION['id'], 'residence_id' => $residence_id]);
        
        // Commit de la transaction
        $database->commit();
        
        return $results;
    } catch (PDOException $e) {
        // Rollback de la transaction en cas d'erreur
        $database->rollBack();
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
}

 
}
?>
<!-- ----- fin ModelResidence -->
