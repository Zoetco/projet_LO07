
<!-- ----- début viewId -->
<?php 
require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentPatrimoineMenu.php';
      include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';

      // $results contient un tableau avec la liste des clés.
      ?>

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='<?php echo ($target); ?>'>
        <label for="banque_id">Sélectionner une banque : </label>
        <select class="form-control" id='id' name='id' style="width: 300px">
          <?php
          foreach ($banques as $banque) {
            $id = $banque->getId();
            $label = $banque->getLabel();
            $pays = $banque->getPays();
            echo "<option value='$id'>$label $pays</option>";
          }
          ?>
        </select>
      </div>
      <p/><br/>
      <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewId -->