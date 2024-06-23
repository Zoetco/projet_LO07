
<!-- ----- début viewInsert -->
 
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
        <input type="hidden" name='action' value='PersonneAjoutee'>        
        <label class='w-25' for="id">Nom : </label><input type="text" name='nom' size='75' value='Stone'> <br/>                          
        <label class='w-25' for="id">Prénom : </label><input type="text" name='prenom' value='Emma'> <br/> 
        <label class='w-25' for="statut">Statut :</label><br/>
        <input type="radio" id="statut" name="statut" value="0">
        <label for="admin">Administrateur</label><br/>
        <input type="radio" id="statut" name="statut" value="1" checked>
        <label for="client">Client</label><br/>          
        <label class='w-25' for="id">Login : </label><input type="text" name='login' size='20' value='utilisateur'> <br/>                          
        <label class='w-25' for="id">Mot de Passe : </label><input type="text" name='password' size='12' value='secret'> <br/>
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

<!-- ----- fin viewInsert -->



