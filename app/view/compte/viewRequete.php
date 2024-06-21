<!-- ----- début viewRequete -->
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>
    <h3>Résultats de la première requête</h3>

    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <?php
          foreach ($results1[0] as $col) {
            echo "<th>$col</th>";
          }
          ?>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($results1[1] as $row) {
          echo "<tr>";
          foreach ($row as $value) {
            echo "<td>$value</td>";
          }
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>

    <h3>Résultats de la deuxième requête</h3>

    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <?php
          foreach ($results2[0] as $col) {
            echo "<th>$col</th>";
          }
          ?>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($results2[1] as $row) {
          echo "<tr>";
          foreach ($row as $value) {
            echo "<td>$value</td>";
          }
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
</body>
<!-- ----- fin viewRequete -->