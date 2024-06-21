<!-- ----- début viewNbParRegion -->
<?php

require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
      ?>

    <?php
      // Affichage dynamique des noms des attributs
      echo '<table class="table table-striped table-bordered">';
      echo "<thead><tr>";
      
      // Récupérer les noms des colonnes à partir du premier élément de $results
      if (!empty($results)) {
          $firstRow = $results[0];
          foreach ($firstRow as $colName => $value) {
              echo "<th>" . htmlspecialchars($colName) . "</th>";
          }
      }
      
      echo "</tr></thead>";
      echo "<tbody>";
      
      // Afficher les lignes de résultats
      foreach ($results as $tuple) {
          echo "<tr>";
          foreach ($tuple as $value) {
              echo "<td>" . htmlspecialchars($value) . "</td>";
          }
          echo "</tr>";
      }
      
      echo "</tbody></table>";
    ?>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
</body>

<!-- ----- fin viewNbParRegion -->
