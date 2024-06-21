<!-- ----- début viewInsert.php -->
<?php
require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentPatrimoineMenu.html';
    include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
    ?>

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='recCreated'>

        <label for="producteur_id">Sélectionner un producteur : </label>
        <select class="form-control" id='producteur_id' name='producteur_id' style="width: 300px">
          <?php
          foreach ($producteurs as $producteur) {
            $id = $producteur->getId();
            $nom = $producteur->getNom();
            $prenom = $producteur->getPrenom();
            echo "<option value='$id'>$nom $prenom</option>";
          }
          ?>
        </select>

        <label for="vin_id">Sélectionner un vin : </label>
        <select class="form-control" id='vin_id' name='vin_id' style="width: 300px">
          <?php
          foreach ($vins as $vin) {
            $id = $vin->getId();
            $cru = $vin->getCru();
            echo "<option value='$id'>$cru</option>";
          }
          ?>
        </select>

        <label for="quantite">Quantité : </label>
        <input type="number" step="any" name='quantite' value='10' class="form-control" style="width: 300px">
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Soumettre</button>
    </form>
  </div>

  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>
</body>
<!-- ----- fin viewInsert.php -->
