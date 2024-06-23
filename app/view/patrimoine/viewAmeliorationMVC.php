<!-- ----- debut viewAmeliorationMVC -->
<?php

require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentPatrimoineMenu.php';
      include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
      ?>

    <div class="row">
      <div class="col-md-12">
        <h2>Amélioration du code MVC vu en cours :</h2>
        <p>
            L'amélioration que nous proposons est d'ajouter une table 'recompense' qui répertorie des 
            récompenses attribuées à certaines récoltes.
        </p>
        <p>
            La table sera comme suit : recompense (competition, producteur_id, vin_id, grade)
        </p>
        <p>
            Les attributs producteur_id et vin_id sont nécessaires pour identifier la récolte
            récompensée. La clé primaire est (competition, vin_id, producteur_id) car une même 
            récolte peut avoir deux récompenses de deux compétitions différentes.
            Le grade correspond à 'or', 'argent' ou 'bronze'.
        </p>
        <p>
            On connais tous les médailles sur nos bouteilles de vins. En
            ajoutant cette table on pourrait aussi proposer une page 'podium' sur notre site
            pour classer les producteurs en fonction du nombre de récompenses qu'ils ont obtenues.          
        </p>
      </div>
    </div>
         
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>
</body>

<!-- ----- fin viewAmeliorationMVC -->
