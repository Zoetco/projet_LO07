<!-- ----- début viewPatrimoine -->
<?php
require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentPatrimoineMenu.php';
      include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
      ?>

    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">Catégorie</th>
          <th scope="col">Label</th>
          <th scope="col">Valeur</th>
          <th scope="col">Capital</th>
        </tr>
      </thead>
      <tbody>
          <?php
          $capital = 0;
          foreach ($results as $element) {
              $capital += $element['valeur'];
              printf("<tr><td>%s</td><td>%s</td><td>%d</td><td>%d</td></tr>",
                     ucfirst($element['categorie']), $element['label'], $element['valeur'], $capital);
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

<!-- ----- fin viewPatrimoine -->
