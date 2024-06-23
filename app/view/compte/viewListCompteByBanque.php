<?php 
require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html'); 
?>

<body>
  <div class="container">
    <?php 
    include $root . '/app/view/fragment/fragmentPatrimoineMenu.html'; 
    include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html'; 
    ?>

    <h2>Liste des comptes de la banque</h2>

    <?php if (empty($comptes)) { ?>
        <p>Aucun compte trouvé pour cette banque.</p>
    <?php } else { ?>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Banque</th>
                    <th scope="col">Compte</th>
                    <th scope="col">Montant</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($comptes as $compte) {
                    echo "<tr>";
                    echo "<td>{$compte['prenom']}</td>";
                    echo "<td>{$compte['nom']}</td>";
                    echo "<td>{$compte['banque_label']}</td>";
                    echo "<td>{$compte['compte_label']}</td>";
                    echo "<td>{$compte['montant']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    <?php } ?>
  </div>

  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>
</body>
</html>
