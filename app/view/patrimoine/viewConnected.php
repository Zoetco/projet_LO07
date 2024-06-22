<?php
require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentPatrimoineMenu.php';
    include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results) {
     echo ("<h3>Félicitations ! Vous êtes connecté.e ! </h3>");
     echo("<ul>");
     echo ("<li>id = " . $results->getId() . "</li>");
     echo ("<li>nom = " . $results->getNom() . "</li>");
     echo ("<li>prenom = " . $results->getPrenom() . "</li>");
     echo ("<li>statut = " . ($results->getStatut() == ModelPersonne::ADMINISTRATEUR ? "Administrateur" : "Client") . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Un problème est survenu. Identifiants incorrects.</h3>");
    }
    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentPatrimoineFooter.html';
    ?>
    <!-- ----- fin viewConnected -->
