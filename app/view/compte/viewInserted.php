<!-- ----- début viewInserted.php -->
<?php
require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentPatrimoineMenu.php';
    include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';

    if ($results) {
      echo "<h3>Le nouveau compte a été ajoutée/mise à jour</h3>";
      echo "<ul>";
      echo "<li>label = " . $label . "</li>";
      echo "<li>montant = " . $montant . "</li>";
      echo "<li>banque_id = " . $banque_id . "</li>";
      echo "</ul>";
    } else {
      echo "<h3>Erreur lors de l'ajout/mise à jour de la récolte</h3>";
    }
    ?>

  </div>

  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>
</body>
<!-- ----- fin viewInserted.php -->
