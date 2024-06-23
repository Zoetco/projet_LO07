<!-- viewSelectBanque.php -->
<?php 
require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html'); 
?>

<body>
  <div class="container">
    <?php 
    include $root . '/app/view/fragment/fragmentPatrimoineMenu.html'; 
    include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html'; 
    ?>

    <h2>Sélectionner une banque</h2>

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='compteListByBanque'>
        <label for="banque_id">Sélectionnez une banque : </label>
        <select class="form-control" id='banque_id' name='banque_id' style="width: 200px">
            <?php
            foreach ($banques as $banque) {
                echo "<option value='{$banque->getId()}'>{$banque->getLabel()}</option>";
            }
            ?>
        </select>
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Voir les comptes</button>
    </form>
  </div>

  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>
</body>
</html>
