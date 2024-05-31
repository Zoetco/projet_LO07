<!-- ----- début viewInserted.php -->
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';

    if ($results) {
      echo "<h3>La nouvelle récolte a été ajoutée/mise à jour</h3>";
      echo "<ul>";
      echo "<li>producteur_id = " . $producteur_id . "</li>";
      echo "<li>vin_id = " . $vin_id . "</li>";
      echo "<li>quantite = " . $quantite . "</li>";
      echo "</ul>";
    } else {
      echo "<h3>Erreur lors de l'ajout/mise à jour de la récolte</h3>";
    }
    ?>

  </div>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
</body>
<!-- ----- fin viewInserted.php -->
