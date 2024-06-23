<!-- ----- début viewTransfer.php -->
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
        <input type="hidden" name='action' value='clientCompteTransfered'>
        
        <label for="transfer">Montant du transfer :</label>
        <input type="number" step="any" name='transfer' value='100' class="form-control" style="width: 300px">

        <label for="sender_id">Sélectionner le compte débiteur : </label>
        <select class="form-control" id='sender_id' name='sender_id' style="width: 300px">
          <?php
          foreach ($compte_sender as $compte_sender) {
            $id = $compte_sender->getId();
            $label = $compte_sender->getLabel();
            $montant = $compte_sender->getMontant();
            echo "<option value='$id'>$label $montant</option>";
          }
          ?>
        </select>
        
        <label for="receiver_id">Sélectionner le compte créditeur : </label>
        <select class="form-control" id='receiver_id' name='receiver_id' style="width: 300px">
          <?php
          foreach ($compte_receiver as $compte_receiver) {
            $id = $compte_receiver->getId();
            $label = $compte_receiver->getLabel();
            $montant = $compte_receiver->getMontant();
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
<!-- ----- fin viewTransfer.php -->
