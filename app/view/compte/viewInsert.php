<!-- ----- début viewInsert.php -->
<?php
require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentPatrimoineMenu.php';
    include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
    ?>

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='banqueCreated'>
        
        <label for="quantite">Label</label>
        <input type="string" step="any" name='label' value='Epargne' class="form-control" style="width: 300px">

        
        <label for="quantite">Montant</label>
        <input type="number" step="any" name='montant' value='100' class="form-control" style="width: 300px">

        <label for="banque_id">Sélectionner une banque : </label>
        <select class="form-control" id='banque_id' name='banque_id' style="width: 300px">
          <?php
          foreach ($banque as $banque) {
            $id = $banque->getId();
            $label = $banque->getLabel();
            $pays = $banque->getPays();
            echo "<option value='$id'>$label $pays</option>";
          }
          ?>
        </select>

      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Soumettre</button>
    </form>
  </div>

  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>
</body>
<!-- ----- fin viewInsert.php -->
