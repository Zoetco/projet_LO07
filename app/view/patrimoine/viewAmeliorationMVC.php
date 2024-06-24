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
