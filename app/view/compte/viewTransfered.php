<!-- ----- début viewTransfered.php -----
<?php
require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentPatrimoineMenu.php';
    include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';

    if ($results) {
      echo "<h3>Le transfert a été effectué avec succès !</h3>";
      echo "<ul>";
      echo "<li>Montant du transfert = " . $transfer . "</li>";
      echo "<li>Compte débiteur = " . $results['sender_id'] . " | Nouveau montant = " . $results['sender_new_montant'] . "</li>";
      echo "<li>Compte créditeur = " . $results['receiver_id'] . " | Nouveau montant = " . $results['receiver_new_montant'] . "</li>";
      echo "</ul>";
    } else {
      echo "<h3>Erreur lors du transfert. Avez-vous bien choisi deux comptes différents ?</h3>";
    }
    ?>

  </div>

  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>
</body>
<!-- ----- fin viewTransfered.php -----
