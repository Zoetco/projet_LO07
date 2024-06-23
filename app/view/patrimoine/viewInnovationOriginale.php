<!-- ----- debut viewInnovationOriginale -->
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
        <h2>Innovation Originale :</h2>
        <p>
            Une utilisation originale des données pourrait être la création 
            d'une fonctionnalité de comparaison de patrimoine entre différents utilisateurs. Cette 
            fonctionnalité permettrait aux administrateurs du site de comparer visuellement le patrimoine
            financier et immobilier des différents utilisateurs enregistrés.
        </p>
        <p>
            Cette fonctionnalité permet aux administrateurs du site de visualiser et de comparer les 
            patrimoines des utilisateurs enregistrés, offrant ainsi une perspective intéressante sur 
            la diversité des situations financières et immobilières des clients. Elle peut être enrichie
            en ajoutant des fonctionnalités comme des graphiques, des filtres, ou encore des options de 
            tri pour une expérience utilisateur plus dynamique et informative.
        </p>
        <p>
            La fonctionnalité est ici disponible pour tous les utilisateurs puisque ce site n'est qu'un POC.
        </p>
      </div>
    </div>
    
      
    <h2>Comparaison de Patrimoine</h2>

    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">Utilisateur</th>
          <th scope="col">Catégorie</th>
          <th scope="col">Label</th>
          <th scope="col">Valeur</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($results as $personne) {
            $patrimoine = ModelPersonne::getAllPatrimoine($personne->getId());

            foreach ($patrimoine as $element) {
                printf("<tr><td>%s %s</td><td>%s</td><td>%s</td><td>%d</td></tr>",
                    $personne->getPrenom(), $personne->getNom(), ucfirst($element['categorie']), $element['label'], $element['valeur']);
            }
        }
        ?>
      </tbody>
    </table>
      
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>
</body>

<!-- ----- fin viewInnovationOriginale -->
