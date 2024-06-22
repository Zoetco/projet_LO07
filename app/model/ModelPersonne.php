
<!-- ----- debut ModelPersonne -->

<?php
require_once 'Model.php';

class ModelPersonne {
 public const ADMINISTRATEUR = 0;
 public const CLIENT = 1;
 private $id, $nom, $prenom, $statut, $login, $password;

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $statut = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->nom = $nom;
   $this->prenom = $prenom;
   $this->statut = $statut;
   $this->login = $login;
   $this->password = $password;
  }
 }

 function setId($id) {
  $this->id = $id;
 }

 function setNom($nom) {
  $this->nom = $nom;
 }

 function setPrenom($prenom) {
  $this->prenom = $prenom;
 }

 function setStatut($statut) {
  $this->statut = $statut;
 }

 function setLogin($login) {
     $this->login = $login;
 }

function setPassword($password) {
    $this->password = $password;
}
 
 function getId() {
  return $this->id;
 }

 function getNom() {
  return $this->nom;
 }

 function getPrenom() {
  return $this->prenom;
 }

 function getStatut() {
  return $this->statut;
 }

 function getLogin() {
  return $this->login;
 }

 function getPassword() {
  return $this->password;
 }
 
 
 public static function getAllByStatut($statut) {
    try {
        $database = Model::getInstance();
        $query = "select * from personne where statut = :statut";
        $statement = $database->prepare($query);
        $statement->execute(['statut' => $statut]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
        return $results;
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
}

 
// retourne une liste des id
 public static function getAllId() {
  try {
   $database = Model::getInstance();
   $query = "select id from personne";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getMany($query) {
  try {
   $database = Model::getInstance();
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select * from personne";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getOne($id) {
  try {
   $database = Model::getInstance();
   $query = "select * from personne where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function insert($nom, $prenom, $statut, $login, $password) {
  try {
   $database = Model::getInstance();

   // recherche de la valeur de la clé = max(id) + 1
   $query = "select max(id) from personne";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   // ajout d'un nouveau tuple;
   $query = "insert into personne value (:id, :nom, :prenom, :statut, :login, :password)";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'nom' => $nom,
     'prenom' => $prenom,
     'statut' => $statut,
     'login' => $login,
     'password' => $password
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }

 public static function verifConnect($login, $password) {
     //vérifie qu'il existe bien une personne avec ce login et password dans la base de données
     //retourne $id, $nom, $prenom, $statut si oui
     //retourne -1 sinon
     try {
        $database = Model::getInstance();
        $query = "SELECT * FROM personne WHERE login = :login AND password = :password";
        $statement = $database->prepare($query);
        $statement->execute([
            'login' => $login,
            'password' => $password
        ]);
        $statement->setFetchMode(PDO::FETCH_CLASS, "ModelPersonne");
        $result = $statement->fetch();
        return $result ? $result : false;
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return false;
    }     
 }

 public static function update() {
  echo ("ModelPersonne : update() TODO ....");
  return null;
 }

 public static function delete($id) {
  try {
   $database = Model::getInstance();

   // suppression du tuple;
   $query = "delete from personne where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }

}
?>
<!-- ----- fin ModelPersonne -->
