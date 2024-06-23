<!-- ----- début viewAchete.php ----- -->
<?php
require($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentPatrimoineMenu.php';
    include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';

    if ($results) {
      echo "<h3>L'achat a été effectué avec succès !</h3>";
      echo "<ul>";
      echo "<li>Résidence achetée = " . htmlspecialchars($residence_id) . "</li>";

      if (is_array($results) && isset($results['sender_id']) && isset($results['sender_new_montant'])) {
        echo "<li>Compte débiteur = " . htmlspecialchars($results['sender_id']) . " | Nouveau montant = " . htmlspecialchars($results['sender_new_montant']) . "</li>";
      } else {
        echo "<li>Compte débiteur = | Nouveau montant =</li>";
      }

      if (is_array($results) && isset($results['receiver_id']) && isset($results['receiver_new_montant'])) {
        echo "<li>Compte créditeur = " . htmlspecialchars($results['receiver_id']) . " | Nouveau montant = " . htmlspecialchars($results['receiver_new_montant']) . "</li>";
      } else {
        echo "<li>Compte créditeur = | Nouveau montant =</li>";
      }

      echo "</ul>";
    } else {
      echo "<h3>Erreur lors de l'achat</h3>";
    }
    ?>
  </div>

  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>
</body>
<!-- ----- fin viewAchete.php ----- -->
