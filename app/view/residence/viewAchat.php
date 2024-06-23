<!-- ----- début viewAchat.php -->
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
        <input type="hidden" name='action' value='clientResidenceAchete'>

        <label for="residence_id">Sélectionner la résidence que vous souhaitez acheter : </label>
        <select class="form-control" id='residence_id' name='residence_id' style="width: 300px">
          <?php
          foreach ($residence as $residence) {
            $id = $residence->getId();
            $label = $residence->getLabel();
            $ville = $residence->getVille();
            $prix = $residence->getPrix();
            echo "<option value='$id'>$label $ville - $prix</option>";
          }
          ?>
        </select>
        
        <label for="sender_id">Sélectionner votre compte qui sera prélevé : </label>
        <select class="form-control" id='sender_id' name='sender_id' style="width: 300px">
          <?php
          foreach ($compte as $compte) {
            $id = $compte->getId();
            $label = $compte->getLabel();
            $montant = $compte->getMontant();
            echo "<option value='$id'>$label $montant</option>";
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
<!-- ----- fin viewAchat.php -->
