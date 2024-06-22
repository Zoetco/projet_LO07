
<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentPatrimoineMenu.html';
      include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
      ?>

    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">id</th>
          <th scope = "col">label</th>
          <th scope = "col">montant</th>
          <th scope = "col">banque_id</th>
          <th scope = "col">personne_id</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des comptes est dans une variable $results             
          foreach ($results as $element) {
           printf("<tr><td>%d</td><td>%s</td><td>%d</td><td>%d</td><td>%d</td></tr>", $element->getId(), 
             $element->getLabel(), $element->getMontant(), $element->getBanqueId(), $element->getPersonneId());
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  