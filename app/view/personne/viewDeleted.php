
<!-- ----- début viewDeleted -->
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
     echo ("<h3>Le producteur a été supprimé </h3>");
     echo("<ul>");
     echo ("<li>id = " . $results . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème de suppression du Producteur. Il est probable qu'il soit présent dans la table des récoltes.</h3>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentPatrimoineFooter.html';
    ?>
    <!-- ----- fin viewDeleted -->    

    
    