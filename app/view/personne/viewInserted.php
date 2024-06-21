
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentPatrimoineMenu.html';
    include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results) {
     echo ("<h3>La nouvelle personne a été ajoutée </h3>");
     echo("<ul>");
     echo ("<li>id = " . $results . "</li>");
     echo ("<li>nom = " . $_GET['nom'] . "</li>");
     echo ("<li>prenom = " . $_GET['prenom'] . "</li>");
     echo ("<li>statut = " . $_GET['statut'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion du Producteur</h3>");
     echo ("id = " . $_GET['nom']);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentPatrimoineFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    