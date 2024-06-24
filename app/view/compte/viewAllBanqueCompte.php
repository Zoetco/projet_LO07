<!-- ----- début viewAllBanqueCompte -->
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
          <th scope="col">Nom</th>
          <th scope="col">Prénom</th>
          <th scope="col">Banque_Label</th>
          <th scope="col">Compte_Label</th>
          <th scope="col">Montant du Compte</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des comptes est dans une variable $results             
          foreach ($results as $element) {
              printf("<tr>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%.2f</td>
                      </tr>", 
                      htmlspecialchars($element['nom']),
                      htmlspecialchars($element['prenom']),
                      htmlspecialchars($element['banque_label']),
                      htmlspecialchars($element['compte_label']),
                      htmlspecialchars($element['montant']));
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewAllBanqueCompte -->
  
  
  