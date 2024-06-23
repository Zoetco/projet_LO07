<!-- ----- début viewAll ----- -->
<?php
require($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
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
          <th scope="col">Nom du client</th>
          <th scope="col">Prénom du client</th>
          <th scope="col">Label de la résidence</th>
          <th scope="col">Ville de la résidence</th>
          <th scope="col">Prix de la résidence</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($results as $element) {
            printf("<tr>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%.2f</td>
                    </tr>", 
                    htmlspecialchars($element['client_nom']),
                    htmlspecialchars($element['client_prenom']),
                    htmlspecialchars($element['residence_label']),
                    htmlspecialchars($element['residence_ville']),
                    $element['residence_prix']);
        }
        ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>
</body>
<!-- ----- fin viewAll ----- -->
