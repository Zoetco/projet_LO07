<!-- ----- debut viewAmeliorationMVC -->
<?php
require($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentPatrimoineMenu.php';
    include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
    ?>

    <div class="row">
      <div class="col-md-12">
<<<<<<< Updated upstream
          <h2>Amélioration du code MVC vu en cours :</h2><br> 
        <p>Afin de limiter les redondances de code dans notre modèle MVC, nous pourrions utiliser des méthodes plus génériques pour les fonctions de bases des modèles.</p>
        <p>En effet, nous avons remarqué que beaucoup de fonctions se retrouvaient dans chaque modèle, comme les fonctions de création et de lecture par exemple.</p>
        <p>Nous pourrions donc créer une méthode générique pour chacune de ses fonctions dans le fichier Model.php et faire hériter nos modèles de ces méthodes.</p>
        <p>Par exemple, pour la lecture, une méthode générale serait :</p>
        
        <pre><code class="language-php"><?php echo htmlspecialchars('<?php
class Model {
    protected static $table;

    public static function read($id) {
        $database = self::getInstance();
        $query = "SELECT * FROM " . static::$table . " WHERE id = :id";
        $statement = $database->prepare($query);
        $statement->execute([\'id\' => $id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
?>'); ?></code></pre>
        
        <p>Ainsi, pour notre modèle résidences, il suffirait de deux lignes pour faire l'appel :</p>
        
        <pre><code class="language-php"><?php echo htmlspecialchars('<?php
class ModelResidence extends Model {
    protected static $table = \'residence\';
}
?>'); ?></code></pre>
=======
        <h2>Amélioration du code MVC :</h2>
        
        <h4>1. Visualisations avec Chart.js</h4>
        <p>
            Dans la continuation de notre idée originale d'utilisation du site Patrimoine. Nous avons
            pensé à pouvoir faire des grphiques de visualisation de certaines données de notre BDD. 
        </p>
        <p>
            On pourrait par exemple intégré des graphiques en utilisant la librairie Javascript Chart.js
            qui est open-source et facile d'utilisation.            
        </p>
        <p>
            Un peu comme BootStrap, il faut d'abord télécharger puis inclure la librairie dans le projet.
        </p>
        <p>
            Ensuite il suffit d'insérer le code Chart.js dans une balise script dans la vue souhaitée.         
        </p>
        <p>
            Cette amélioration nous permettrait aussi en tant qu'étudiant.e à apprendre un peu plus sur
            le Javascript qui est aussi très utilisé dans le développement Web.
        </p>
        
        <h4>2. CRUD ?</h4>
>>>>>>> Stashed changes
      </div>
    </div>
  </div>

  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/themes/prism.min.css" rel="stylesheet" />
  <style>
    pre[class*="language-"] {
      background: none;
    }
  </style>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/prism.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/components/prism-php.min.js"></script>
</body>

<!-- ----- fin viewAmeliorationMVC -->
