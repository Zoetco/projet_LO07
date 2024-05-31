<!-- ----- debut mesPropositions -->
<?php

require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
      ?>

    <div class="row">
      <div class="col-md-12">
        <h2>Proposition 1 :</h2>
        <p>Ajouter un 'template' dans le menu VIN pour afficher des requêtes SQL avec des COUNT ou autre fonction d'agrégation pour avoir un exemple pour le menu PRODUCTEUR quand on doit afficher "Liste des régions sans doublon" ou "Nombre de producteur par région".</p>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <h2>Proposition 2 :</h2>
        <p>Ajouter une image d'une grappe de vin par exemple dans la navbar comme "logo" du site. Je suis curieuse de savoir où il serait judicieux de stocker l'image de référence dans notre arborescence MVC ;)</p>
      </div>
    </div>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
</body>

<!-- ----- fin mesPropositions -->
